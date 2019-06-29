<?php
$db = Database::Instance();

if (!isset($_SESSION['username']) || $_SESSION['is_login_seeker'] != true) {
    redirect_to();
    exit();
}

if (empty($_GET['criteria'])) {
    redirect_to();
    exit();
}

$criteriaId = $_GET['criteria'];

$userData = $db->SelectByCriteria('tbl_job_seekers', '', 'id=?', array($criteriaId));


$jobCat = $db->SelectAll('tbl_job_categories');

if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $data['fist_name'] = $_POST['fname'];
    $data['middle_name'] = $_POST['mname'];
    $data['last_name'] = $_POST['lname'];
    $data['gender'] = $_POST['gender'];
    $data['married_status'] = $_POST['mstatus'];
    $data['mobile_number'] = $_POST['mobile'];
    $data['telephone_number'] = $_POST['telephone'];
    $data['current_address'] = $_POST['caddress'];
    $data['permanent_address'] = $_POST['permanent_address'];
    $data['email'] = $_POST['email'];
    $data['username'] = $_POST['username'];
    $criteria = $_POST['criteria'];
    if ($db->Update('tbl_job_seekers', $data, 'id=?', array($criteria))) {
        $_SESSION['success'] = 'information was successfully updated';
        redirect_to('welcome');
    }


}


?>


<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
            <p>You are 30 seconds away from earning your own money!</p>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content">
                <h3 class="register-heading">Update Information</h3>
                <div class="row register-form">

                    <form action="" method="post">
                        <input type="hidden" name="criteria" value="<?= $userData->id ?>">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input required type="text" value="<?= $userData->fist_name ?>" class="form-control"
                                       name="fname" id="box"
                                       placeholder="First Name"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?= $userData->middle_name ?>"
                                       name="mname" id="box"
                                       placeholder="Middle Name"/>
                            </div>
                            <div class="form-group">
                                <input required type="text" value="<?= $userData->last_name ?>" class="form-control"
                                       name="lname" id="box"
                                       placeholder="Last Name"/>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="gender"
                                       id="box" <?= $userData->gender == 'male' ? 'checked' : '' ?> value="Male"
                                       <?php if (isset($_POST['gender']) && $_POST['gender'] == "Male") { ?>checked<?php } ?>>
                                Male
                                <input type="radio" name="gender"
                                       id="box" <?= $userData->gender == 'female' ? 'checked' : '' ?> value="Female"
                                       <?php if (isset($_POST['gender']) && $_POST['gender'] == "Female") { ?>checked<?php } ?>>
                                Female
                            </div>
                            <div class="form-group">
                                <input type="radio"
                                       name="mstatus" <?= $userData->married_status == 'married' ? 'checked' : '' ?>
                                       id="box" value="married"
                                       <?php if (isset($_POST['mstatus']) && $_POST['mstatus'] == "married") { ?>checked<?php } ?>>
                                Married
                                <input type="radio"
                                       name="mstatus" <?= $userData->married_status == 'single' ? 'checked' : '' ?>
                                       id="box" value="single"
                                       <?php if (isset($_POST['mstatus']) && $_POST['mstatus'] == "single") { ?>checked<?php } ?>>
                                Single
                            </div>


                            <div class="form-group">
                                <input required type="text" value="<?= $userData->current_address ?>"
                                       class="form-control" name="caddress" id="box"
                                       placeholder="Current Address"/>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input required type="text" value="<?= $userData->username ?>" class="form-control"
                                       name="username" id="box"
                                       placeholder="Username"/>
                            </div>

                            <div class="form-group">
                                <input type="text" value="<?= $userData->email ?>" class="form-control"
                                       placeholder="email" name="email"
                                       id="email">
                            </div>

                            <div class="form-group">
                                <input required type="text" value="<?= $userData->mobile_number ?>" class="form-control"
                                       name="mobile" id="box"
                                       placeholder="Mobile no"/>
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?= $userData->telephone_number ?>" class="form-control"
                                       name="telephone" id="box"
                                       placeholder="Telephone no"/>
                            </div>
                            <div class="form-group">
                                <input required type="text" value="<?=$userData->permanent_address ?>" class="form-control"
                                       name="permanent_address" id="box"
                                       placeholder="Permanent Address"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btnRegister" value="Update Info"/>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>


