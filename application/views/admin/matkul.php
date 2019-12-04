<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<h1>List Mata Kuliah</h1>
		<table class="table table-striped">
			<thead>
				<td>No</td>
				<td>Matkul Code</td>
				<td>Name</td>
				<td>Semester</td>
				<td>SKS</td>
			</thead>
			<tbody>
				<?php foreach ($matkul as $mhs) : ?>
					<tr>
						<td><?= ++$start ?></td>
						<td><?= $mhs['id_matkul'] ?></td>
						<td><?= $mhs['name_matkul'] ?></td>
						<td><?= $mhs['semester'] ?></td>
						<td><?= $mhs['sks'] ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?= $this->pagination->create_links() ?>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
