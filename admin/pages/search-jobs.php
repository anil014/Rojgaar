<?php
$db = Database::Instance();

$categoryJobs = $db->SelectAll('tbl_job_categories');

if (!empty($_GET['criteria']) && $_SERVER['REQUEST_METHOD'] == "GET") {
    $criteria = $_GET['criteria'];
    $result = $db->Select("SELECT tbl_job_post.*,tbl_job_categories.category_name FROM tbl_job_post
LEFT JOIN tbl_manage_job_post ON tbl_job_post.id=tbl_manage_job_post.job_post_id
LEFT JOIN tbl_job_categories ON tbl_manage_job_post.job_category_id=tbl_job_categories.id
WHERE tbl_job_post.id='$criteria'");


}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <h1>JOB OVERVIEW</h1>
                    <?php foreach ($result as $job) : ?>
                        <table class="table table-hover">
                            <tr>
                                <th>Category</th>
                                <td><?= $job->category_name ?></td>
                            </tr>
                            <tr>
                                <th>Company name</th>
                                <td><?= $job->company_name ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?= $job->address ?></td>
                            </tr>
                            <tr>
                                <th>Contact Number</th>
                                <td><?= $job->contact_number ?></td>
                            </tr>
                            <tr>
                                <th>Position</th>
                                <td><?= $job->position ?></td>
                            </tr>
                            <tr>
                                <th>Qualification</th>
                                <td><?= $job->qualification ?></td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td><?= $job->gender ?></td>
                            </tr>
                        </table>

                        <p>
                            <?= $job->description ?>
                            <small>Post date <?= $job->post_date ?></small>
                            <span class="label label-info"><?= diffForHumans($job->exip_date); ?></span>
                        </p>

                        <a href="<?=URL('job-apply?criteria='.$job->id)?>" class="btn btn-primary" style="height: 30px;">Apply Now</a>
                    <?php endforeach; ?>

                </div>
                <div class="col-md-4">
                    <h1>Job Category</h1>
                    <ul>
                        <?php foreach ($categoryJobs as $catJob): ?>
                            <li>
                                <a href="<?= URL('search-by-category?catId=' . $catJob->id) ?>"><?= $catJob->category_name ?></a>
                            </li>

                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>


        </div>
    </div>
</div>

