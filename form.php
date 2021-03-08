<?php

$username = $_POST['user_name']; //Създаваме променлива $username и й присвояваме въведената стойност в полето user_name 
                                 //чрез глобалната променлива $_POST, която се използва за събиране на данни от формуляри

$password = $_POST['user_password'];

$username = filter_input(INPUT_POST, 'user_name'); //Проверява дали променливата $username е изпратена на php страницата с метода post

$password = filter_input(INPUT_POST, 'user_password');


if(empty($username)) {            // Проверява дали променливата $username е празна
    $name_error = 'Моля въведете потребителско име!' ;      // създаваме променлива $name_error, която да се покаже, ако е изпълнено условието
} elseif(strlen($username) < 6) {        //Функцията strlen() проверява дали дължината на низа е по-малка от 6.
    $name_error = 'Потребителското ви име трябва да е минимум 6 букви!' ;
} elseif (!preg_match("/^[a-zA-Z0-9@' ]*$/",$username)) { // Функцията preg_match () проверява дали е открито съвпадение в низ с посочените символи.
    $name_error = 'Позволени са само букви и цифри!' ;
}

if(empty($password)) {
    $password_error = 'Моля въведете парола!' ;
} elseif(strlen($password) < 6) {
    $password_error = 'Паролата ви трябва да е минимум 6 букви!' ;
} elseif (!preg_match("/^[a-zA-Z0-9' ]*$/",$password)) {
    $password_error = 'Позволени са само букви и цифри!' ;
}

if(empty($name_error) && empty($password_error)) {
    include('success.php');                             //Ако няма грешки се свърза с файла success.php
} else {
    include('index.php');
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = test_input($_POST["user_name"]); //променливата $username минава проверка чрез функцията test_input за въведените 
                                               //данни в полето user_name, които се събират от глобалната променлива $_POST

  $password = test_input($_POST["user_password"]);
}

function test_input($data) {  //Създаваме функцията test_input, придаваме й аргумент $data
    $data = trim($data); // trim премахва празните пространства от низа
    $data = stripslashes($data); // stripslashes премахва наклонените черти
    $data = htmlspecialchars($data); //htmlspecialchars премахва специалните символи
    return $data; 
  }

  ?>


<?php //връзка с базата данни
$servername = "localhost";
$username = "kai";
$password = "kai12345";
$dbname = 'kai';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Свързахте се успешно с базата данни! "; 

// Create database
//$sql = "CREATE DATABASE Kai";
//if ($conn->query($sql) === TRUE) {
 // echo "Database created successfully";
//} else {
//  echo "Error creating database: " . $conn->error;
//}
  
 // $conn->close();

$username = $_POST['user_name']; 

$password = $_POST['user_password'];

$sql = "INSERT INTO myguests (username, password)
VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {   //ако се изпрати заявката успешно
  echo "Вашата регистрация е запазена в базата данни!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>