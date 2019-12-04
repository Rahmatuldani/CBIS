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
   			<tbody>
			   <?php $no = 1 ?>
   				<?php foreach ($jadwal as $adm) : ?>
   					<tr>
   						<td><?= $no++ ?></td>
   						<td><?= $adm['id_matkul'] ?></td>
   						<td><?= $adm['name_matkul'] ?></td>
   						<td><?= $adm['name_dosen'] ?></td>
   						<td><?= $adm['kelas'] ?></td>
   						<td><?= $adm['hari'], " : ", $adm['jam'] ?></td>
   						<td><?= $adm['ruang'] ?></td>
   					</tr>
   				<?php endforeach; ?>
   			</tbody>
   		</table>
   	</div>
   </div>
   <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->
