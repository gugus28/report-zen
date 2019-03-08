<?php

define('HOST','localhost');
define('USER','postgres');
define('PASSWORD','postgres');
define('DB','db_user');


if($_SERVER['REQUEST_METHOD']=='POST'){

    $user_email= $_POST["user_email"];
    $user_pass = $_POST["user_pass"];

    if($user_email == '' || $user_pass == ''){
        echo "Gagal";
        exit;
    }


$con = pg_connect(HOST, USER, PASSWORD, DB) or die ("Gagal terhubung");

$sql = "select nama_lengkap from pengguna where user_email ='$user_email' and user_pass ='$user_pass'";
$result=pg_query($con, $sql);
$data = pg_fetch_array($result);

if(isset($data)){
    echo "login";
    }else{
    echo "fail";
}

pg_close($con);

?>