<?php 
sleep(0.1);

include 'config.php';
if(isset($_POST['request'])){

	$request = $_POST['request'];

	$query = "SELECT * FROM products WHERE status = 1 AND class = '$request'";
	$result = mysqli_query($conn,$query);
	$count = mysqli_num_rows($result);

?>

	<div class="row">
		<?php
		while($row = mysqli_fetch_assoc($result)){

		?>
	<div class="col-4">
		<a href="product-details.php?product-details=<?= $row['id']; ?>">
		<img src="<?= $row['image'] ?>">
		<h4><?= $row['name'] ?></h4>
		<p>Php: <?= number_format($row['price'],2) ?></p>
		</a>
	</div>
		<?php
		};
		?>
	</div>

<?php
}
?>