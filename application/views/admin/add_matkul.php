<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<h1 class="mb-5">Add Mata Kuliah</h1>
		<form action="<?= base_url('update/add_matkul') ?>" method="post">
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" class="form-control" name="id" onkeypress="return angka(event)" placeholder="Insert Code Matkul">
					<?= form_error('id', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="name"  placeholder="Insert Name Matkul">
					<?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="semester" onkeypress="return angka(event)"  placeholder="Insert Semester">
					<?= form_error('semester', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="sks" onkeypress="return angka(event)"  placeholder="Insert SKS">
					<?= form_error('sks', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<button type="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Save</button>
				<button type="reset" class="btn btn-warning"><i class="fas fa-redo mr-2"></i>Reset</button>
				<a href="<?= base_url('admin/update_matkul') ?>" class="btn btn-danger"><i class="fas fa-times mr-2"></i>Cancel</a>
			</div>
	</div>
</div>
</form>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
