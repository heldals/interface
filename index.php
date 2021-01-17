<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Skripsi</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="sidebar">
        <h2>Skripsi</h2>
        <ul>
            <li><a href="index.php?page=dataset_tweet"><i class="fas fa-table"></i>Dataset Tweet</a></li>
            <li><a href="index.php?page=klasifikasi_sentimen"><i class="fas fa-chart-pie"></i>Klasifikasi Sentimen</a></li>
        
        </ul> 
    </div>

		<div class="main_content">
			<?php 
				if(isset($_GET["page"])){
					if($_GET['page'] == "dataset_tweet")
						include "dataset_tweet.php";
					else if($_GET['page'] == "klasifikasi_sentimen")
						include "klasifikasi_sentimen.php";
				}
			?>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#menu").click(function(e) {
              e.preventDefault();
            $("#container").toggleClass("toggled");
            });
        });
    </script>
</body>
</html>