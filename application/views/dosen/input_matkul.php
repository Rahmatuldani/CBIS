<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<h1>Isi Jadwal Mengajar</h1>
		<form action="<?= base_url('dosen/input_matkul?id=').$matkul_pilih['id_matkul'] ?>" method="post">
			<label for="">Nama Mata Kuliah : <?= $matkul_pilih['name_matkul'] ?></label>
			<div class="form-group col-md-2">
				<input type="text" class="form-control" name="kelas" placeholder="Masukan Kelas" value="<?= set_value('kelas') ?>">
				<?= form_error('kelas', '<small class="text-danger pl-3">', '</small>') ?>
			</div>
			<div class="form-group col-md-5">
				<input type="text" class="form-control" name="hari" placeholder="Masukan Hari" value="<?= set_value('hari') ?>">
				<?= form_error('hari', '<small class="text-danger pl-3">', '</small>') ?>
			</div>
			<div class="form-group col-md-5">
				<input type="time" class="form-control" name="jam" value="<?= set_value('jam') ?>">
				<?= form_error('jam', '<small class="text-danger pl-3">', '</small>') ?>
			</div>
			<div class="form-group col-md-5">
				<input type="text" class="form-control" name="ruang" placeholder="Masukan Ruangan" value="<?= set_value('ruang') ?>">
				<?= form_error('ruang', '<small class="text-danger pl-3">', '</small>') ?>
			</div>
			<input type="submit" value="Save" class="btn btn-success">
		</form>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
