<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title></title>
   <link rel="stylesheet" type="text/css" href="css/footer.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <div class="footer">
		<div class="container" style="padding-top: 0px">
			<div class="footer d-flex justify-content-between align-center">
				<img src="../gogreen/assets/img/logo.png" style="width: 200px" alt="">
				<!-- <div class="flex">
					<a href="dashboard.php">Bookings</a>
					<a href="inquire.php">Inquire</a>
					<a href="process.logout.php">Logout</a>
				</div> -->
			</div>
			<hr>
			<?php 
				$date = date('Y');
				echo '<p class="copyright">Copyright '.$date.' - Go Green </p>';
			?>
		</div>
	</div>
	<style>
		.container > div.footer {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}
		.flex {
			display: flex;
			gap: 20px;
		}

		.flex < a {
			 color: white !important;
		}
	</style>

</html
 