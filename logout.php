<form action="logout.php" method="POST"> 
      <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>
</form>
<?php
session_start();

if(isset($_POST['logout_btn']))
{
    session_destroy();
    unset($_SESSION['userName']);
    header('Location: login.php ');
}

?>