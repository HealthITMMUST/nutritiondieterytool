<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Add disease</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Add disease</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<form method="post" action="<?php echo base_url(); ?>index.php/diseases/addDisease" enctype="multipart/form-data">

		<div class="row">

			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Disease Information</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="inputName">Disease Name</label>
							<input type="text"  class="form-control" name="name"
								   placeholder="Provide the name of the disease" required>
						</div>
						<div class="form-group">
							<label for="inputDescription">Disease Description</label>
							<textarea class="form-control" rows="4" name="description"
									  placeholder="Provide a comprehensive description of the disease" required></textarea>
						</div>

						<div class="form-group">
							<label for="inputClientCompany">Disease Position</label>
							<input type="number" class="form-control" name="position"
								   placeholder="The position the disease will appear on the app" required>
						</div>

						<div class="form-group">
							<label>Disease icon</label>
							<div class="input-group">
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="icon"  required>
									<label class="custom-file-label">Provide the icon to appear
										with this disease</label>
								</div>

							</div>
						</div>


					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>

			<div class="col-md-12">
				<div class="card card-secondary card-info">
					<div class="card-header">
						<h3 class="card-title">
							Comprehensive Disease prevention
						</h3>
						<!-- tools box -->
						<div class="card-tools">
							<button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
									title="Collapse">
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
                <textarea class="textarea" placeholder="Place some text here" rows="7" name="prevention"  required
						  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
						</div>

					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="card card-secondary card-success">
					<div class="card-header">
						<h3 class="card-title">
							Comprehensive Disease nutrition info
						</h3>
						<!-- tools box -->
						<div class="card-tools">
							<button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
									title="Collapse">
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
                <textarea class="textarea" placeholder="Place some text here" rows="7" name="nutrition"  required
						  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
						</div>

					</div>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-12">
				<a href="#" class="btn btn-secondary">Cancel</a>
				<input type="submit" value="Add new disease" class="btn btn-success float-right">
			</div>
		</div>

		</form>

	</section>
	<!-- /.content -->

</div>
