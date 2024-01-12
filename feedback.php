<!DOCTYPE html>
<html>
<body>
<?php
if(isset($_POST['SUBMIT'])){
 $yourName = $_POST['yourName'];
 $phoneNo = $_POST['phoneNo'];
 $emailID = $_POST['emailID'];
 $yourmsg = $_POST['yourmsg'];
 
 
 //Database connection
 if(!empty($yourName) || !empty($phoneNo) || !empty($emailID) || !empty($yourmsg)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "feedback";

    //create connection
    $conn = new mysqli($yourName, $phoneNo, $emailID, $yourmsg);

    if(mysqli_connect_error()){
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect-error());
    }else{
        $SELECT = "SELECT emailID From feed where emailID = ? Limit 1";
        $INSERT = "INSERT Into feed(yourName, phoneNo, emailID, yourmsg) values (?, ?, ?, ?)";

        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $emailID);
        $stmt->execute();
        $stmt->bind_results($emailID);
        $stmt->store_results();
        $rnum = $stmt->num_rows;

        if($rnum==0){
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("siss", $yourName, $phoneNo, $emailID, $yourmsg);
            $stmt->execute();
            echo "New record inserted successfully";
        }else{
            echo " Someone already give feedback using this email";c
        }
        $stmt->close();
        $conn->close();
    }
 }else{
     echo"All field are required";
     die();
 }
}
?>
</body>
</html>