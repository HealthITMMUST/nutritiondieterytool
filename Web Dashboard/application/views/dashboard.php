<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Info boxes -->
			<div class="row">

				<div class="clearfix hidden-md-up"></div>
				<div class="col-12 col-sm-6 col-md-6">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Diseases</span>
							<span class="info-box-number"><?php echo get_count('disease') ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-4">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Total Users</span>
							<span class="info-box-number"><?php echo get_count('tb_users') ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->


			<!-- /.row -->

			<!-- Main row -->
			<div class="row">

				<div class="col-12 col-sm-12 col-md-12">
							<!-- DIRECT CHAT -->
							<div class="card direct-chat direct-chat-warning">
								<div class="card-header">
									<h3 class="card-title">Notifications</h3>

									<div class="card-tools">
										<span title="3 New Messages" class="badge badge-warning"><?php echo get_count('notifications') ?></span>
										<button type="button" class="btn btn-tool" data-card-widget="collapse">
											<i class="fas fa-minus"></i>
										</button>

										<button type="button" class="btn btn-tool" data-card-widget="remove">
											<i class="fas fa-times"></i>
										</button>
									</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<!-- Conversations are loaded here -->
									<div class="direct-chat-messages">


										<?php

										if (!empty($notifications)){

											foreach ($notifications as $notification){

												$senderName = getColumn('tb_users',array('id'=>$notification->sender_id), 'name');
												$senderIcon = getColumn('tb_users',array('id'=>$notification->sender_id), 'icon');
												$photoPath = base_url().'assets/imgs/'.$senderIcon;
												$message = $notification->message;
												$date = $notification->date;
												?>

												<div class="direct-chat-msg">
													<div class="direct-chat-infos clearfix">
														<span class="direct-chat-name float-left"><?php echo $senderName; ?></span>
														<span class="direct-chat-timestamp float-right"><?php echo $date; ?></span>
													</div>
													<!-- /.direct-chat-infos -->
													<img class="direct-chat-img"
														 src="<?php echo $photoPath; ?>"
														 alt="message user image">
													<!-- /.direct-chat-img -->
													<div class="direct-chat-text">
														<?php echo $message; ?>
													</div>
													<!-- /.direct-chat-text -->
												</div>

												<?php

											}

										}

										?>

									</div>

								</div>
								<!-- /.card-body -->
								<div class="card-footer">
									<form method="post" action="<?php echo base_url(); ?>index.php/dashboard/addNotifications" enctype="multipart/form-data">
										<div class="input-group">
											<input type="text" name="message" placeholder="Type Message ..."
												   class="form-control">
											<span class="input-group-append">
                          <button type="submit" class="btn btn-warning">Send</button>
                        </span>
										</div>
									</form>
								</div>
								<!-- /.card-footer-->
							</div>
							<!--/.direct-chat -->

				</div>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div><!--/. container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
