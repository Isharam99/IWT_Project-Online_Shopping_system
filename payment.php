<!DOCTYPE html>
<html>
<body>
<?php
if(isset($_POST['SUBMIT'])){
 $firstName = $_POST['firstName'];
 $lastName = $_POST['lastName'];
 $CardNumber = $_POST['CardNumber'];
 $Date = $_POST['Date'];
 $cvv = $_POST['cvv'];
 $addressline1 = $_POST['addressline1'];
 $addressline2 = $_POST['addressline2'];
 $phoneNumber = $_POST['phoneNumber'];
 $province= $_POST['province'];
 $city= $_POST['city'];
 
 //Database connection
 if(!empty($firstName) || !empty($lastName) || !empty($CardNumber) || !empty($Date) || !empty($cvv) || !empty($addressline1) || !empty($addressline2) || !empty($phoneNumber) || !empty($provincee) || !empty($city)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "payment";

    //create connection
    $conn = new mysqli($firstName, $lastName, $CardNumber, $Date, $cvv, $addressline1, $addressline2,  $phoneNumber, $province, $city);

    if(mysqli_connect_error()){
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect-error());
    }else{
        $SELECT = "SELECT cvv From pay where cvv = ? Limit 1";
        $INSERT = "INSERT Into pay(firstName, lastName, CardNumber, Date,  cvv, addressline1, addressline2, phoneNumber, province, city) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("i", $cvv);
        $stmt->execute();
        $stmt->bind_results($cvv);
        $stmt->store_results();
        $rnum = $stmt->num_rows;

        if($rnum==0){
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssiiississ", $firstName, $lastName, $CardNumber, $Date, $cvv, $addressline1, $addressline2,  $phoneNumber, $province, $city);
            $stmt->execute();
            echo "New record inserted successfully";
        }else{
            echo " Someone already payment using this CVV";c
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