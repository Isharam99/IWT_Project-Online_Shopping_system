<?php
    $first_name = $_POST['First_name'];
    $last_name = $_POST['Last_name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    
    
 
    $conn = new mysqli('localhost', 'root', '', 'finalreg_pg');
    if($conn->connect_error){
        die('Connection Failed :' .$conn->connection_error);
    }else{
        
        $stmt = $conn->prepare("insert into finalreg(First_name,Last_name,Email,Password) values(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $first_name, $last_name, $email, $password);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("location:index.html");
    
    
}
?>  