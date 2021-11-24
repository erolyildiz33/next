<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Sayfası</title>
	<link href="<?=base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url();?>asset/css/dropzone.css" rel="stylesheet">
	<link href="<?=base_url();?>asset/css/bootstrap-table.css" rel="stylesheet">
	<link href="<?=base_url();?>asset/css/bootstrap-editable.css" rel="stylesheet" >
	<link href="<?=base_url();?>asset/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?=base_url();?>asset/css/86618a522dcd0b92cc9a34866e45fa9e.css" rel="stylesheet"> 
	<link href="<?=base_url();?>asset/css/jquery.datetimepicker.min.css" rel="stylesheet"> 
	<script src="<?=base_url();?>asset/js/jquery-3.2.1.min.js"></script>
	<script src="<?=base_url();?>asset/js/jquery.datetimepicker.full.min.js"></script>
	<script src="<?=base_url();?>asset/js/bootstrap.min.js"></script>
	<script src="<?=base_url();?>asset/js/dropzone.js"></script>
	<script src="<?=base_url();?>asset/js/bootstrap-table.js"></script>
	<script src="<?=base_url();?>asset/js/bootstrap-table-export.js"></script>
	<script src="<?=base_url();?>asset/js/bootstrap-table-tr-TR.js"></script>
	<script src="<?=base_url();?>asset/js/40aab700698a291c5ce712a44ec8bc34.js"></script>
	<script src="<?=base_url();?>asset/js/0e8ece31c98757dd3816d14f69a14d98.js"></script> 
