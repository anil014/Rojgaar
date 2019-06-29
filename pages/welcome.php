<?php
$db = Database::Instance();

if (!isset($_SESSION['username']) || $_SESSION['is_login_seeker'] != true) {
    redirect_to();
    exit();

}

$userId = $_SESSION['user_id'];


?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?= Messages(); ?>
            <h2>Welcome <?= $_SESSION['username'] ?></h2>

            <a href="<?= URL('edit-user-info?criteria=' . $userId) ?>" class="btn btn-success">Edit Information</a>
            <a href="<?= URL('show_apply_jobs') ?>" class="btn btn-success">Show Apply Jobs</a>


            <hr>

            <?php if (isset($_SESSION['apply_category_id'])) : ?>

                <?php $criteria = $_SESSION['apply_category_id'];
                $result = $db->Select("
     SELECT tbl_job_post.*,
      tbl_job_categories.category_name,
      tbl_job_categories.id as category_id,
      tbl_companies.id as company_id
       FROM tbl_job_post
LEFT JOIN tbl_manage_job_post ON tbl_job_post.id=tbl_manage_job_post.job_post_id
LEFT JOIN tbl_job_categories ON tbl_manage_job_post.job_category_id=tbl_job_categories.id
LEFT JOIN tbl_companies ON tbl_companies.id=tbl_manage_job_post.company_id
WHERE tbl_job_post.id='$criteria'");

                $jobsData = array_shift($result);
                ?>

                <form action="<?= URL('job-apply-action') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="cat_id" value="<?= $jobsData->category_id ?>">
                    <input type="hidden" name="company_id" value="<?= $jobsData->company_id ?>">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" name="company_name" readonly value="<?= $jobsData->company_name ?>"
                                       id="company_name"
                                       class="form-control">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email"
                                       id="email" value="<?= $_SESSION['email'] ?>"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field">Field</label>
                                <input type="text" value="<?= $jobsData->category_name ?>" name="field"
                                       id="field"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="position">position</label>
                                <input type="text" name="position"
                                       id="position"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="experience">experience</label>
                                <input type="text" name="experience"
                                       id="experience"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="level">level</label>
                                <input type="text" name="level"
                                       id="experience"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="full_name">full_name</label>
                                <input type="text" name="full_name"
                                       id="full_name"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="current_address">current_address</label>
                                <input type="text" name="current_address"
                                       id="current_address"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="permanent_address">permanent_address</label>
                                <input type="text" name="permanent_address"
                                       id="permanent_address"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type">type</label>
                                <input type="text" name="type"
                                       id="type"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="documents">Document</label>
                                <input type="file" name="documents"
                                       id="documents"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="description">description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button name="apply-job" class="btn btn-primary">Apply Jobs</button>
                            </div>
                        </div>
                    </div>
                </form>

            <?php endif; ?>

        </div>
    </div>
</div>
