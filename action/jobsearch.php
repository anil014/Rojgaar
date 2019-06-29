<?php
require_once '../config/config.php';
require_once "../system/Database.php";
$db = Database::Instance();

if (isset($_GET['data']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $data = $_GET['data'];

    $result = $db->Select("SELECT tbl_job_post.*,tbl_job_categories.category_name FROM tbl_job_post
LEFT JOIN tbl_manage_job_post ON tbl_job_post.id=tbl_manage_job_post.job_post_id
LEFT JOIN tbl_job_categories ON tbl_manage_job_post.job_category_id=tbl_job_categories.id
WHERE tbl_job_categories.category_name LIKE '%$data%' OR tbl_job_post.company_name LIKE '%$data%'");
    if (count($result) > 0) {
        foreach ($result as $value) {
            echo "<a href='search-jobs?criteria=$value->id'>{$value->category_name}</a>";
            echo "<br>";
        }
    } else {
        echo "<img src='../public/icons/ic_notfound.png' class='img-responsive thumbnail center-block'>";
    }


}
