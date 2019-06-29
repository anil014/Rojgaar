<?php
$db = Database::Instance();
if (!isset($_SESSION['username']) || $_SESSION['is_login_seeker'] != true) {
    redirect_to();
    exit();

}

$userId = $_SESSION['user_id'];


$applyData = $db->Select("SELECT tbl_job_apply.*,tbl_job_seekers.*,
tbl_job_categories.category_name,tbl_companies.*,tbl_companies.company_name as cmp_name FROM tbl_job_apply
LEFT JOIN tbl_manage_job_apply ON tbl_job_apply.id=tbl_manage_job_apply.apply_id
LEFT JOIN tbl_job_seekers on tbl_job_seekers.id=tbl_manage_job_apply.seeker_id
LEFT JOIN tbl_job_categories ON tbl_job_categories.id=tbl_manage_job_apply.category_id
LEFT JOIN tbl_companies ON tbl_companies.id=tbl_manage_job_apply.company_id
WHERE tbl_manage_job_apply.seeker_id='$userId'
");


?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <tr>
                    <th>S.n</th>
                    <th>Company name</th>
                    <th> company email</th>
                    <th>category name</th>
                    <th>company website</th>
                    <th>company logo</th>
                </tr>
                <?php foreach ($applyData as $key=>$apply) : ?>
                    <tr>
                        <td><?=++$key?></td>
                        <td><?=$apply->company_name?></td>
                        <td><?=$apply->company_email?></td>
                        <td><?=$apply->category_name?></td>
                        <td><?=$apply->company_website?></td>
                        <td>
                            <img src="<?=URL('public/images/company/'.$apply->company_logo)?>" alt="" width="30">
                        </td>
                    </tr>

                <?php endforeach; ?>
            </table>

            <a href="<?=URL('welcome')?>" class="btn btn-success btn-sm">Go to home </a>
        </div>
    </div>
</div>

