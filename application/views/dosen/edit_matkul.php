<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<h1 class="mb-5">Edit Administrator</h1>
		<form action="<?= base_url('dosen/edit_matkul') ?>?id_edit=<?= $edit['id'] ?>" method="post">
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" class="form-control" name="kelas" value="<?= $edit['kelas'] ?>">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="hari" value="<?= $edit['hari'] ?>">
				</div>
				<div class="form-group">
					<input type="time" class="form-control" name="jam" value="<?= $edit['jam'] ?>">
					<?= form_error('jam', '<small class="text-danger pl-3">', '</small>') ?>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="ruang" value="<?= $edit['ruang'] ?>">
				</div>
				<div class="form-group">
					<select class="form-control" name="id_matkul" id="">
						<option value="<?= $edit['id_matkul'] ?>"><?= $edit['name_matkul'] ?></option>
						<?php foreach ($matkul as $key) : ?>
							<option value="<?= $key['id_matkul'] ?>"><?= $key['name_matkul'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<button type="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Save</button>
				<button type="reset" class="btn btn-warning"><i class="fas fa-redo mr-2"></i>Reset</button>
				<a href="<?= base_url('dosen/tampil_matkul') ?>" class="btn btn-danger"><i class="fas fa-times mr-2"></i>Cancel</a>
			</div>
	</div>
</div>
</form>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
