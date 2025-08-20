<?php
include "form.php";

    $sql="SELECT * FROM form_table";
    $stmt = $conn->query($sql);
    if($stmt->num_rows> 0){
        while($row=$stmt->fetch_assoc()){
            echo "name:".$row['name']."age:".$row['age'];
        }
    } else{
        echo "no data found";
    }
    $sql = "update form_table SET name = 'john' where name = 'joe'";
    $stmt = $conn->query($sql);
    if($stat === TRUE){
        echo "updated";
    }
    else{
        echo "something went wrong:", $conn->error;
    }
    $conn->close();
?>