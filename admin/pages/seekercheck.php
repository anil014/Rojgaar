<?php
$db = Database::Instance();


if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $findData = $db->SelectBy("SELECT * FROM tbl_job_seekers WHERE username='$username' && password='$password'");
    if (count($findData) > 0) {
        $findData = array_shift($findData);
        $_SESSION['user_id'] = $findData->id;
        $_SESSION['username'] = $findData->username;
        $_SESSION['is_login_seeker'] = true;
        $_SESSION['email'] = $findData->email;
        redirect_to('welcome');


    } else {
        $_SESSION['error'] = 'username and password not match';
        redirect_to();
    }


} else {
    redirect_to();
}