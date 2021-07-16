<?php 
session_start();
include('inc/conn.php');
include('inc/header.php');
?>

<div class="container text-center">    
  <div class="row">
    <?php
    $songID= $_GET['songID'];
     $sql= "select *from song, genre where song.genreID= genre.genreID and song.songID= '$songID'";
    $rs= mysqli_query($conn, $sql);
    if(mysqli_num_rows($rs) > 0)
      
      {    while ($row= mysqli_fetch_array($rs)) {
    ?>
    <div class="col-sm-3 col-md-6 text-center">
      <div class="panel panel-primary">
        <div class="panel-heading text-center" ><?php echo$row['songName']?></div>
        <div class="panel-body"><img src="img/<?php echo $row['songImage']?>" class="img-responsive" style="width:100%" alt="Image"></div>
      </div>

    </div> 
  <div class="col-sm-9 col-md-6">
        <h3>Material: <?php echo $row['genreName']?></h3>
    </div>   
     <div class="col-sm-9 col-md-6">
        <h3>Producer by: <?php echo $row['artistName']?></h3>
    </div>
<p style="color: red"> Price: <?php echo $row['songPrice']."$";?></p>
    <p> </p>
<form method="POST" action="cart.php" class="quantity">
    Enter the quantity:
    <input type="number" name="quantity" value="1"><br>
    <input type="hidden" name="songID" value="<?= $songID?>"><br>
    <button type="submit" class="button-buy"> Add to cart </button>
   </form>
   <?php
 }
  }
  ?>
  </div>
</div><br>
<?php include('inc/footer.php');?>
