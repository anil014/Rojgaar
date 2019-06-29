<?php
$db = Database::Instance();

if (!empty($_GET['criteria']) && $_SERVER['REQUEST_METHOD'] == "GET") {
    $criteria = $_GET['criteria'];
    $result = $db->Select("SELECT tbl_articles.*,tbl_job_categories.category_name FROM tbl_articles
LEFT JOIN tbl_manage_articles ON tbl_articles.id=tbl_manage_articles.article_id
LEFT JOIN tbl_job_categories ON tbl_job_categories.id=tbl_manage_articles.category_id
WHERE tbl_articles.id='$criteria'");


}

?>

<div class="container">
    <div class="row">
        <?php foreach ($result as $article) : ?>
            <div class="col-md-8">
                <h3><a href=""><?= $article->title ?></a></h3>

                <p>
                    <?= $article->description ?>
                    <small class="label label-info">Category : <?=$article->category_name?></small>
                    <small class="label label-success"><?=$article->created_at?></small>
                    <small class="label label-danger"><?=$article->updated_at?></small>
                </p>
            </div>
            <div class="col-md-4">
                <img src="<?= URL('public/images/articles/' . $article->image) ?>"
                     class="img-responsive thumbnail center-block" alt="">

            </div>


        <?php endforeach; ?>

    </div>
</div>



