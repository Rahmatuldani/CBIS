<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<h1 class="mb-3">Input Mata Kuliah</h1>
		<form action="<?= base_url('admin/pilih_semester') ?>" method="post">
			<h4>Input Semester</h4>
			<?= $this->session->flashdata('message') ?>
			<div class="form-group col-md-4">
				<input type="text" class="form-control" name="id" id="" placeholder="Input Semester">
			</div>
			<div class="form-group col-md-4">
				<input type="text" class="form-control" name="name" id="" placeholder="Input Name Semester">
			</div>
			<input type="submit" class="btn btn-success" value="Save">
			<a href="<?= base_url('admin/delete_semester') ?>" class="btn btn-danger">Delete Semester</a>
		</form>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
