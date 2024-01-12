<?php
    
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    
    
    
 
    $conn = new mysqli('localhost', 'root', '', 'login_pg');
    if($conn->connect_error){
        die('Connection Failed :' .$conn->connection_error);
    }else{
        
        $stmt = $conn->prepare("insert into login(Email,Password) values(?,?)");
        $stmt->bind_param("ss",$email,$password);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("location:index.html");
    
    
}
?>  