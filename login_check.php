<?php
if(!isset($_SESSION['islogin']))
{
    header("Location:login.php");
}

?>