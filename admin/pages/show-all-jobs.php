<?php
$db = Database::Instance();
$getJobs = $db->Select("SELECT tbl_job_post.*,tbl_job_categories.category_name FROM tbl_job_post
LEFT JOIN tbl_manage_job_post ON tbl_job_post.id=tbl_manage_job_post.job_post_id
LEFT JOIN tbl_job_categories ON tbl_manage_job_post.job_category_id=tbl_job_categories.id");

?>

<div class="container">
    <div class="row">
        <?php foreach ($getJobs as $jobs) : ?>
            <div class="col-md-10">
                <h3><a href=""><?= $jobs->company_name ?></a></h3>

                <p>
                    <?= $jobs->description ?>
                    <br>
                    <small class="label label-info">Category : <?= $jobs->category_name ?></small>
                    <small class="label label-success"><?= $jobs->post_date ?></small>
                    <small class="label label-danger"><?= $jobs->exip_date ?></small>
                </p>
            </div>
            <div class="col-md-2">
                <img src="<?= URL('public/images/company/' . $jobs->company_logo) ?>"
                     class="img-responsive center-block" alt="">
                <hr>
                <a href="<?= URL('public/images/document/' . $jobs->documents) ?>" download>
                    <i class="fa fa-file-pdf-o"></i>Download</a>

            </div>


        <?php endforeach; ?>

    </div>
</div>

