<?php layout('layout.header'); ?>
<!-- Our Dashbord -->
<section class="our-dashbord dashbord">
    <div class="container">
        <div class="row">
            <?php layout('user.layout.menu'); ?>
            <div class="col-sm-12 col-lg-8 col-xl-9">
                <div class="my_profile_form_area">
                    <?= ($error && $error['status'] == 'success') ? '<div class="alert alert-success" role="alert">' . $error['message'] . '</div>' : '' ?>
                    <?= ($error && $error['status'] == 'error') ? '<div class="alert alert-danger" role="alert">' . $error['message'] . '</div>' : '' ?>
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <?php csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="mb30">Edit Jobs</h4>
                            </div>
                            <div class="col-lg-12">
                                <div class="my_profile_input form-group">
                                    <label for="inputOldPassword">Old Password</label>
                                    <input type="password" class="form-control" name="oldPassword" id="inputOldPassword" required>
                                    <span class="text-danger"><?= (isset($error['error']['old'])) ? $error['error']['old'] : '' ?></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="my_profile_input form-group">
                                    <label for="inputPassword">New Password</label>
                                    <input type="password" class="form-control" name="password" id="inputPassword"required>
                                    <span class="text-danger"><?= (isset($error['error']['new'])) ? $error['error']['new'] : '' ?></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="my_profile_input form-group">
                                    <label for="inputConfirmPassword">Confirm Password</label>
                                    <input type="password" class="form-control" name="cfPassword" id="inputConfirmPassword" required>
                                    <span class="text-danger"><?= (isset($error['error']['confirm'])) ? $error['error']['confirm'] : '' ?></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="my_profile_input">
                                    <button type="submit" class="btn btn-lg btn-thm">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php layout('layout.footer'); ?>