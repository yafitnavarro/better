<?php

session_start();
include_once("connect.php");
$email=filter_input(INPUT_POST,'userEmail',FILTER_SANITIZE_STRING);

$result_user="SELECT * FROM users WHERE email='$email' LIMIT 1";
$resultado_user=mysqli_query($conn,$result_user);

if(($resultado_user)AND ($resultado_user->num_rows!=0)) {
$userName=filter_input(INPUT_POST,'userName',FILTER_SANITIZE_STRING);
$_SESSION['userName'] = $userName;
$resultado='adm.php';
echo $resultado;

}

else{
$resultado='error';

echo (json_encode($resultado));

}
