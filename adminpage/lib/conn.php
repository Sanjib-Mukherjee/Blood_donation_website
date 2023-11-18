<?php
    class conn{
        private $con;
        private $host='localhost';
        private $user='root';
        private $pwd='';
        private $db='db_admin';
        public function __construct()
        {
            $this->con=mysqli_connect($this->host,$this->user,$this->pwd,$this->db);
            //mysqli_connect_db($this->con,$this->db) or die(mysqli_error());
        }
        function save_record($venue,$bloodtype,$amount,$price)
        {
            $sql="insert into admindata(venue,bloodtype,amount,price)values('$venue','$bloodtype','$amount','$price')";
            $n=mysqli_query($this->con,$sql) or die(mysqli_error($this->con));
            return $n;
        }
        function get_record()
        {
            $sql="select * from admindata";
            $res=mysqli_query($this->con,$sql);
            return $res;
        }
        function get_record_by_venue($venue)
        {
            $sql="select * from admindata where venue='$venue'";
            $res=mysqli_query($this->con,$sql);
            $arr=mysqli_fetch_array($res);
            return $arr;
        }
        function update_record($venue,$bloodtype,$amount,$price)
        {
            // $sql="insert into tbl_details(roll)values('$roll')";
            $sql="update admindata set bloodtype='$bloodtype',amount='$amount',price='$price' where venue='$venue'";
            $n=mysqli_query($this->con,$sql) or die(mysqli_error($this->con));
            return $n;
        }
        function del_record($venue)
        {
            // $sql="insert into tbl_details(roll)values('$roll')";
            $sql="delete from admindata where venue='$venue'";
            $n=mysqli_query($this->con,$sql) or die(mysqli_error($this->con));
            return $n;
        }

    }