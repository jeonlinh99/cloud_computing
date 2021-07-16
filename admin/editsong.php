
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/conn.php');
?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Toy </h6>
        </div>
       <div class="card-body">
           <?php

            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];
                
                $query= "select *from song, genre where song.genreID= genre.genreID and song.songID= '$id'";
                $query_run = mysqli_query($conn, $query);

                foreach($query_run as $row)
                {
                    ?>

               <form action="code.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="edit_id" value="<?php echo $row['songID']; ?>">
            <div class="form-group">
                <label> Name </label>
                <input type="text" name="edit_name" value="<?php echo $row['songName'] ?>" class="form-control" placeholder="Enter name of the song">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="edit_price" value="<?php echo $row['songPrice'] ?>" class="form-control " placeholder="Enter price of song">
            </div>
             <div class="form-group">
                <label> Producer </label>
                <input type="text" name="edit_artistName" value="<?php echo $row['artistName'] ?>" class="form-control" placeholder="Enter Singer of the song">
            </div>
             <div class="form-group">
                <label> Material </label>
                <input type="text" name="edit_genre" value="<?php echo $row['genreName'] ?>" class="form-control" placeholder="Enter genre of the song">
            </div>
            <div class="form-group" >
                <label>Choose the image for toy</label>
                <div class="panel-body"><img src="../img/<?php echo $row['songImage']?>" class="img-responsive" style="width:30%" alt="Image">
        </div>
               <input type="file" name="edit_songImage" >
            </div>
             
           
            <a href="editsong.php" class="btn btn-danger"> CANCEL </a>
          <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

            </form>
        <?php
                }
              }  
        ?>
        </div>
        </div>
    </div>
</div>
