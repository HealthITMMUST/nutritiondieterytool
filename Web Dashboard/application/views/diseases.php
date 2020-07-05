	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Diseases</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Disease</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Diseases list</h3>
								<div class="card-tools">
									<a href="<?php echo base_url(); ?>index.php/diseases/add" type="button"  class="btn btn-sm btn-primary pull-right">Add disease</a>
								</div>
							</div>
							<!-- /.card-header -->
							<div class="card-body table-responsive p-0" style="height: 500px;">
								<table class="table table-hover">
									<thead>
									<tr>

										<th>#</th>
										<th>Disease name</th>
										<th class="col-2">Description</th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
									</thead>
									<tbody>
									<?php
									if (!empty($diseases)){

										foreach ($diseases as $key => $disease){

											$diseaseName = $disease->name;
											$diseaseDesc = $disease->description;
											$diseaseId = $disease->id;
											?>
											<tr>
												<td><?php echo $key + 1; ?></td>
												<td><?php echo $diseaseName; ?></td>
												<td ><?php echo $diseaseDesc; ?></td>
												<td> <a href="<?php echo base_url(); ?>index.php/diseases/edit/<?php echo $diseaseId; ?>" type="button"  class="btn btn-sm btn-success">Edit</a> </td>
												<td> <a href="<?php echo base_url(); ?>index.php/diseases/deleteDisease/<?php echo $diseaseId; ?>" type="button"  class="btn btn-sm btn-danger">Delete</a> </td>
												<td> <a href="<?php echo base_url(); ?>index.php/diseases/disease/<?php echo $diseaseId; ?>" type="button"  class="btn btn-sm btn-primary">More</a> </td>
											</tr>
									<?php

										}
									}
									?>
									</tbody>
								</table>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
				</div>

				<!--  -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>

