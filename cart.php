<?php 
session_start();
require_once("inc/conn.php");
include("inc/header.php");
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $songID =$_POST['songID'];
  if (empty($_SESSION['cart']['songID'])) {
    $q=mysqli_query($conn,"SELECT * FROM song WHERE songID = {$songID}");
    $product = mysqli_fetch_assoc($q);
    $_SESSION['cart'][$songID]=$product;
    $_SESSION['cart'] [$songID] ['quantity']= $_POST['quantity'];

  //$_SESSION['cart'][$songID]['sl']=$_POST['sl'];
  }else{
    $newquan=$_SESSION['cart'] ['$songID'] ['quantity'] + $_POST['quantity'];
    $_SESSION['cart'] ['$songID'] ['quantity']= $newquan;
  }
 }
 ?>
 <div class="container-fluid">
 <div class="row">
 	<link rel="stylesheet" type="text/css" href="css/cart.css">
 	<h3 class="giohang"><i class="fas fa-shopping-cart"></i> Cart</h3>
  <br>
  <br>
  <?php
    if(isset($_SESSION['success']) && $_SESSION['success'] !='')
    {
      echo '<h2> '.$_SESSION['success'].' </h2>';
      unset($_SESSION['success']);
    }
     if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
      echo '<h2 clas="bg-info"> '.$_SESSION['status'].' </h2>';
      unset($_SESSION['status']);
    }

    ?>
 	<?php 
 	if (!empty($_SESSION['cart'])) {
 		foreach ($_SESSION['cart'] as $row) :
 		?>
 		<div class="products" style="border: 2px solid black">
 	 	<a href="single-song.php?songID=<?php echo $row['songID']?>" style="text-decoration: none;">
 	 	<div><img src="img/<?php echo $row['songImage']?>" class="img-cart"></div>
 	 	<h2><?php echo $row['songName'] ?></h2>
    <p style="color: red">Price: <?php echo $row['songPrice']." $"; ?></p>
    <p style="color: red">Quantity:<?php echo $row['quantity'] ?></p>
     <form action="#" method="post">
     <input type="hidden" name="delete_id" value="<?php echo $row['songID']; ?>">
    <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
   </form>
  <!-- Modal delete-->

  <!--end modal delete -->
     </a>
    
         </div>
         	 <?php
 	endforeach;
 	}
 	else 
 		echo "There are no products in the product";
 	?>
 	<br>
 	<div id="total" class="clearfix">
 		 <?php
 		 $sum= 0;
 		  foreach ($_SESSION['cart'] as $row) :
 		 	$sum = $sum + ($row['quantity'] * $row['songPrice']);
 		 endforeach;
 		 ?>
     <h3>Total money: <?php echo number_format($sum) ?>$</h3>
 </div>
 </div>
 </div>
 <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg " data-toggle="modal" data-target="#myModal">Payment</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
      <div class="col-sm-3 col-md-12" style="border: 1px solid #38D276">
    <h3 style="text-align: center;">Payment</h3>
        <form method="POST" action="payment.php" class="was-validated">
          <div class="form-group">
            <label for="usr">UserName:</label>
            <input type="text" class="form-control" id="userName" name="userName" value="<?php echo $_SESSION['userName'] ?>" readonly>
          </div>
            <label for="bank">Select payment bank</label>
        <select class="custom-select" required id="bank" name="bank">
          <option selected></option>
          <option value="Vietcombank">Vietcombank</option>
          <option value="Techcombank">Techcombank</option>
          <option value="Airpay">Airpay</option>
          <option value="momo">momo</option>
        </select>
      <div class="form-group">
        <div class="form-group">
        <label for="usr">Order date:</label>
        <input type="text" class="form-control" id="usr" name="date" value="<?php
        date_default_timezone_set('Asia/Ho_Chi_Minh');
      echo "". date("Y.m.d h:i:sa");
      ?>" readonly>
      </div>
      <div class="form-group">
        <label for="usr">Total</label>
        <input type="text" class="form-control" id="usr" value=" <?php echo number_format($sum) ." $" ?>" readonly name="total">
      </div>
      <input type="submit" class="btn btn-success" value="Pay">
      <button>Close</button>

    </form>
  </div>
 </div>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
 <?php 
 include ('inc/footer.php');
  ?>
  
