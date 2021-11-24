<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->isLogIn)
            redirect(base_url());
        $this->load->library('spreadsheet');

    }


    public function index()
    {

        $data['kullanici'] = $this->db->select("isimsoyad")->from("kullanicilar")->where("id", $this->session->userdata("kulid"))->get()->row();
        $data['content'] = $this->load->view('index', $data, true);
        $data['pagetitle'] = "Rezervasyonlar";
        $this->load->view('/includes/head', $data);
        //$this->load->view('admin',$data);
    }


    public function getcustomers()
    {
        echo json_encode($this->db->select("rezervasyon.*,masalar.masa_ad")->from("rezervasyon")->join('masalar', 'masa_id = rezervasyon.masaid')->get()->result());
    }

    public function addrezervasyon()
    {
        $adsoy = $this->input->post("adsoyad");
        $tel = $this->input->post("tel");
        $masaid = $this->input->post("yetki");
        $mesaj = $this->input->post("mesaj");
        $tarih = date("Y-m-d", strtotime(explode(" ", $this->input->post("tarihsaat"))[0]));

        $saat = explode(" ", $this->input->post("tarihsaat"))[1];
        $this->db->insert('rezervasyon', ['adsoy' => $adsoy, 'tel' => $tel, 'masaid' => $masaid, 'tarih' => $tarih, 'saat' => $saat, 'kul_id' => $this->session->userdata('kulid'), 'mesaj' => $mesaj
        ]);
        echo "oldu";

    }

    public function updaterezervasyon()
    {
        $adsoy = $this->input->post("upadsoyad");
        $tel = $this->input->post("uptel");
        $masaid = $this->input->post("upyetki");
        $mesaj = $this->input->post("upmesaj");
        $tarih = date("Y-m-d", strtotime(explode(" ", $this->input->post("uptarihsaat"))[0]));

        $saat = explode(" ", $this->input->post("uptarihsaat"))[1];


        $data = [
            'adsoy' => $adsoy, 'tel' => $tel, 'masaid' => $masaid, 'tarih' => $tarih, 'saat' => $saat, 'kul_id' => $this->session->userdata('kulid'), 'mesaj' => $mesaj
        ];

        $this->db->where('id', $this->input->post("upid"));
        $this->db->update('rezervasyon', $data);


        echo "oldu";

    }


    public function deleterezervasyon()
    {
        $action = $this->input->post('action');

        foreach ($action as $secilenid) {
            $this->db->where('id', $secilenid);
            $this->db->delete('rezervasyon');

            echo "oldu";

        }
    }

    public function listeyukle()
    {
        $isimRegex = '/^[\w\sıüçğöÜİÇĞÖ]*$/';
        $telRegex = '/^[5][0][5-7][0-9]{7}|^[5][3][0-9]{8}|^[5][4][0-9]{8}|^[5][5][0-9]{8}/';
        $inputFileName = $_FILES['file']['tmp_name'];
        $inputFileType = $this->spreadsheet->identify($inputFileName);
        $reader = $this->spreadsheet->createReader($inputFileType);
        $spreadsheet = $reader->load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        $i = 0;
        $eklenen = 0;
        $eklenemeyen = 0;


        if ($sheetData[1]['A'] != "Adı Soyadı"
            || $sheetData[1]['B'] != "Masa Adı"
            || $sheetData[1]['C'] != "Özel Gün Notu"
            || $sheetData[1]['D'] != "Tarih"
            || $sheetData[1]['E'] != "Saat"
            || $sheetData[1]['F'] != "Telefonu"
            || $sheetData[1]['G'] != "İşlemi Yapan") {
            echo "Şablon Hatalı";
            exit();

        }

        if (!isset($sheetData[2])) {
            echo 'Veri yok';
            exit();

        }

        for ($i = 2; $i <= count($sheetData); $i++) {
            $news = array();
            foreach ($sheetData[$i] as $colk => $colv) {
                if ($colk == "A") {
                    if (preg_match($isimRegex, $colv)==0) {
                        $eklenemeyen++;
                        break;
                    }
                    $col_map['adsoy'] = $colv;
                }
                if ($colk == "B") {
                    $col_map['masaid'] = $colv;
                }
                if ($colk == "C") {
                    $col_map['mesaj'] = $colv;
                }
                if ($colk == "D") {
                    $col_map['tarih'] = $colv;
                }
                if ($colk == "E") {
                    $col_map['saat'] = $colv;
                }
                if ($colk == "F") {
                    if (preg_match($telRegex, $colv)==0) {
                        $eklenemeyen++;
                        break;
                    }
                    $col_map['tel'] = $colv;
                }
                if ($colk == "G") {
                    $col_map['kul_id'] = $colv;
                }
            }
            $this->db->insert('rezervasyon', $col_map);
            $eklenen++;

        }
        echo $eklenen . " Adet Kayıt Başarıyla Eklendi. \n" . $eklenemeyen . " Adet Kayıt Eklenemedi.";


    }
}
