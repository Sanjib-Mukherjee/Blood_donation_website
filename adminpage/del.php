<?php
    include('lib/conn.php');
    $obj=new conn();
    $venue=$_GET['venue'];
    $n=$obj->del_record($venue);
    header('location:show.php');
?>