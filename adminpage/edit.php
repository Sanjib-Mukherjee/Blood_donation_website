<?php
    include('lib/conn.php');
    $obj=new conn();
    $venue=$_GET['venue'];
    $arr=$obj->get_record_by_venue($venue);
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
        .c3{
            margin-top:-320px;
            background-color:#60b7bd;
        }
        .c4{
            font-size:20px;
            background-color:#d16262;
        }
        .c5{
            margin-top:5px;
        }
        .c6{
            background-color:#d16262;
        }
       
        
    </style>
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

    <td> 
<form action="update.php" class="container" method="post">
    <table border="1" bordercolor="black" align="center" cellspacing="0" cellpadding="10" width="300px" class="c3">
        <th class="c4"> Edit Data</th></table>
        
        <table align="center" cellspacing="2" cellpadding="5" class="c5">
            <tr><td><label for="venue"><b>Venue:</b></label></td>
           <td><input type="text" name="venue" id="venue" placeholder="venue" size="25px" maxlength="100" required value="<?php echo $arr['venue'];?>"></td></tr>

           <tr><td> <label for="bloodtype"><b>Blood Group:</b></label></td>
            <td><select id="bloodtype" name="bloodtype" placeholder="bloodtype" required value="<?php echo $arr['bloodtype'];?>">
           <option value="">Select Blood Group</option>
            <?php
                $bloodtype=array('A+','A-','B+','B-','AB+','AB-','O+','O-');
                for($i=0;$i<sizeof($bloodtype);$i++)
                {
            ?>
                <option value="<?php echo $bloodtype[$i];?>" <?php if($arr['bloodtype']==$bloodtype[$i]) echo "selected='selected'";?>><?php echo $bloodtype[$i];?></option>
            <?php
                }
            ?>

            <tr><td><label for="amount"><b>Amount:</b></label></td>
            <td><input type="text" name="amount" id="amount" placeholder="amount" size="25px" maxlength="100" required value="<?php echo $arr['amount'];?>"></td></tr>

            <td><label for="price"><b>Price:</b></label></td>
            <td><input type="text" name="price" id="price" placeholder="price" size="25px" maxlength="100" required value="<?php echo $arr['price'];?>"></td></tr>

            <tr><td>
            <button type="Submit" class="c6"><b>SUBMIT</b></button></tr></td>
    </table>
    </form>
    </td>
</tr>
<?php
    ?>
<td colspan="2" class="c2">    
        <pre> contactus</pre>
</td>
    </table>
    <?php
    $result=-1;
    if(isset($_GET['result']))
    {
      $result=$_GET['result'];
    }
    ?>
</body>
</html>