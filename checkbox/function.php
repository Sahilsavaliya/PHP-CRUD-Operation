<?php

 class insertdata
{

    public function insert($data,$tableb,$tablea,$col)
    {
        require('dbconnect.php');

                    foreach($data as $value)

        {
            $query = "INSERT INTO $tableb  VALUES (NULL,'$value')";
            $query_run = mysqli_query($conn,$query);
            $del_sql = "delete from $tablea where $col = '$value'";
            //echo $del_sql; exit;
            mysqli_query($conn,$del_sql);
        }
            if($query_run)
            {
                echo "Inserted Successfully";
                header("Location: tableA.php");
            }
            else
            {
                echo "Data Not Inserted";
                //header("Location: tableA.php");
            }

            echo "HELLO PHP";
            exit;

        }

        public function getdata($tablea,$tableb)
        {
            include('dbconnect.php');
            $query="SELECT * FROM $tablea ORDER BY checkbox_data ASC";
            $data=mysqli_query($conn,$query);
            $total['total1']=mysqli_num_rows($data);
            $total['data']=$data;

            $query1="SELECT * FROM $tableb ORDER BY checkbox_data ASC";
            $data1=mysqli_query($conn,$query1);
            $total['total2']=mysqli_num_rows($data1);
            $total['data1']=$data1;
            return $total;
        }

  

        





    }

    
    


?>