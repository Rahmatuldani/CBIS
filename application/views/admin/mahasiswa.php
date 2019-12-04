<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="jumbotron">
		<h1>List Mahasiswa</h1>
		<table class="table table-striped">
			<thead>
				<td>No</td>
				<td>NIM</td>
				<td>Name</td>
				<td>Email</td>
				<td>Place and Date of Birth</td>
				<td>Sex</td>
				<td>Region</td>
				<td>Phone</td>
				<td>Address</td>
			</thead>
			<tbody>
				<?php foreach ($mahasiswa as $mhs) : ?>
					<tr>
						<td><?= ++$start ?></td>
						<td><?= $mhs['nim'] ?></td>
						<td><?= $mhs['name_mhs'] ?></td>
						<td><?= $mhs['email'] ?></td>
						<td><?= $mhs['birth_place'], ", ", date("d-F-Y", strtotime($mhs['birth_date'])) ?></td>
						<td><?= $mhs['sex'] ?></td>
						<td><?= $mhs['region'] ?></td>
						<td><?= $mhs['phone'] ?></td>
						<td><?= $mhs['address'] ?></td>
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
