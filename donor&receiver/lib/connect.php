<?php
    class connect{
        private $con;
        private $host='localhost';
        private $user='root';
        private $pwd='';
        private $db='db_blooddonation';
        public function __construct()
        {
            $this->con=mysqli_connect($this->host,$this->user,$this->pwd,$this->db);
            //mysqli_connect_db($this->con,$this->db) or die(mysqli_error());
        }
        function save_receiver_data($uname,$email,$dob,$btype,$gender,$address,$pcode,$cno)
        {
            $sql="insert into tbl_receiver(uname,email,dob,btype,gender,address,pcode,cno)values('$uname','$email','$dob','$btype','$gender','$address','$pcode','$cno')";
            $n=mysqli_query($this->con,$sql) or die(mysqli_error($this->con));
            return $n;
        }
    }
?>