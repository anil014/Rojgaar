<?php
require_once "../system/Database.php";
if (!empty($_POST)) {
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['subject'] = $_POST['subject'];
    $data['message'] = $_POST['message'];
    $data['created_at'] = date('Y-m-d H:i:s');
    $db = Database::Instance();
    $result = $db->Insert('tbl_contacts', $data);
    if ($result == true) {
        echo "message was successfully send";

    } else {
        echo "there was a problems";
    }

}