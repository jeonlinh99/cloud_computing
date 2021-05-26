<?php
session_start();
require_once("inc/conn.php");
include("inc/header.php");
?>
<h3 style="text-align: center;">Congratulations on your payment and you can now download it</h3>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$sum=$_POST['total'];
	$date=$_POST['date'];
	$usn=$_POST['name'];
	$bank=$_POST['bank'];
	$sql= "insert into order( Total OderDate, UserName, Bank) values ('$sum', '$date','$usn', '$bank')";
	if (mysqli_query($conn, $sql)) {

		echo "Pay successfully";
		# code...
	}else{
		echo "Error: " .mysqli_error($conn);
	}
}
?>
<?php 
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
     	$id= $_POST['OrderID'];
     	if(empty($_SESSION['cart'] [$id])){
     	$q= mysqli_query($conn, "select * from song where songID= {$id}");
     	$product = mysqli_fetch_assoc($q);
     	header("location: payment.php");
     }
}?>
<div class="container-fluid">
 <div class="row">
  <link rel="stylesheet" type="text/css" href="css/cart.css">
  <?php 
  if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $row) :
    ?>
    <div class="products" style="border: 2px solid black">
    <a href="single-song.php?songID=<?php echo $row['songID']?>" style="text-decoration: none;">
    <div><img src="img/<?php echo $row['songImage']?>" class="img-cart"></div>
    <h2><?php echo $row['songName'] ?></h2>
        <audio songID="songID" class="audio" style="width: 247px" controls controlsList="autodownload" ><source src="songmp3/<?php echo $row['songMp3']?>" type="audio/mpeg" >
         </a>
         <br>
         <h4>Click on icon <i class="fas fa-ellipsis-v"></i> to download</h4>
         </div>
           <?php
  endforeach;
  }
     ?>
  </div>  
 <form action="logout.php" method="POST"> 
      <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>
</form>
 <?php
 include("inc/footer.php"); 
  ?>


