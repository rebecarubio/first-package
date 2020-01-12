<?php
include 'DBconn.php';

class orders extends DBconn{

    public function insertData($dates, $companies, $quantity){
        for($i=0; $i<=1000; $i++){
            $sql= 'INSERT INTO orders VALUES (NULL,"'.$dates[$i].'","'.$companies[$i].'","'.$quantity[$i].'")';
            $result = $this->connect()->query($sql);

        }
        $this->disconnect();
        return $result;
    }

    public function fetchAll(){
        $result =$this->connect()->query('SELECT * FROM orders');
        return $result;
    }

    public function filterByDate($date){
        $result= $this->connect()->query('SELECT * FROM orders WHERE `date` LIKE "'.$date.'%"');
        $this->disconnect();
        return $result;

    }

    public function filterByCompany($company){
        $result= $this->connect()->query('SELECT * FROM orders WHERE company LIKE "'.$company.'%"');
        $this->disconnect();
        return $result;
        
    }
}
