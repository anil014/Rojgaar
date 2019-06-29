<?php
require_once "../system/Database.php";
$db = Database::Instance();
if (!empty($_POST)) {
    $data['type_name'] = $_POST['type_name'];
    $result = $db->Insert('tbl_companies_type', $data);
    if ($result == true) {
        echo "success";
        return true;
    }


}