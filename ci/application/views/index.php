<div id="toolbar">
  <button id="remove" class="btn btn-danger" disabled>
    <i class="glyphicon glyphicon-remove"></i> Seçilileri Sil</button> 
    <button data-toggle="modal" data-target="#loginModal"class="btn btn-success" >
      <i class="glyphicon glyphicon-plus"></i> Kayıt Ekle</button> 
      <button data-toggle="modal" data-target="#uploadfile"class="btn btn-primary" >
        <i class="glyphicon glyphicon-import"></i> Excelden Yükle</button>
      </div>
      <div class="row-table" >
        <div class="table-responsive" style="overflow-x: hidden!important;">
          <table id="table"  
          class="table table-bordered table-striped"
          data-height="530"

          data-toggle="table" 
          data-toolbar="#toolbar"
          data-search="true"
          data-show-refresh="true"
          data-show-columns="true"
          data-pagination="true" 
          data-page-list="[25, 50, 100, ALL]"
          data-show-footer="false"
          data-side-pagination="client"
          data-url="<?=base_url();?>admin/getcustomers"
          data-click-to-select="true"
          data-export-types="['json', 'xml', 'csv', 'txt', 'sql', 'excel', 'pdf']",
          data-show-export="true">
          <thead>
            <tr>
              <th data-valign="middle"  data-field="state" data-checkbox="true" ></th>
              <th data-valign="middle" data-formatter="runningFormatter">Sıra No</th>
              <th data-valign="middle" data-formatter="saatFormatter" data-align="center" >Saat</th>
              <th data-valign="middle" data-field="tarih" data-align="center" >Tarih</th>
              <th data-valign="middle" data-field="adsoy" data-align="center" >Müsteri Ad ve Soyadı</th>
              <th data-valign="middle" data-field="tel" data-align="center">Telefon</th>
              <th data-valign="middle" data-field="masa_ad" data-align="center">Masa No</th>
              <th data-valign="middle" data-field="mesaj" data-align="center">Özel Gün Kutlaması</th>
              <th  data-valign="middle"   data-click-to-select="false" data-events="operateEvents" data-formatter="operateFormatter" data-field="operate" data-align="center">KAYIT GÖRÜNTÜLE<br />KAYIT DÜZENLE<br />SİL</th>
            </tr>
          </thead>
        </table> 
      </div>
    </div> 
    <div class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true" id="loginModal" data-backdrop="static" data-keyboard="false"  aria-labelledby="Login">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="loginForm" method="post" class="form-horizontal"> 
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Rezervasyon Kayıt Forumu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="form-group row">
                <label for="adsoyad" class="col-sm-2 col-form-label">Müsteri Ad ve Soyadı</label>
                <div class="col-sm-10">
                  <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                  <input class="form-control" name="adsoyad" type="text" id="adsoyad" placeholder="İsim Soyisim Giriniz" />
                </div>
              </div>
              <div class="form-group row">
                <label for="tel" class="col-sm-2 col-form-label">Telefonu</label>
                <div class="col-sm-10">
                  <input class="form-control" name="tel" type="text" id="tel" placeholder="Örn.:5XXXXXXXXX" maxlength="10" />
                </div>
              </div>
              <div class="form-group row">
                <label for="yetki" class="col-sm-2 col-form-label">Masa Seçimi</label>
                <div class="col-sm-10">
                 <select class="form-control" name="yetki"  id="yetki" >
                  <option value="">Masa Seçiniz</option>
                  <?php
                  $query = $this->db->get('masalar');
                  foreach ($query->result() as $row)
                    { ?><option value="<?=$row->masa_id?>"><?=$row->masa_ad?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="mesaj" class="col-sm-2 col-form-label">Özel Gün Kutlama</label>
            <div class="col-sm-10">
             <textarea class="form-control" name="mesaj"  id="mesaj" placeholder="Mesajınızı Yazınız" rows="5" ></textarea>
           </div>
         </div>
         <div class="form-group row">
          <label for="tel" class="col-sm-2 col-form-label">Tarih Ve Saati</label>
          <div class="col-sm-10">
           <input id="tarihsaat" name="tarihsaat" type="text" >
         </div>
       </div>

     </div>
     <div class="modal-footer">
       <button id="kayit" type="submit" class="btn btn-primary">Kaydet</button>
       <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button> 
     </div>
   </form>
 </div>
</div>
</div>


<div class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true" id="updModal" data-backdrop="static" data-keyboard="false"  aria-labelledby="Update">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <form id="UpdateForm" method="post" class="form-horizontal"> 
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rezervasyon Güncelleme Forumu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group row">
          <label for="upadsoyad" class="col-sm-2 col-form-label">Müsteri Ad ve Soyadı</label>
          <div class="col-sm-10">
           <input type="hidden" name="upid" id="upid" />
           <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
           <input class="form-control" name="upadsoyad" type="text" id="upadsoyad" placeholder="İsim Soyisim Giriniz" />
         </div>
       </div>
       <div class="form-group row">
        <label for="uptel" class="col-sm-2 col-form-label">Telefonu</label>
        <div class="col-sm-10">
          <input class="form-control" name="uptel" type="text" id="uptel" placeholder="Örn.:5XXXXXXXXX" maxlength="10" />
        </div>
      </div>
      <div class="form-group row">
        <label for="upyetki" class="col-sm-2 col-form-label">Masa Seçimi</label>
        <div class="col-sm-10">
         <select class="form-control" name="upyetki"  id="upyetki" >
          <option value="">Masa Seçiniz</option>
          <?php
          $query = $this->db->get('masalar');
          foreach ($query->result() as $row)
            { ?><option value="<?=$row->masa_id?>"><?=$row->masa_ad?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="upmesaj" class="col-sm-2 col-form-label">Özel Gün Kutlama</label>
    <div class="col-sm-10">
     <textarea class="form-control" name="upmesaj"  id="upmesaj" placeholder="Mesajınızı Yazınız" rows="5" ></textarea>
   </div>
 </div>
 <div class="form-group row">
  <label for="uptarihsaat" class="col-sm-2 col-form-label">Tarih Ve Saati</label>
  <div class="col-sm-10">
   <input id="uptarihsaat" name="uptarihsaat" type="text" >
 </div>
</div>

</div>
<div class="modal-footer">
 <button id="guncelle" type="submit" class="btn btn-primary">Güncelle</button>
 <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button> 
</div>
</form>
</div>
</div>
</div>



<div class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true" id="uploadfile" data-backdrop="static" data-keyboard="false"  aria-labelledby="Update">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excelden Liste Yükleme Formu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group"style="overflow: auto"> 
          <div class="dropzone" id="uploadDrop">
            <center> <a href="<?=base_url()?>/assets/files/Sablon.xlsx" > <img src="<?=base_url()?>/assets/images/sablon_exel.png" width="120" height="120" /></a></center>
          </div>
        </div>


      </div>
      <div class="modal-footer">
       <button  name="yukle" id="yukle" type="button" class="btn btn-primary">Yükle</button>
       <button type="button" class="btn btn-default" data-dismiss="modal">İptal</button> 
     </div>
   </div>
 </div>
</div>




<link href="<?=base_url('assets');?>/dist/css/bootstrap-table.min.css" rel="stylesheet">
<link href="<?=base_url('assets');?>/dist/css/jquery.datetimepicker.min.css" rel="stylesheet"> 
<link rel="stylesheet" href="<?=base_url('assets');?>/dist/css/sweetalert2.min.css">
<link href="<?=base_url('assets');?>/dist/css/dropzone.css" rel="stylesheet">


<script src="<?=base_url('assets');?>/dist/js/sweetalert2.min.js"></script>
<script src="<?=base_url('assets');?>/dist/js/jquery.datetimepicker.full.min.js"></script>
<script src="<?=base_url('assets');?>/dist/js/bootstrap-table.min.js"></script>
<script src="<?=base_url('assets');?>/dist/js/bootstrap-table-export.min.js"></script>
<script src="<?=base_url('assets');?>/dist/js/tableExport.min.js"></script>
<script src="<?=base_url('assets');?>/dist/js/jspdf.min.js"></script>
<script src="<?=base_url('assets');?>/dist/js/bootstrap-table-editable.min.js"></script>
<script src="<?=base_url('assets');?>/dist/js/bootstrap-table-tr-TR.min.js"></script>
<script src="<?=base_url('assets');?>/dist/js/40aab700698a291c5ce712a44ec8bc34.js"></script>
<script src="<?=base_url('assets');?>/dist/js/dropzone.js"></script>

<script>

  var date = new Date();

  var year = date.getFullYear();
  var month = date.getMonth() + 1;
  var day = date.getDate();
  var hours = date.getHours();
  jQuery.datetimepicker.setLocale('tr');
  jQuery('#tarihsaat').datetimepicker({
    value:day + "." + month + "." + year + " " + hours + ":00",
    format:'d.m.Y H:i',
    inline:true,
    lang:'tr',

  })




  jQuery('#uptarihsaat').datetimepicker({
    format:'d.m.Y H:i',
    inline:true,
    lang:'tr',

  });

  Dropzone.autoDiscover = false; 
  var myDropzone = new Dropzone('div#uploadDrop', { acceptedMimeTypes:'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel', url: "<?=base_url()?>admin/listeyukle", maxFiles:1,

    headers: {'X-CSRFToken': '<?= $this->security->get_csrf_hash(); ?>'},
    init: function() {
      this.on('addedfile', function(file) {
        if (this.files.length > 1) {
          alert("sadece bir dosya yükleyebilirsin");
          this.removeFile(this.files[1]);
        }
      });
    }, autoProcessQueue: false, addRemoveLinks: true });
  myDropzone.on("sending", function (file, xhr, formData) {
   formData.append("<?= $this->security->get_csrf_token_name(); ?>","<?= $this->security->get_csrf_hash(); ?>");

 });
  $('#yukle').on('click' , function()
  {

    myDropzone.processQueue();
    myDropzone.on("success", function (file, cevap) {

      alert(cevap);
      this.removeAllFiles();
      $('#table').bootstrapTable('refresh');
      $("#uploadfile").modal('hide');

    });   
  }); /* */
  function runningFormatter(value, row, index) {return index+1;}   
  function saatFormatter(value, row, index) {

    return row.saat.split(":")[0]+":"+row.saat.split(":")[1];
  }  
  var $table = $('#table'),
  $remove = $('#remove'),
  selections = [];
  function initTable() {
    $table.bootstrapTable({
      height: getHeight(),
      columns: [

      {
        field: 'state',
        checkbox: true,

        align: 'center',
        valign: 'middle'
      }, {
        title: 'Item ID',
        field: 'id',
        align: 'center',
        valign: 'middle',
        sortable: true,

      },      
      {
        field: 'operate',
        title: 'Item Operate',
        align: 'center',
        events: operateEvents,
        formatter: operateFormatter
      }
      ]

    });
    setTimeout(function () {
      $table.bootstrapTable('resetView');
    }, 200);
    $table.on('check.bs.table uncheck.bs.table ' +
      'check-all.bs.table uncheck-all.bs.table', function () {
        $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
        selections = getIdSelections();
      });
    $table.on('expand-row.bs.table', function (e, index, row, $detail) {
      if (index % 2 == 1) {
        $detail.html('Loading from ajax request...');
        $.get('LICENSE', function (res) {
          $detail.html(res.replace(/\n/g, '<br>'));
        });
      }
    });
    $table.on('all.bs.table', function (e, name, args) {

    });
    $remove.click(function () {


     Swal.fire({
      icon: 'warning',
      title: 'Seçili Tüm Kayıtlar Silinsin mi?',
      text: 'Silinen Kayıt Geri Alınamaz!',

      showCancelButton: true,
      cancelButtonText: 'Vazgeç',
      confirmButtonText: 'Evet Sil!',
      confirmButtonColor:"#dc3545",
    }).then((result) => {
      if (result.isConfirmed) {
       var ids = getIdSelections();
       $table.bootstrapTable('remove', {
        field: 'id',
        values: ids
      });{
        $.ajax({
          url: '<?=base_url()?>admin/deleterezervasyon',
          data: {action: ids,"<?= $this->security->get_csrf_token_name(); ?>" :"<?= $this->security->get_csrf_hash(); ?>"},
          type: 'post',
          success: function() { $('#table').bootstrapTable('refresh');
          Swal.fire('Silme İşlemi Başarılı', '', 'success');

        }
      });
      }
      $remove.prop('disabled', true);
    } else if (result.isDenied) {
      Swal.fire('Silme Başarısız', '', 'error')
    }
  });

















  });











    $(window).resize(function () {
      $table.bootstrapTable('resetView', {
        height: getHeight()
      });
    });
  }




  var arr;
  function getSelectedRow() {
    var index = $table.find('tr.success').data('index');
    return $table.bootstrapTable('getData')[index];
  }
  function getIdSelections() {
    return $.map($table.bootstrapTable('getSelections'), function (row) {
      return row.id
    });
  }
  function responseHandler(res) {
    $.each(res.rows, function (i, row) {
      row.state = $.inArray(row.id, selections) !== -1;
    });
    return res;
  }
  function detailFormatter(index, row) {
    var html = [];
    $.each(row, function (key, value) {
      html.push('<p><b>' + key + ':</b> ' + value + '</p>');
    });
    return html.join('');
  }
  function operateFormatter(value, row, index) {
    return [
    '<a class="look pr-3" href="javascript:void(0)" title="Kayıt Görüntüle"><i class="fa fa-search"></i></a>'+
    '<a class="like pr-3" href="javascript:void(0)" title="Kayıt Güncelle"><i class="fa fa-edit"></i></a>'+

    '<a class="remove" href="javascript:void(0)" title="Kaydı Sil"><i class="fa fa-trash"></i></a>'              
    ].join('');

  }

  window.operateEvents = {
    'click .look': function (e, value, row, index) {



    },
    'click .like': function (e, value, row, index) {
      console.log(row);
      var tarih=row.tarih.split("-")[2]+"."+row.tarih.split("-")[1]+"."+row.tarih.split("-")[0];

      var tarihsaat=tarih+" "+row.saat;
      console.log(tarihsaat);
      $("#updModal").modal('show');
      $("#upadsoyad").val(row.adsoy);
      $("#uptel").val(row.tel);
      $("#upmesaj").val(row.mesaj);
      $("#upid").val(row.id);
      $("#upyetki").val(row.masaid);
      $("#uptarihsaat").datetimepicker({
        inline:true,
        lang:'tr',
        value:tarihsaat,
        format:'d.m.Y H:i',

      });

    },
    'click .remove': function (e, value, row, index) {


      Swal.fire({
        icon: 'warning',
        title: 'Rezervasyon Silinsin mi?',
        text: 'Silinen Kayıt Geri Alınamaz!',

        showCancelButton: true,
        cancelButtonText: 'Vazgeç',
        confirmButtonText: 'Evet Sil!',
        confirmButtonColor:"#dc3545",
      }).then((result) => {
        if (result.isConfirmed) {

          $table.bootstrapTable('remove', {
            field: 'id',
            values: [row.id]
          });{$.ajax({
            url: '<?=base_url()?>admin/deleterezervasyon',
            data: {action: [row.id],"<?= $this->security->get_csrf_token_name(); ?>" :"<?= $this->security->get_csrf_hash(); ?>"},
            type: 'post',
            success: function() { $('#table').bootstrapTable('refresh'); Swal.fire('Silme İşlemi Başarılı', '', 'success');
          }
        });
        }




      } else if (result.isDenied) {
        Swal.fire('Silme Başarısız', '', 'error')
      }
    });

    },
    'click .update': function (e, value, row, index) {
      $("#userpassModal").modal('show');
      $("#upuserid").val(row.id);
    }
  };
  function totalTextFormatter(data) {
    return 'Total';
  }
  function totalNameFormatter(data) {
    return data.length;
  }
  function getHeight() {
    return $(window).height() - $('h1').outerHeight(true);
  }


  var onResize = function() {
    $("body").css("padding-top", $(".navbar-fixed-top").height());
  };
  $(window).resize(onResize);
  $(function() {
    onResize();
  });

  $(document).ready(function() { 

    initTable();

    $('#loginForm').formValidation({ 
      framework: 'bootstrap', 
      excluded: ':disabled', 
      icon: { 
        valid: 'glyphicon glyphicon-ok', 
        invalid: 'glyphicon glyphicon-remove', 
        validating: 'glyphicon glyphicon-refresh' },
        fields: { 

          adsoyad: { 
            validators: { 
              notEmpty: { 
                message: 'Bu Alan Zorunludur!' }, 
                regexp: {
                  regexp:  /^[\w\sıüçğöÜİÇĞÖ]*$/,
                  message: 'İsim Soyisim Dogru Girdiniz!'
                }
              }
            },
            tel: { 
              validators: { 
                notEmpty: { 
                  message: 'Bu Alan Zorunludur!' }, 
                  regexp: {
                    regexp: /^[5][0][5-7][0-9]{7}|^[5][3][0-9]{8}|^[5][4][0-9]{8}|^[5][5][0-9]{8}/,
                    message: 'Telefonu Doğru Yazınız!'
                  }
                }
              },


              yetki: { 
                validators: {
                  notEmpty:{
                    message: 'Masa Seçiniz!',
                  }               
                }
              }
            }
          }) 
    .on('success.form.fv', function(e) {
      e.preventDefault();
      var $form = $(e.target),
      fv    = $form.data('formValidation');
      $.ajax({
        url: "<?=base_url()?>admin/addrezervasyon",
        type: 'POST',
        data: $form.serialize(),
        success: function(sonuc) { if (sonuc=='oldu'){


          $('#table').bootstrapTable('refresh');
          $("#loginModal") .modal('hide');
          fv.resetForm(true);        
          fv.disableSubmitButtons(true); 
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Rezervasyon Başarı İle Eklendi.',
            showConfirmButton: false,
            timer: 1500
          });

        }else{
          Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Rezervasyon Eklenemedi.',
            showConfirmButton: false,
            timer: 1500
          });


        }
      }
    }); 
    }) 
    .end();
    $('#UpdateForm').formValidation({ 
      framework: 'bootstrap', 
      excluded: ':disabled', 
      icon: { 
        valid: 'glyphicon glyphicon-ok', 
        invalid: 'glyphicon glyphicon-remove', 
        validating: 'glyphicon glyphicon-refresh' },
        fields: { 

          upadsoyad: { 
            validators: { 
              notEmpty: { 
                message: 'Bu Alan Zorunludur!' }, 
                regexp: {
                  regexp:  /^[\w\sıüçğöÜİÇĞÖ]*$/,
                  message: 'İsim Soyisim Dogru Girdiniz!'
                }
              }
            },
            uptel: { 
              validators: { 
                notEmpty: { 
                  message: 'Bu Alan Zorunludur!' }, 
                  regexp: {
                    regexp: /^[5][0][5-7][0-9]{7}|^[5][3][0-9]{8}|^[5][4][0-9]{8}|^[5][5][0-9]{8}/,
                    message: 'Telefonu Doğru Yazınız!'
                  }
                }
              },


              upyetki: { 
                validators: {
                  notEmpty:{
                    message: 'Masa Seçiniz!',
                  }               
                }
              }
            }
          })
    .on('success.form.fv', function(e) {
      e.preventDefault();
      var $form = $(e.target),
      fv    = $form.data('formValidation');
      $.ajax({
        url: "<?=base_url()?>admin/updaterezervasyon",
        type: 'POST',
        data: $form.serialize(),
        success: function(sonuc) { if (sonuc=='oldu'){
          $('#table').bootstrapTable('refresh');
          $("#updModal") .modal('hide');
          fv.resetForm(true);        
          fv.disableSubmitButtons(true);
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Rezervasyon Başarı ile Güncellendi.',
            showConfirmButton: false,
            timer: 1500
          });

        }
        else {
          Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Rezervasyon Güncellenemedi',
            showConfirmButton: false,
            timer: 1500
          });


        }
      }
    }); 
    })
    .end();
  });


</script>