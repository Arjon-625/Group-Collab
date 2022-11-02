<?php
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $number = $_POST['number'];

    $connect = new mysqli('localhost','root','','emp-management_system');
    if($connect->connect_error) {
        die('Connection Failed! :'.$connect->connect_error);
    } else {
        $stm = $connect->prepare("INSERT INTO employee(firstName, middleName, lastName, gender, birthday, address, email, number)
            VALUES(?,?,?,?,?,?,?,?)");
        $stm->bind_param("sssssssi",$firstName, $middleName, $lastName, $gender, $birthday, $address, $email, $number);
        $stm->execute();
        echo "You succesfully added a new employee!";
        $stm->close();
        $connect->close();
    }

?>