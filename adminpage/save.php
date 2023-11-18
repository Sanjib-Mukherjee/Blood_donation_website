<?php
    include('lib/conn.php');
    $obj=new conn();
?>

<?php
    $venue=$_POST['venue'];
    $bloodtype=$_POST['bloodtype'];
    $amount=$_POST['amount'];
    $price=$_POST['price'];
    $n=$obj->save_record($venue,$bloodtype,$amount,$price);
    header('location:add.php');
?>