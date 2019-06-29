<?php
require_once '../config/config.php';
require_once "../system/Database.php";
$db = Database::Instance();

if (isset($_POST['company-login']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $companyUserName = $_POST['company_username'];
    $companyPassword = md5($_POST['company_password']);
    $companyResult = $db->Select("SELECT * FROM tbl_companies 
                                WHERE company_username='$companyUserName' &&
                                 company_password='$companyPassword'");

    if (count($companyResult) > 0) {
        $companyData = array_shift($companyResult);
        $_SESSION['company_id'] = $companyData->id;
        $_SESSION['company_username'] = $companyData->company_username;
        $_SESSION['company_email'] = $companyData->company_email;
        $_SESSION['company_logo'] = $companyData->company_logo;
        $_SESSION['is_login'] = true;
        redirect_to('@company-admin');
    } else {
        $_SESSION['error'] = 'username and password not match';
        redirect_to('index.php');
    }

} else {
    $_SESSION['error'] = 'invalid access';
    redirect_to('index.php');
}
