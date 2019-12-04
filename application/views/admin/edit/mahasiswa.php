<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<h1 class="mb-5">Edit Mahasiswa</h1>
		<form action="<?= base_url('update/edit_mahasiswa') ?>?id_edit=<?= $edit['nim'] ?>" method="post">
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" class="form-control" name="id" onkeypress="return angka(event)" value="<?= $edit['nim'] ?>" disabled>
					<?= form_error('id', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="name" value="<?= $edit['name_mhs'] ?>">
					<?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="form-group">
					<input type="email" class="form-control" name="email" value="<?= $edit['email'] ?>">
				</div>
				<div class="form-group">
					<div class="form-inline justify-content-between">
						<input type="text" class="form-control col-5" name="place" value="<?= $edit['birth_place'] ?>">
						<input type="date" class="form-control col-5" name="date" value="<?= $edit['birth_date'] ?>">
					</div>
				</div>
				<div class="form-group">
					<select class="form-control" name="sex" id="">
						<option value="<?= $edit['sex'] ?>"><?= $edit['sex'] ?></option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="region" id="">
						<option value="<?= $edit['region'] ?>"><?= $edit['region'] ?></option>
						<option value="Islam">Islam</option>
						<option value="Christian">Christian</option>
						<option value="Hindu">Hindu</option>
						<option value="Buddha">Buddha</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="address" value="<?= $edit['address'] ?>">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="phone" onkeypress="return angka(event)" value="<?= $edit['phone'] ?>">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Enter Password">
					<?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<button type="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Save</button>
				<button type="reset" class="btn btn-warning"><i class="fas fa-redo mr-2"></i>Reset</button>
				<a href="<?= base_url('admin/update_mahasiswa') ?>" class="btn btn-danger"><i class="fas fa-times mr-2"></i>Cancel</a>
			</div>
	</div>
</div>
</form>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
