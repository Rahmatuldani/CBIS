<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<h1 class="mb-5">Edit Mata Kuliah</h1>
		<form action="<?= base_url('update/edit_matkul') ?>?id_edit=<?= $edit['id_matkul'] ?>" method="post">
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" class="form-control" name="id" onkeypress="return angka(event)" value="<?= $edit['id_matkul'] ?>" disabled>
					<?= form_error('id', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="name" value="<?= $edit['name_matkul'] ?>">
					<?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="semester" onkeypress="return angka(event)" value="<?= $edit['semester'] ?>">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="sks" onkeypress="return angka(event)" value="<?= $edit['sks'] ?>">
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
