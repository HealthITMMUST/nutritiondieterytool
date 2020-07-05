
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Text Editors</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Text Editors</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-outline card-info">
						<div class="card-header">
							<h3 class="card-title">
								Bootstrap WYSIHTML5
								<small>Simple and fast</small>
							</h3>
							<!-- tools box -->
							<div class="card-tools">
								<button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" title="Collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" title="Remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
							<!-- /. tools -->
						</div>
						<!-- /.card-header -->
						<div class="card-body pad">
							<div class="mb-3">
                <textarea class="textarea" placeholder="Place some text here"
						  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
							</div>
							<p class="text-sm mb-0">
								Editor <a href="https://github.com/summernote/summernote">Documentation and license
									information.</a>
							</p>
						</div>
					</div>
				</div>
				<!-- /.col-->
			</div>
			<!-- ./row -->
		</section>
		<!-- /.content -->
	</div>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php  echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php  echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php  echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php  echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="<?php  echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
	$(function () {
		// Summernote
		$('.textarea').summernote()
	})
</script>
</body>
</html>
