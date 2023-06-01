<?php
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $locality=$_POST['locality'];
    //Database connection
//     CREATE TABLE gym
// (
// 	id integer AUTO_INCREMENT,
//     name varchar(20),
//     age integer,
//     gender ENUM('m', 'f','o'),
//     locality varchar(20),
//     PRIMARY KEY (id)
// )
$conn= new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt=$conn->prepare("insert into gym( name, age, gender, locality) values( ?, ?, ?, ?)");
    $stmt->bind_param("siss", $name, $age, $gender, $locality);
    $stmt->execute();
    echo "Registration Successful...";
    $stmt->close();
    $conn->close();
}
?>