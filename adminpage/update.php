<?php
    include('lib/conn.php');
    $obj=new conn();
?>

<?php
    $venue=$_POST['venue'];
    $bloodtype=$_POST['bloodtype'];
    $amount=$_POST['amount'];
    $price=$_POST['price'];
    $n=$obj->update_record($venue,$bloodtype,$amount,$price);
    header('location:show.php');
?>