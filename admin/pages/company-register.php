<?php


$db = Database::Instance();
$companyType = $db->SelectAll('tbl_companies_type');

if (!empty($_POST)) {
    if (empty($_POST['company_name'])) {
        $_SESSION['error'] = "company name field is required";
        back();
    }
    $data['company_name'] = $_POST['company_name'];
    $data['company_address'] = $_POST['company_address'];
    $data['company_contact'] = $_POST['company_contact'];
    $data['company_optional_contact_number'] = $_POST['company_optional_contact_number'];
    $data['company_email'] = $_POST['company_email'];
    $data['company_username'] = $_POST['company_username'];
    $data['company_password'] = md5($_POST['company_password']);
    $data['company_website'] = $_POST['company_website'];

    $target_dir = page_path('public/images/company/');
    $imageFileType = pathinfo($_FILES['company_logo']['name'], PATHINFO_EXTENSION);

    $imageName = md5(microtime()) . '.' . $imageFileType;
    $tpmName = $_FILES['company_logo']['tmp_name'];

    if (move_uploaded_file($tpmName, $target_dir . $imageName)) {
        $data['company_logo'] = $imageName;
    }

    $typeId = $_POST['company_type'];
    if ($lastInsertId = $db->Insert('tbl_companies', $data)) {
        if ($lastInsertId) {
            $dbs = Database::Instance();
            $cmpType['company_id'] = $lastInsertId;
            $cmpType['company_type_id'] = $typeId;
            $dbs->Insert('tbl_companies_id', $cmpType);
        }


        $_SESSION['success'] = 'was successfully successfully register ';
        redirect_to('company-register');

    }
}


?>
<div class="container">
    <div class="row main">
        <div class="my-register main-center">
            <h2>Company Registration</h2>
            <?= Messages(); ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" name="company_name" value="" id="company_name"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_address">Company Address</label>
                            <input type="text" name="company_address" id="company_address"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="company_type">Company Type</label>
                                    <select name="company_type" id="" class="form-control">
                                        <option disabled selected>--select company type--</option>
                                        <?php foreach ($companyType as $company) : ?>
                                            <option value="<?= $company->id ?>"><?= $company->type_name ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-default" data-toggle="modal"
                                            data-target="#myModal" style="margin-top: 34px;">
                                        Add Company Type
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">Add Company Type </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="company">Company Type</label>
                                                        <input type="text" id="company" class="form-control">
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="company-type" class="btn btn-primary">Save
                                                        changes
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_contact">Contact Number</label>
                                    <input type="text" name="company_contact" id="company_contact"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_optional_contact_number">Optional Contact
                                        Number</label>
                                    <input type="text" name="company_optional_contact_number"
                                           id="company_optional_contact_number"
                                           class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_email">Email</label>
                            <input type="text" name="company_email"
                                   id="company_email"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_username">User name</label>
                            <input type="text" name="company_username"
                                   id="company_username"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_password">Password</label>
                            <input type="password" name="company_password"
                                   id="company_password"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_website">Website</label>
                            <input type="text" name="company_website"
                                   id="company_website"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="change_image">Company logo</label>
                            <input type="file" name="company_logo"
                                   id="change_image"
                                   class="btn btn-default">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-primary btn-register">Add Company</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>




