<?php 
	include "koneksi.php";

	$data = mysqli_query($conn, "SELECT * FROM dataset");

	if(isset($_POST["import"])){
		$filename = $_FILES["file"]["tmp_name"];

		if($_FILES["file"]["size"] > 0){
			$file = fopen($filename, "r");

			while(($column = fgetcsv($file, 10000 , ",")) !== FALSE ){

				$sqlInsert = "INSERT INTO dataset (tgl, tweet, hashtag, sentiment) VALUES ('$column[0]' , '$column[1] ' , '$column[2]' , '$column[3]' ) ";

				$result = mysqli_query($conn, $sqlInsert);
				if(!empty($result)){
					?>
					<script type="text/javascript">
						alert("data telah di upload");
						window.location="index.php?page=dataset_tweet";
					</script>;<?php
				}else{
					?>
					<script type="text/javascript">
						alert("data gagal di upload");
						window.location="index.php?page=dataset_tweet";
					</script>;<?php
				}
			}
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dataset</title>
	<style type="text/css">
		.dataset{
			margin:50px;
			text-align: center;
		}
		.import-data{
			margin-bottom: 50px;
			text-align: left;
		}
		table{
			border-collapse: collapse;
		}
		table th{
			background-color: black;
			color: white;
			padding: 5px;
		}
		table td{
			background-color: #bbb;
			border:1px solid;
			padding: 5px;
		}
	</style>
</head>
<body>
	<div class="dataset">
		<div class="import-data">
			<form action="" method="post" name="uploadcsv" enctype="multipart/form-data">
				<label>Pilih File CSV</label>
				<input type="file" name="file" accept=".csv">
				<button type="submit" name="import">Import</button>
			</form>
		</div>
		<div class="view_data">
			<h2><u>Dataset</u></h2> <br>
			<table>
				<tr>
					<th>Date</th>
					<th>Tweet</th>
					<th>Hashtag/Keyword</th>
					<th>Sentiment</th>
				</tr>
				<?php foreach($data as $d) : ?>
					<tr>
						<td><?= $d['tgl']; ?></td>
						<td><?= $d['tweet'] ; ?></td>
						<td><?= $d['hashtag']; ?> </td>
						<td><?= $d['sentiment']; ?> </td>
					</tr>
			<?php endforeach; ?>
			</table>
		</div>
	</div>
</body>
</html>