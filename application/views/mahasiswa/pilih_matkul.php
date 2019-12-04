<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<h1 class="mb-3">Input Mata Kuliah</h1>
		<form action="<?= base_url('mahasiswa/pilih_matkul') ?>" method="post">
			<h4>Pilih Mata Kuliah</h4>
			<div class="form-group col-md-4">
				<select id="inputState" class="form-control" name="pilih">
					<?php foreach ($semester as $sems) : ?>
						<option value="<?= $sems['id_semester'] ?>"><?= $sems['id_semester']," - ", $sems['nama_semester'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<input type="submit" class="btn btn-success" value="Pilih">
		</form>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
