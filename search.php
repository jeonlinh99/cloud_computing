<?php
include('inc/conn.php');
include('inc/header.php');
$search = "";
if( !empty($_GET['Search'])){
	$search = $_GET['Search'];
}
?>
<h3 class="title"> Search results for: <?= $search ?> </h3>
<div class="container">    
  <div class="row">
     <?php
     if ( !empty($search)) {
     	$rs = mysqli_query($conn, "select *from song where songName like '%{$search}'");
     	while($row = mysqli_fetch_assoc($rs)){
  ?>
    <div class="col-sm-4 ">
    	 <a href="single-song.php?songID=<?php echo $row['songID']?>" class = "product">
      <div class="panel panel-primary">
        <div class="panel-heading text-center"><?php echo $row['songName']?></div>
        <div class="panel-body"><img src="img/<?php echo $row['songImage']?>" class="img-responsive" style="width:100%" alt="Image">
        </div>
        </div>
      </div>
      </a>

  </div>
        <?php 
  }
}
?>
</div>
<?php include('inc/footer.php');