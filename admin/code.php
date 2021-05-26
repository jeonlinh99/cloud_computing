l<?php
include('includes/conn.php');
session_start();

if(isset($_POST['addsongbtn']))
{
    $name = $_POST['songName'];
    $price = $_POST['songPrice'];
    $singer= $_POST['artistName'];
    $genre = $_POST['genreID'];
    $image = $_FILES["songImage"]['name'];
    $audio = $_FILES['songMp3']['name'];

$sql= "insert into song (songName, songPrice, songImage, songMp3, artistName, genreID) values('$name','$price','$image','$audio','$singer','$genre')";
$rs= mysqli_query($conn, $sql);
if($rs){
    move_uploaded_file($_FILES["songImage"]["tmp_name"], "img/".$_FILES["songImage"]["name"]);
    move_uploaded_file($_FILES["songMp3"]["tmp_name"], "songmp3/".$_FILES["songMp3"]["name"]);
    $_SESSION['status']="Song added";
    $_SESSION['status_code']="success";
    header("location: index.php");
} else 
            {
                $_SESSION['status'] = "Song Not Added";
                $_SESSION['status_code'] = "error";
                header("location: index.php");  
            }

}

if(isset($_POST['delete_btn']))
{
    $songID = $_POST['delete_id'];

    $query = "DELETE FROM song WHERE songID='$songID' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "The song is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: index.php'); 
    }
    else
    {
        $_SESSION['status'] = "The song is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: index.php'); 
    }    
}


if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $price =$_POST['edit_price'];
    $singer = $_POST['edit_artistName'];
    $genre = $_POST['edit_genre'];
    $image = $_FILES['edit_songImage']['name'];
    $audio = $_FILES['edit_songMp3']['name'];
   
    $query = "UPDATE song SET songName='$name', songPrice='$price', artistName= '$singer', genre='$genre', songImage='$image', songMp3='$audio'  WHERE songID='$id' ";
    $query_run = mysqli_query($conn, $query);

   if($query_run)
    {
        move_uploaded_file($_FILES["edit_songImage"]["tmp_name"], "img/".$_FILES["edit_songImage"]["name"]);
    move_uploaded_file($_FILES["edit_songMp3"]["tmp_name"], "songmp3/".$_FILES["edit_songMp3"]["name"]);
        $_SESSION['status'] = "Song is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: index.php'); 
    }
    else
    {
        $_SESSION['status'] = "Song is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: index.php'); 
    }
}

?>