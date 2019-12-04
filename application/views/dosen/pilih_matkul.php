<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<h1 class="mb-3">Input Mata Kuliah</h1>
		<form action="<?= base_url('dosen/pilih_matkul') ?>" method="post">
			<h4>Pilih Mata Kuliah</h4>
			<div class="form-group col-md-4">
				<select id="inputState" class="form-control" name="pilih">
					<?php foreach ($matkul as $matkul) : ?>
						<option value="<?= $matkul['id_matkul'] ?>"><?= "Sems ",$matkul['semester'], " - ", $matkul['name_matkul'] ?></option>
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
