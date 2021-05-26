<?php 
include('inc/conn.php');
include('inc/header.php');
?>

<div class="container">    
  <div class="row">
     <?php 
      if (!empty($_GET['page']))
       {
        $page= $_GET['page']-1;
      }else
      {
        $page=0;
      }
      $product_per_page =6;
      $offset= $product_per_page*$page;
      $sql= "select *from song limit $offset,  $product_per_page";
      $rs = mysqli_query($conn,$sql);
      if (mysqli_num_rows($rs) >0)
       {
        while ($row= mysqli_fetch_assoc($rs))
         {
          # code...
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
      <?php 
    }
  }
  ?>
  <?php include("inc/pagination.php");?>
    </div>
  </div>
</div>
<?php 
include("inc/footer.php")
;?>