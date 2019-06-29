<?php

$db = Database::Instance();
$_SESSION['apply_category_id'] = $_GET['criteria'];

if (!isset($_SESSION['username']) || $_SESSION['is_login_seeker'] != true) {
    redirect_to();
}










?>

<div class="container">
    <div class="row main">
        <div class="main-login main-center">
            <h2>Jobs</h2>
            <?= Messages(); ?>


        </div>
    </div>
</div>
