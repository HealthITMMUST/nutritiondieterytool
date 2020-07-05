
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Health Pile login</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php  echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?php  echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php  echo base_url(); ?>assets/dist/css/adminlte.min.css">

	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/dist/img/health_pile_logo.png"/>

</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a><b>Health</b>PILE</a>
	</div>
	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Sign in to start your session</p>

			<form action="<?php echo base_url()?>index.php/login/authenticate" method="post">
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Username" name="username" required>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" placeholder="Password" name="password" required>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">

					<div class="col-4 right" >
						<button type="submit" class="btn btn-primary btn-block">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

		</div>
		<!-- /.login-card-body -->
	</div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="<?php  echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php  echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php  echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

</body>
</html>
