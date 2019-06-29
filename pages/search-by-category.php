<?php

$db = Database::Instance();

if (empty($_GET['catId'])) {
    redirect_to('');
}

$catId = $_GET['catId'];

$catData = $db->Select("SELECT tbl_job_post.*,tbl_job_categories.category_name FROM tbl_job_post
LEFT JOIN tbl_manage_job_post ON tbl_job_post.id=tbl_manage_job_post.job_post_id
LEFT JOIN tbl_job_categories ON tbl_manage_job_post.job_category_id=tbl_job_categories.id
WHERE tbl_job_categories.id =$catId");


?>

<div class="pageContentWrapper">
    <div class="container">
        <div class="row">
            <?php if (count($catData) > 0): ?>
                <div class="col-md-12">
                    <?php foreach ($catData as $jobCat) : ?>
                        <div class="welcome">
                            <div class="row">
                                <h1 style="color:RED;">
                                    <a href=""><?= $jobCat->category_name ?></a>
                                    <small><a href="" style="color: grey;">Post Data <?= $jobCat->post_date ?></a>
                                    </small>

                                </h1>
                                <p style="color:green">
                                    <?= $jobCat->description ?>
                                </p>
                                <a href="<?=URL('job-apply?criteria='.$jobCat->id)?>"
                                   class="btn btn-primary" style="height: 30px;">Apply Now</a>


                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            <?php else: ?>
                <div class="col-md-12">
                    <img src="<?= URL('messages/errors/haha.gif') ?>" alt="page not found"
                         class="img-responsive thumbnail center-block ">
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

