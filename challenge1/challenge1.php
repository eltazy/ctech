<?php
include_once "utils.conf.php";

if(isset($_POST['btn_save'])){
    $_POST['firstname'] = htmlspecialchars(trim($_POST['firstname']));
    $_POST['lastname'] = htmlspecialchars(trim($_POST['lastname']));
    $_POST['email'] = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $_POST['phone'] = filter_var(trim($_POST['phone']), FILTER_SANITIZE_NUMBER_INT);
    $_POST['phone'] = str_replace('-', '', $_POST['phone']);
    $_POST['addme'] = isset($_POST['addme']) ? 1 : 0;

    if(validate_input()){
        $quest = $db->prepare("INSERT INTO users(firstname, lastname, email, phone, mailing_list) VALUES (?, ?, ?, ?, ?)");
        if($quest->execute(array($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['phone'], $_POST['addme']))){
            $_POST = array();
            $_POST['submit_success']=TRUE;
        }
        else $_POST['submit_success']=FALSE;
    }
}
?>
<html>
<head>
    <title>Add to Mailing list</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php if(isset($_POST['submit_success']) && $_POST['submit_success']):?>
            <div class="alert alert-success text-center align-middle" role="alert">Successfully added user</div>
        <?php elseif(isset($_POST['submit_success'])&& !$_POST['submit_success']):?>
            <div class="alert alert-danger text-center align-middle" role="alert">Something went wrong. Could not save data</div>
        <?php endif; ?>
        <div class="row">
            <div class="col-sm-4 offset-sm-4 text-center align-middle">
                <h1 class="display-4">Register</h1>
                <div class="info-form">
                    <form class="justify-content-center" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control<?= isset($_POST['firstname_error'])?' is-invalid':'' ?>" placeholder="First name" name="firstname" value="<?= isset($_POST['firstname'])?$_POST['firstname']:'' ?>" required autofocus>
                            <?php if(isset($_POST['firstname_error'])): ?>
                                <small class="text-danger">Field cannot be empty</small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control<?= isset($_POST['lastname_error'])?' is-invalid':'' ?>" placeholder="Last name" name="lastname" value="<?= isset($_POST['lastname'])?$_POST['lastname']:'' ?>" required >
                            <?php if(isset($_POST['lastname_error'])): ?>
                                <small class="text-danger">Field cannot be empty</small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control<?= isset($_POST['invalid_email_error'])?' is-invalid':'' ?>" placeholder="Email" name="email" value="<?= isset($_POST['email'])?$_POST['email']:'' ?>" required >
                            <?php if(isset($_POST['invalid_email_error'])): ?>
                                <small class="text-danger">Invalid email</small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control<?= isset($_POST['phone_error'])?' is-invalid':'' ?>" placeholder="Phone" name="phone" value="<?= isset($_POST['phone'])?$_POST['phone']:'' ?>" required >
                            <?php if(isset($_POST['phone_error'])): ?>
                                <small class="text-danger">Invalid phone number</small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group text-left">
                            <input type="checkbox" name="addme" id="addme" <?= isset($_POST['addme'])?"checked":"" ?>>
                            <label for="addme">Add me to mailing list</label>
                        </div>
                        <div class="form-group text-left">
                        <button type="submit" class="btn btn-success" name="btn_save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="bootstrap.min.js" type="text/javascript"></script>
    <script src="jquery.min.js" type="text/javascript"></script>
</body>
</html>
