<?php

$db = Database::Instance();

$jobCat = $db->SelectAll('tbl_job_categories');

if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $data['fist_name'] = $_POST['fname'];
    $data['middle_name'] = $_POST['mname'];
    $data['last_name'] = $_POST['lname'];
    $data['gender'] = $_POST['gender'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $date = $year . '-' . $month . '-' . $day;
    $data['date_of_birth'] = $date;
    $data['married_status'] = $_POST['mstatus'];
    $data['mobile_number'] = $_POST['mobile'];
    $data['telephone_number'] = $_POST['telephone'];
    $data['current_address'] = $_POST['caddress'];
    $data['permanent_address'] = $_POST['paddress'];
    $data['email'] = $_POST['email'];
    $data['username'] = $_POST['username'];
    $data['password'] = md5($_POST['password']);
    $catId = $_POST['field'];
    $lastInsertId = $db->Insert('tbl_job_seekers', $data);
    if ($lastInsertId) {
        $sekData['category_id'] = $catId;
        $sekData['seeker_id'] = $lastInsertId;
        $db->Insert('tbl_job_seeker_manage', $sekData);
        $_SESSION['success'] = 'data was successfully inserted';
        $email = $_POST['email'];
        sendEmail($emailId, 'Thanks ', 'success');
        redirect_to('register');

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
                <h3 class="register-heading">Seeker Registration</h3>
                <div class="row register-form">
                    <?= Messages(); ?>
                    <form action="" method="post">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input required type="text" class="form-control" name="fname" id="box"
                                       placeholder="First Name"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="mname" id="box"
                                       placeholder="Middle Name"/>
                            </div>
                            <div class="form-group">
                                <input required type="text" class="form-control" name="lname" id="box"
                                       placeholder="Last Name"/>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="gender" id="box" value="Male"
                                       <?php if (isset($_POST['gender']) && $_POST['gender'] == "Male") { ?>checked<?php } ?>>
                                Male
                                <input type="radio" name="gender" id="box" value="Female"
                                       <?php if (isset($_POST['gender']) && $_POST['gender'] == "Female") { ?>checked<?php } ?>>
                                Female
                            </div>
                            <div class="form-group">
                                <input type="radio" name="mstatus" id="box" value="married"
                                       <?php if (isset($_POST['mstatus']) && $_POST['mstatus'] == "married") { ?>checked<?php } ?>>
                                Married
                                <input type="radio" name="mstatus" id="box" value="single"
                                       <?php if (isset($_POST['mstatus']) && $_POST['mstatus'] == "single") { ?>checked<?php } ?>>
                                Single
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="year" id="date" class="form-control">
                                            <option value="">Year</option>
                                            <?php for ($i = 1980; $i < date('Y'); $i++) : ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">

                                        <select name="month" id="date" class="form-control">
                                            <option value="">Month</option>
                                            <?php for ($i = 1; $i <= 12; $i++) : ?>
                                                <option value="<?php echo ($i < 10) ? '0' . $i : $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">

                                        <select name="day" id="date" class="form-control">
                                            <option value="">Day</option>
                                            <?php for ($i = 1; $i <= 31; $i++) : ?>
                                                <option value="<?php echo ($i < 10) ? '0' . $i : $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input required type="text" class="form-control" name="caddress" id="box"
                                       placeholder="Current Address"/>
                            </div>

                            <div class="form-group">
                                <select required name="field" class="form-control" id="box">
                                    <?php foreach ($jobCat as $jcat): ?>
                                        <option value="<?= $jcat->id ?>"><?= $jcat->category_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input required type="text" class="form-control" name="username" id="box"
                                       placeholder="Username"/>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="email" name="email"
                                       id="email">
                            </div>

                            <div class="form-group">
                                <input required type="password" class="form-control" name="password" id="box"
                                       placeholder="Password">
                            </div>

                            <div class="form-group">
                                <input required type="password" class="form-control" name="cpassword" id="box"
                                       placeholder="Confirm Password">
                            </div>
                            <div class="form-group">
                                <input required type="text" class="form-control" name="mobile" id="box"
                                       placeholder="Mobile no"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="telephone" id="box"
                                       placeholder="Telephone no"/>
                            </div>
                            <div class="form-group">
                                <input required type="text" class="form-control" name="paddress" id="box"
                                       placeholder="Permanent Address"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btnRegister" value="Register"/>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>