</head>
<body>
	<nav class="navbar navbar-default navbar-inverse" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
			</button> <span class="navbar-brand">Next Republic</span>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<!--<ul class="nav navbar-nav">

				<li>
					<a href="user.php">Müşteri Paneli</a>
				</li>
			</ul>!-->
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a><?php echo $kullanici->isimsoyad ?></a>
				</li>

				<li>
					<a href="<?=base_url();?>auth/logout">Logout</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<div id="toolbar">
			<button id="remove" class="btn btn-danger" disabled>
				<i class="glyphicon glyphicon-remove"></i> Seçilileri Sil</button> 
				<button data-toggle="modal" data-target="#loginModal"class="btn btn-success" >
					<i class="glyphicon glyphicon-plus"></i> Kayıt Ekle</button> 
					<button data-toggle="modal" data-target="#uploadfile"class="btn btn-primary" >
						<i class="glyphicon glyphicon-import"></i> Excelden Yükle</button>
					</div>
					<div class="row-table" >
						<table id="table"  
						class="table table-bordered table-striped"
						data-height="530"
						data-locale="tr-TR"
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
						data-show-export="true">
						<thead>
							<tr>
								<th data-valign="middle"  data-field="state" data-checkbox="true" ></th>
								<th data-valign="middle" data-formatter="runningFormatter">Sıra No</th>
								<th data-valign="middle" data-formatter="saatFormatter" data-align="center" >Saat</th>
								<th data-valign="middle" data-field="tarih" data-align="center" >Tarih</th>
								<th data-valign="middle" data-field="adsoy" data-align="center" >Müsteri Ad ve Soyadı</th>
								<th data-valign="middle" data-field="tel" data-align="center">Telefon</th>
								<th data-valign="middle" data-field="ad" data-align="center">Masa No</th>
								<th data-valign="middle" data-field="mesaj" data-align="center">Özel Gün Kutlaması</th>
								<th data-valign="middle" data-click-to-select="false" data-events="operateEvents" data-formatter="operateFormatter" data-field="operate" data-align="center">KAYIT GÖRÜNTÜLE<br />KAYIT DÜZENLE<br />SİL</th>
							</tr>
						</thead>
					</table> 
				</div> 
			</div>
			<div class="col-md-12">
				<div class="modal fade" id="loginModal" data-backdrop="static" data-keyboard="false"  tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true"> 
					<div class="modal-dialog "> 
						<div class="modal-content">
							<div class="modal-header"> 
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span> 
								</button> 
								<h5 id="modalHeader" class="modal-title">Rezervasyon Kayıt Forumu</h5> 
							</div> 
							<div class="modal-body"> <!-- The form is placed inside the body of modal --> 
								<form id="loginForm" method="post" class="form-horizontal"> 
									
									<div class="form-group"> 
										<label class="col-xs-3 control-label">Müsteri Ad ve Soyadı</label> 
										<div class="col-xs-7"> 
										  <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

											<input class="form-control" name="adsoyad" type="text" id="adsoyad" placeholder="İsim Soyisim Giriniz" />
										</div>
									</div> 
									<div class="form-group"> 
										<label class="col-xs-3 control-label">Telefonu</label> 
										<div class="col-xs-7">
											<input class="form-control" name="tel" type="text" id="tel" placeholder="Örn.:5XXXXXXXXX" maxlength="10" />
										</div> 
									</div>
									<div class="form-group"> 
										<label class="col-xs-3 control-label">Masa Seçimi</label> 
										<div class="col-xs-7">
											<select class="form-control" name="yetki"  id="yetki" >
												<option value="">Masa Seçiniz</option>
												<?php
												$query = $this->db->get('masalar');
												foreach ($query->result() as $row)
													{ ?><option value="<?=$row->id?>"><?=$row->ad?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group"> 
									<label class="col-xs-3 control-label">Özel Gün Kutlama</label> 
									<div class="col-xs-7">
										<textarea class="form-control" name="mesaj"  id="mesaj" placeholder="Mesajınızı Yazınız" rows="5" ></textarea>
									</div> 
								</div>
								<div class="form-group"> 
									<label class="col-xs-3 control-label">Tarih Ve Saati</label> 
									<div class="col-xs-7">
										<input id="tarihsaat" name="tarihsaat" type="text" >
									</div>
								</div>

								<div class="form-group"> 
									<div class="col-xs-6 col-xs-offset-4">
										<button id="kayit" type="submit" class="btn btn-primary">Kaydet</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">İptal</button> 
										
									</div> 
								</div> 
							</form> 
						</div>
					</div> 
				</div> 
			</div> 
			<div class="modal fade" id="updModal" tabindex="-1" role="dialog" aria-labelledby="Update" aria-hidden="true"> 
				<div class="modal-dialog "> 
					<div class="modal-content">
						<div class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span> 
							</button> 
							<h5 id="modalHeader" class="modal-title">Rezervasyon Güncelleme Forumu</h5> 
						</div> 
						<div class="modal-body"> <!-- The form is placed inside the body of modal --> 
							<form id="UpdateForm" method="post" class="form-horizontal"> 

								<div class="form-group"> 
									<label class="col-xs-3 control-label">Müsteri Ad ve Soyadı</label> 
									<div class="col-xs-7"> 
										<input type="hidden" name="upid" id="upid" />
										  <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

										<input class="form-control" name="upadsoyad" type="text" id="upadsoyad" placeholder="İsim Soyisim Giriniz" />
									</div>
								</div> 
								<div class="form-group"> 
									<label class="col-xs-3 control-label">Telefonu</label> 
									<div class="col-xs-7">
										<input class="form-control" name="uptel" type="text" id="uptel" placeholder="Örn.:5XXXXXXXXX" maxlength="10" />
									</div> 
								</div>
								<div class="form-group"> 
									<label class="col-xs-3 control-label">Masa Seçimi</label> 
									<div class="col-xs-7">
										<select class="form-control" name="upyetki"  id="upyetki" >
											<option value="">Masa Seçiniz</option>
											<?php
											$query = $this->db->get('masalar');
											foreach ($query->result() as $row)
												{ ?><option value="<?=$row->id?>"><?=$row->ad?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group"> 
								<label class="col-xs-3 control-label">Özel Gün Kutlama</label> 
								<div class="col-xs-7">
									<textarea class="form-control" name="upmesaj"  id="upmesaj" placeholder="Mesajınızı Yazınız" rows="5" ></textarea>
								</div> 
							</div>
							<div class="form-group"> 
								<label class="col-xs-3 control-label">Tarih Ve Saati</label> 
								<div class="col-xs-7">
									<input id="uptarihsaat" name="uptarihsaat" type="text" >
								</div>
							</div>

							<div class="form-group"> 
								<div class="col-xs-6 col-xs-offset-4">
									<button id="guncelle" type="submit" class="btn btn-primary">Güncelle</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">İptal</button> 
								</div> 
							</div> 
						</form> 
					</div>
				</div> 
			</div> 
		</div>  

		<div class="modal fade" id="uploadfile" tabindex="-1" role="dialog" aria-labelledby="Update" aria-hidden="true"> 
			<div class="modal-dialog"> 
				<div class="modal-content">
					<div class="modal-header"> 
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span> 
						</button> 
						<h5 id="modalHeader" class="modal-title">Excelden Liste Yükleme Formu</h5> 
					</div> 
					<div class="modal-body"> 
						<div class="form-group"style="overflow: auto"> 
							<div class="dropzone" id="uploadDrop">
								<center> <a href="asset/files/SablonUsers.xlsx" > <img src="asset/images/sablon_exel.png" width="120" height="120" /></a></center>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="form-group"> 
							<div class="col-xs-6 col-xs-offset-2">
								<button name="yukle" id="yukle" type="button" class="btn btn-primary">Yükle</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">İptal</button>

							</div> 
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
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
		var myDropzone = new Dropzone('div#uploadDrop', { acceptedMimeTypes:'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel', url: "asset/admin/import.php", maxFiles:1,
			init: function() {
				this.on('addedfile', function(file) {
					if (this.files.length > 1) {
						alert("sadece bir dosya yükleyebilirsin");
						this.removeFile(this.files[1]);
					}
				});
			}, autoProcessQueue: false, addRemoveLinks: true });
		$('#yukle').on('click' , function()
		{

			myDropzone.processQueue();
			myDropzone.on("success", function (file, cevap) {

				alert(cevap);
				this.removeAllFiles();
				$('#table').bootstrapTable('refresh');
				$("#uploadfile").modal('hide');

			});   
		});  
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
				var ids = getIdSelections();
				$table.bootstrapTable('remove', {
					field: 'id',
					values: ids
				});{$.ajax({
					url: '<?=base_url()?>admin/deleterezervasyon',
					data: {action: ids,"<?= $this->security->get_csrf_token_name(); ?>" :"<?= $this->security->get_csrf_hash(); ?>"},
					type: 'post',
					success: function() { $('#table').bootstrapTable('refresh');
				}
			});}
				$remove.prop('disabled', true);
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
			'<a class="like" href="javascript:void(0)" title="Rezervasyon Bilgilerini Güncelle">',
			'<i class="glyphicon glyphicon-edit" />',
			'</a> ',
			'<a class="remove" href="javascript:void(0)" title="Müşteriyi Sil">',
								'<i class="glyphicon glyphicon-remove"> </i>',
								'</a> '							 
			].join('');

		}

		window.operateEvents = {
			'click .like': function (e, value, row, index) {
			
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
				$table.bootstrapTable('remove', {
					field: 'id',
					values: [row.id]
				});{$.ajax({
					url: '<?=base_url()?>admin/deleterezervasyon',
					data: {action: [row.id],"<?= $this->security->get_csrf_token_name(); ?>" :"<?= $this->security->get_csrf_hash(); ?>"},
					type: 'post',
					success: function() { $('#table').bootstrapTable('refresh');
				}
			});
			}
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
	$(function () {
		var scripts = [
		location.search.substring(1) || 'asset/js/bootstrap-table.js',
		'asset/js/bootstrap-table-export.js',
		'asset/js/tableExport.js'
		],
		eachSeries = function (arr, iterator, callback) {
			callback = callback || function () {};
			if (!arr.length) {
				return callback();
			}
			var completed = 0;
			var iterate = function () {
				iterator(arr[completed], function (err) {
					if (err) {
						callback(err);
						callback = function () {};
					}
					else {
						completed += 1;
						if (completed >= arr.length) {
							callback(null);
						}
						else {
							iterate();
						}
					}
				});
			};
			iterate();
		};
		eachSeries(scripts, getScript, initTable);
	});

	function getScript(url, callback) {
		var head = document.getElementsByTagName('head')[0];
		var script = document.createElement('script');
		script.src = url;
		var done = false;
		script.onload = script.onreadystatechange = function() {
			if (!done && (!this.readyState ||
				this.readyState == 'loaded' || this.readyState == 'complete')) {
				done = true;
			if (callback)
				callback();
			script.onload = script.onreadystatechange = null;
		}
	};
	head.appendChild(script);
	return undefined;
}
var onResize = function() {
	$("body").css("padding-top", $(".navbar-fixed-top").height());
};
$(window).resize(onResize);
$(function() {
	onResize();
});
$(document).ready(function() { 



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
				alert("Kayıt Başarılı");
			}else{
				alert(sonuc);
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
				uptc: { 
					validators: { 
						notEmpty: { 
							message: 'Bu Alan Zorunludur!' }, 
							regexp: {
								regexp: /\d{11}/,
								message: 'TCK No Hatali Girdiniz!'
							}
						}
					},
					upns: { 
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
										message: 'Yetki Seçiniz!',

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
				alert("Güncelleme Başarılı");
			}
			else {alert(sonuc);
			}
		}
	}); 
	}) 
	.end();
	$('#userpassForm').formValidation({ 
		framework: 'bootstrap', 
		excluded: ':disabled', 
		icon: { 
			valid: 'glyphicon glyphicon-ok', 
			invalid: 'glyphicon glyphicon-remove', 
			validating: 'glyphicon glyphicon-refresh' },
			fields: { 
				uppass1: { 
					validators: { 
						notEmpty: { 
							message: 'Bu Alan Zorunludur!' },
							regexp: {
								regexp: /.{1,}/,
								message: 'Şifreniz en az 1 Karakter Olmalıdır!'
							}
						}
					},
					uppass2: { 
						validators: { 
							notEmpty: { 
								message: 'Bu Alan Zorunludur.' },
								regexp: {
									regexp: /.{1,}/,
									message: 'Şifreniz en az 1 Karakter Olmalıdır!'
								},
								identical: {
									field: 'uppass1',
									message: 'Şifreler Uyuşmuyor'
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
			url: "asset/admin/updateuser.php",
			type: 'POST',
			data: $form.serialize(),
			success: function(sonuc) { if (sonuc=='oldu'){
				$('#table').bootstrapTable('refresh');
				$("#userpassModal") .modal('hide');
				fv.resetForm(true);        
				fv.disableSubmitButtons(true);
				alert("Güncelleme Başarılı");
			}
			else {alert(sonuc);
			}
		}
	});
	}) 
	.end();
});

</script>
</body>
</html>