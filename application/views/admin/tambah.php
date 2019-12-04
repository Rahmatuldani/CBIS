<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<h1 class="mb-5">Add User</h1>
		<?= form_open_multipart('admin/tambah') ?>
		<div class="col-md-6">
			<div class="form-group">
				<select class="form-control" name="level" id="">
					<option value="" selected="selected">-- Choose Level --</option>
					<option value="Admin">Administrator</option>
					<option value="Mahasiswa">Mahasiswa</option>
					<option value="Dosen">Dosen</option>
				</select>
				<?= form_error('level', '<small class="text-danger pl-3">', '</small>') ?>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="id" placeholder="Enter ID" onkeypress="return angka(event)" value="<?= set_value('id') ?>">
				<?= form_error('id', '<small class="text-danger pl-3">', '</small>') ?>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?= set_value('name') ?>">
				<?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="Enter Password">
				<?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
			</div>
			<button type="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Save</button>
			<button type="reset" class="btn btn-warning"><i class="fas fa-redo mr-2"></i>Reset</button>
			<a href="<?= base_url('admin/update_admin') ?>" class="btn btn-danger"><i class="fas fa-times mr-2"></i>Cancel</a>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
