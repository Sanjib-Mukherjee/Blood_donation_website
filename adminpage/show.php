<?php
    include('lib/conn.php');
    $obj=new conn();
    $res=$obj->get_record();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .c1{
            background-color:#fe3e3e;
            font-size:30px;
        }
        ul li{
            font-size:25px;
            line-height:50px;
        }
        a{
            text-decoration:none;
        }
        a:hover{
            background-color:#c95555;
            width:400px;
            height:40px;
        }
        .c2{
            height:10px;
            background-color:#fe3e3e;
        }
        pre{
            font-size:20px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <table border="1" bordercolor="black" width="90%" align="center" cellspacing="0" cellpadding="10">
    <tr>
    <th colspan="2" class="c1">Blood Bank</th>
    </tr>
    <tr>
    <td valign="top" width="20%" height="640">
    <ul><li><a href="add.php">Add Data</a></li>
    <li><a href="show.php">Show Data</a></li>
    <!-- <li><a href="search.php">Search</a></li></ul> -->
    </td>
    <td valign="top">
    <h2 align="center">Details</h2>
<table border="1" bordercolor="black" width="90%" align="center" cellspacing="0" cellpadding="10">
<tr>
  <th>Venue</th>
  <th>Blood Group</th>
  <th>Amount</th>
  <th>Price</th>
  <th></th>
  <th></th>
  </tr>
  <?php
    while($arr=mysqli_fetch_array($res))
    {
  ?>
    <tr>
      <td><?php echo $arr['venue'];?></td>
      <td><?php echo $arr['bloodtype'];?></td>
      <td><?php echo $arr['amount'];?></td>
      <td><?php echo $arr['price'];?></td>
      <td align="center">
      <a href="edit.php?venue=<?php echo $arr['venue'];?>"><i class="fa fa-edit"></i></a>
    </td>
    <td align="center">
    <a href="del.php?venue=<?php echo $arr['venue'];?>"><i class="fa fa-trash"></i></a>
    </td>
    </tr>
  <?php
    }
    ?>
  </table> 
    </td>
</tr>

<td colspan="2" class="c2">    
        <pre> contactus</pre>
</td>
    </table>
</body>
</html>