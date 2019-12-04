   <!-- Begin Page Content -->
   <div class="container-fluid">
   	<div class="jumbotron">
   		<h1>Choose Matkul</h1>
   		<table class="table table-striped">
   			<thead>
   				<td>No</td>
   				<td>Code Matkul</td>
   				<td>Name Matkul</td>
   				<td>Name Dosen</td>
   				<td>Class</td>
   				<td>Day, Time</td>
   				<td>Place</td>
   			</thead>
			<form action="<?= base_url('mahasiswa/masukin_jadwal') ?>" method="post">
   			<tbody>
			   <?php $no = 1 ?>
   				<?php foreach ($matkul as $adm) : ?>
   					<tr>
   						<td><?= $no++ ?></td>
   						<td><?= $adm['id_matkul'] ?></td>
   						<td><?= $adm['name_matkul'] ?></td>
   						<td><?= $adm['name_dosen'] ?></td>
   						<td><?= $adm['kelas'] ?></td>
   						<td><?= $adm['hari'], " : ", $adm['jam'] ?></td>
   						<td><?= $adm['ruang'] ?></td>
						<td>
   							<input type="checkbox" name="pilihan[]" id="" value="<?= $adm['id'] ?>">
						</td>
   					</tr>
   				<?php endforeach; ?>
   			</tbody>
			   <input type="submit" class="btn btn-primary" value="Save" name="submit">
			</form>
   		</table>
   	</div>
   </div>
   <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->
