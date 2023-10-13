<?php
    include('lib/conn.php');
    $obj=new connect();
?>
<?php
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $dob=$_POST['dob'];
    $btype=$_POST['btype'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $pcode=$_POST['pcode'];
    $cno=$_POST['cno'];
    $n=$obj->save_receiver_data($uname,$email,$dob,$btype,$gender,$address,$pcode,$cno);
    header('location:Receiver.php?result='.$n);
?>  