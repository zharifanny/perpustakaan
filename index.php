<!DOCTYPE html>
<html lang="en">
<head>
	<title>Perpustakaan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="js/jquery.js"></script>
	<!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!-- <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script> <!--For queries data in tables-->
	<script>
	$(document).ready(function() {
		$('.dtabel').DataTable();
	} );
	</script>

	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

	<?php
	//tambahkan dbconnect
	include('dbconnect.php');

	// format rupiah
	include('formatbuku/lib.php');

	//query
	$query = "SELECT * FROM buku";

	$result = mysqli_query($conn , $query);

	?>

	<div class="container bg-form" style="padding-top: 20px; padding-bottom: 20px;">
		<h1>Aplikasi Perpustakaan</h1>
		<hr>
		<div class="row">
			<div class="col-sm-4">
				<h3>Tambah Buku</h3>
				<form role="form" action="insert.php" method="post">
					<div class="form-group">
						<label>Judul Buku</label>
						<input type="text" name="judul_bk" class="form-control">
					</div>
					<div class="form-group">
						<label>Penerbit Buku</label>
						<input type="text" name="terbit_bk" class="form-control">
					</div>
					<div class="form-group">
						<label>Jenis Buku</label>
						<input type="text" name="genre_bk" class="form-control">
					</div>
					<div class="form-group">
						<label>Harga Buku</label>
						<input type="text" name="harga_bk" class="form-control">
					</div>
					<button type="submit" class="btn btn-info btn-block">Tambah Buku</button>					
				</form>
				
			</div>
			<div class="col-sm-8">
				<h3>Daftar Buku</h3>
				<table class="table table-striped table-hover dtabel">
					<thead>
						<tr>
							<th>No</th>
							<th>Judul Buku</th>
							<th>Penerbit Buku</th>
							<th>Jenis Buku</th>
							<th>Harga Buku</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody> 
						
						<?php
							$no = 1;  
							while ($row = mysqli_fetch_assoc($result)) {
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $row['judul_buku']; ?></td>
							<td><?php echo $row['penerbit_buku']; ?></td>
							<td><?php echo $row['genre_buku']; ?></td>
							<td><?php echo rupiah($row['harga_buku']); ?></td>
							<td>
								<a href="editform.php?id=<?php echo $row['id_buku'];?>" class="btn btn-success" role="button">Edit</a>
								<a href="delete.php?id=<?php echo $row['id_buku']?>" class="btn btn-danger" role="button">Hapus</a>
							</td>
						</tr>

						<?php
							}
							mysqli_close($conn); 
						?>
					</tbody>
				</table>
			</div>
			
		</div>
		
	</div>
</body>



</html> 