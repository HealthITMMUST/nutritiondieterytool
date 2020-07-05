
<?php
$diseaseId = getColumn('disease',array('id'=>$diseaseId),'id');
$diseaseName = getColumn('disease',array('id'=>$diseaseId),'name');
$diseaseImage = getColumn('disease',array('id'=>$diseaseId),'icon');
$diseaseDescription = getColumn('disease',array('id'=>$diseaseId),'description');
$diseaseNutrition = getColumn('disease',array('id'=>$diseaseId),'nutrition');

$iconPath = base_url().'assets/imgs/'.$diseaseImage;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
		<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?php echo $diseaseName; ?></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card card-solid">
			<div class="card-body">
				<div class="row">
					<div class="col-12 col-sm-6">
						<h3 class="d-inline-block d-sm-none"><?php echo $diseaseName; ?></h3>
						<div class="col-12">
							<img src="<?php echo $iconPath; ?>" class="product-image" alt="Disease Icon" style="width: 150px; height: 150px">
						</div>
					</div>
				</div>
				<div class="row mt-4">
					<nav class="w-100">
						<div class="nav nav-tabs" id="product-tab" role="tablist">
							<a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
							<a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Nutrition</a>
						</div>
					</nav>
					<div class="tab-content p-3" id="nav-tabContent">
						<div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?php echo $diseaseDescription; ?></div>
						<div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"><?php echo $diseaseNutrition; ?> </div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
