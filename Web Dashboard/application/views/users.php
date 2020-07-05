	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Users</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Users</li>
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
								<h3 class="card-title">Users list</h3>
								<div class="card-tools">
									<button data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-primary pull-right">Add User</button>
								</div>
							</div>
							<div class="card-body table-responsive p-0" style="height: 500px;">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th>#</th>
										<th>Icon</th>
										<th>Full Name</th>
										<th>Role</th>
										<th>Notifications Sent</th>
									</tr>
									</thead>
									<tbody>
									<?php
									if (!empty($users)){

										foreach ($users as $key => $user){
											$UserName = $user['name'];
											$UserIcon = $user['icon'];
											$UserId = $user['id'];


											$iconPath = base_url().'assets/imgs/'.$UserIcon;
											?>
											<tr>
												<td><?php echo $key + 1; ?></td>
												<td>
													<img src="<?php echo $iconPath; ?>" class="product-image" alt="User Icon" style="width: 50px; height: 50px">
												</td>
												<td ><?php echo $UserName; ?></td>
												<td >Admin</td>
												<td ><?php echo get_count_where('notifications', array('sender_id'=>$UserId)); ?></td>

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
	<!-- The Modal -->
	<div class="modal" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Add User</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-12">

								<form method="post" action="<?php echo base_url(); ?>index.php/users/addUser" enctype="multipart/form-data">
								<div class="form-group">
									<label for="inputName">User name</label>
									<input type="text"  class="form-control" name="name"
										   placeholder="Provide name of user" required>
								</div>

									<div class="form-group">
										<label>Profile icon</label>
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="icon"  required>
												<label class="custom-file-label">Provide the user icon</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="inputName">Assign Password</label>
										<input type="text"  class="form-control" name="password"
											   placeholder="Assign User Password" required>
									</div>
									<div class="row">
										<div class="col-12">
											<a href="#"  data-dismiss="modal" class="btn btn-danger">Cancel</a>
											<input type="submit" value="Add new user" class="btn btn-success float-right">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
