<?php
$db = Database::Instance();
$jobCategory = $db->Select('SELECT * FROM tbl_job_categories ORDER BY id DESC ');
$postJobs = $db->Select('SELECT * FROM tbl_job_post ORDER BY id DESC LIMIT 3 ');

$articleData = $db->Select("SELECT tbl_articles.*,tbl_job_categories.category_name FROM tbl_articles
LEFT JOIN tbl_manage_articles ON tbl_articles.id=tbl_manage_articles.article_id
LEFT JOIN tbl_job_categories ON tbl_job_categories.id=tbl_manage_articles.category_id
 ORDER BY tbl_manage_articles.id DESC LIMIT 3");


?>

<div class="pageContentWrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8">
                    <div class="welcome">
                        <div class="row">
                            <h1 style="color:RED;">Welcome to Rojgar
                            </h1>
                            <p style="color:green">Whether you are looking for a job or an employee,
                                we can help you find what you have in mind We are the leading online network for
                                careers,
                                connecting companies with the most qualified individuals</p><br><br>

                            <centre>
                                <button class="btn btn-lg btn-primary pull-left" onClick="location.href='register'"
                                        type="submit">job seeker Sign up
                                </button>&nbsp;
                                <button class="btn btn-lg btn-primary" onClick="location.href='company-register'"
                                        type="submit">employer Sign up
                                </button>
                            </centre>
                        </div>
                    </div>
                    <div class="row">
                        <div class="search-block-home">
                            <h2>Quick job search</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="job" id="job-search" class="form-control"
                                           placeholder="Keyword">
                                    <div id="searchBox"></div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-search"></span> Search
                                    </button>


                                    <!--=====end search-->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--===========right login box=========-->
                <div class="col-md-4">
                    <h2>Log in</h2>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">I’m a Job Seeker</a></li>
                        <li><a data-toggle="tab" href="#menu1">I’m a Recruiter</a></li>
                    </ul>


                    <div class="tab-content">
                        <?= Messages(); ?>
                        <div id="home" class="tab-pane fade in active">
                            <?= Messages(); ?>
                            <form action="<?= URL('seekercheck') ?>" method="post">
                                <input type="text" class="form-control signup" name="username" placeholder="Username">
                                <input type="password" class="form-control signup" name="password"
                                       placeholder="Password">

                                <button class="btn btn-active btn-success" onClick="location.href='#'" type="submit">
                                    Log in <i class="fa fa-unlock"></i>
                                </button>
                            </form>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <form action="<?= URL('action/login.php') ?>" method="post">
                                <input type="text" class="form-control signup" name="company_username"
                                       placeholder="Username">
                                <input type="password" class="form-control signup" name="company_password"
                                       placeholder="Password">

                                <button name="company-login" class="btn btn-success" type="submit">Log
                                    in <i class="fa fa-unlock"></i>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
                <!--=========end right box===-->


            </div>
        </div>

    </div>
</div>
<div class="container">
    <!-- Job Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="row jobs-by-category">
                <div class="col-lg-4 vline">
                    <h2>Jobs By Category</h2>
                    <ul class="jobs-by-category2">
                        <div class="scrollbar">
                            <div class="content">
                                <?php foreach ($jobCategory as $jobCat) : ?>
                                    <li>
                                        <a href="<?= URL('search-by-category?catId=' . $jobCat->id) ?>"><?= $jobCat->category_name ?></a>
                                    </li>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </ul>
                </div>
                <div class="col-lg-4 vline">
                    <h2>latest jobs</h2>

                    <?php foreach ($postJobs as $job) : ?>
                        <li><a href="<?=URL('latest-jobs?criteria='.$job->id)?>"><?= $job->company_name ?></a></li>
                    <?php endforeach; ?>

                </div>
                <div class="col-lg-4">
                    <h2>articles</h2>
                    <ul class="articles">
                        <?php foreach ($articleData as $article): ?>
                            <li><img src="<?=URL('public/images/articles/'.$article->image)?>" width="30" align="left" class="article">
                                <a href="<?=URL('article-show?criteria='.$article->id)?>"><?=$article->category_name?></a>
                                <p>
                                   <?=substr($article->title,0,40)?>
                                </p>
                                </li>

                        <?php endforeach; ?>


                    </ul>
                </div>
            </div>

        </div>

    </div>

</div>


