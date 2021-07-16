<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/conn.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Song</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> Name </label>
                <input type="text" name="songName" class="form-control" placeholder="Enter name of the song">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="songPrice" class="form-control " placeholder="Enter price of song">
            </div>
             <div class="form-group">
                <label> Producer </label>
                <input type="text" name="artistName" class="form-control" placeholder="Enter Singer of the song">
            </div>
            <div class="form-group" >
                <label>Choose the image for toy</label>
                <input type="hidden" name="size" value="1000000">
               <input type="file" name="songImage" id="songImage" accept=".jpg, .png" >
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addsongbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manage Toys
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Toy
            </button>
    </h6>
  </div>

  <div class="card-body">
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


    <div class="table-responsive">
      <?php 
      $query= "select song.songID, songName, songPrice, songImage, songMp3, artistName, genre.genreName from song inner join genre on song.genreID = genre.genreID";
      $query_run = mysqli_query($conn, $query);
      ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> toyID </th>
            <th> Name of the toy</th>
            <th> Price of the toy</th>
            <th> Image of the toy</th>
            <th> Producer</th>
            <th> Material</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
       <?php
                      
                          if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_array($query_run))
                            {
                        ?>
          <tr>
            <th><?php echo $row['songID']; ?> </th>
            <th><?php echo $row['songName']; ?></th>
            <th><?php echo $row['songPrice']; ?> </th>
            <th><div class="panel-body"><img src="../img/<?php echo $row['songImage']?>" class="img-responsive" style="width:100%" alt="Image">
        </div></th>
            <th><?php echo $row['artistName']; ?></th> 
            <th><?php echo $row['genreName']; ?></th>     
              <td>
                <form action="editsong.php" method="POST">
                    <input type="hidden" name="edit_id" value="<?php echo $row['songID']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="POST">
                  <input type="hidden" name="delete_id" value="<?php echo $row['songID']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
          <?php
        
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->



  <?php
include('includes/scripts.php');
?>
