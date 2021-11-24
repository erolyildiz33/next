<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Log in (v2)</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url('assets')?>/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?=base_url('assets')?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url('assets')?>/dist/css/adminlte.min.css">
	<script src="<?=base_url('assets')?>/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?=base_url('assets')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url('assets')?>/dist/js/adminlte.min.js"></script>
	<script src= "<?=base_url('assets');?>/dist/js/bootstrap-notify.js" type="text/javascript"></script>

</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="<?=base_url('assets')?>/index2.html" class="h1"><b>Admin</b>LTE</a>
			</div>
			<div class="card-body">


				<form  id="form" class="form-signin" role="form" name="gonder" action="<?=base_url()?>admin" method="post">
					<div class="input-group mb-3">
						<input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
						<input type="text" class="form-control" id="user" name="user" placeholder="Kullanıcı Adınız">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" name="pass" id="pass" class="form-control" placeholder="Şifreniz">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">

						<!-- /.col -->
						<div class="col-12">
							<button type="button" class="btn btn-primary btn-block" id="gbuton">Giriş Yap</button>
						</div>
						<!-- /.col -->
					</div>
				</form>


    <!--

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>

    </p>!-->
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.login-box -->

<script>
	$(document).ready(function(){
		$('#pass').keypress(function(e){
			if(e.keyCode==13)
				$('#gbuton').click();
		});
	});
	$(document).ready(function(){
		$('#user').keypress(function(e){
			if(e.keyCode==13)
				$('#pass').focus();
		});
	});

	$(document).ready(function(){
	    $("#gbuton").click(function(){
	        var degerler = $("form").serialize();

		
		

		$.post("<?=base_url()?>auth/login",degerler,function(cevap){
			if (cevap=='oldu'){
				oldu();
				setTimeout(function(){document.forms["form"].submit();},6000); 
			    
			}else{
					olmadi();
				}
		    
		});
	        
	    });
	    
	});


	function oldu(){
		var notify = $.notify('<strong>Kontrol Ediliyor</strong> Lütfen Sayfayı Kapatmayınız', 
		{
			allow_dismiss: false,
			showProgressbar: true,
			placement: {
				from: "top",
				align: "center"
			}
		});
		setTimeout(function() {
			notify.update({'type': 'success', 'message': '<strong>Başarılı</strong> Giriş Yapılıyor', 'progress': 30});
		}, 3500);
	
	
	};
	function olmadi(){
		var notify = $.notify('<strong>Kontrol Ediliyor</strong> Lütfen Sayfayı Kapatmayınız', 
		{
			allow_dismiss: false,
			showProgressbar: true,
			placement: {
				from: "top",
				align: "center"
			}
			
		});
		setTimeout(function() {
			notify.update({'type': 'danger', 'message': '<strong>Hatalı</strong> Giriş Bilgileri', 'progress': 30});}, 3500);
		
	};

</script>
<!-- jQuery -->

</body>
</html>
