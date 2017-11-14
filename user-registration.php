<?php
    include "config/Database.php";
    include "header.php";
    include "sidebar.php";
?>

<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Register</h1>
            <p>A free and modular admin template</p>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-user fa-lg"></i></li>
                <li><a href="#">Register</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-title">Register</h3>
                <div class="card-body">
                    <?php
                        $database = new Database();
                        $database->query('SELECT * FROM `tbl_users` WHERE 1');
                        $row    =   $database->resultset();
                        echo "<pre>";
                        print_r($row);
                        echo "</pre>";
                        $userReg  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                        if($userReg['submit']){
                            $user_full_name =  $userReg['user_full_name'];
                            $user_email =  $userReg['user_email'];
                            $user_name =  $userReg['user_name'];
                            $user_password =  $userReg['user_password'];
                            $user_address =  $userReg['user_address'];
                            $user_gender =  $userReg['user_gender'];

                            $database->query('INSERT INTO tbl_users (user_full_name,user_email,user_password,user_address,user_gender) VALUES (:user_full_name, :user_email, :user_password, :user_address, :user_gender)');
                            $database->bind(':user_full_name', $user_full_name);
                            $database->bind(':user_email', $user_email);
                            $database->bind(':user_name', $user_name);
                            $database->bind(':user_password', $user_password);
                            $database->bind(':user_address', $user_address);
                            $database->bind(':user_gender', $user_gender);
                            $database->execute();
                        }

                    ?>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-8">
                                <input class="form-control" name="user_full_name" type="text" placeholder="Enter full name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" name="user_email" type="email" placeholder="Enter email address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="user_name" placeholder="Enter Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" type="password" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Confirm Password</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" name="user_password" type="password" placeholder="Enter Confirm Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="4" name="user_address" placeholder="Enter your address"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Gender</label>
                            <div class="col-md-9">
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" value="male" name="user_gender">Male
                                    </label>
                                </div>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" value="female" name="user_gender">Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">I accept the terms and conditions
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-3">
                                <input class="btn btn-primary icon-btn" type="submit" name="submit" value="Register">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-3">
                            <!--<input class="btn btn-primary icon-btn" type="submit" name="submit" value="Register">-->
                            <!--<button class="btn btn-primary icon-btn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include "footer.php";
?>
