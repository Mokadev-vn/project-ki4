<?php layout('layout.header'); ?>
<!-- Our Dashbord -->
<section class="our-dashbord dashbord">
    <div class="container">
        <div class="row">
            <?php layout('user.layout.menu'); ?>
            <div class="col-sm-12 col-lg-8 col-xl-9">
                <div class="my_profile_form_area employer_profile">
                <?= ($error && $error['status'] == 'success') ? '<div class="alert alert-success" role="alert">'. $error['message'].'</div>' : '' ?>
                    
                    <form action="<?= APP_CONFIG['url'] ?>company-profile" method="post" enctype="multipart/form-data">
                        <?php csrf_field(); ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="fz20 mb20">Company Profile</h4>
                            </div>
                            <div class="col-lg-12">
                                <div class="avatar-upload mb30">
                                    <div class="avatar-edit">
                                        <input class="btn btn-thm" type='file' name="avatar" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview"><img src="<?= ($infoCompany['avatar']) ? APP_CONFIG['uploads'] . $infoCompany['avatar'] : APP_CONFIG['uploads'] . 'avatar.png' ?>" alt="" width="150px" height="130px"></div>
                                    </div>
                                    <span class="text-danger"><?= (isset($error['error']['image'])) ? $error['error']['image'] : '' ?></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="my_profile_thumb_edit"></div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_input form-group">
                                    <label for="inputName">Company Name</label>
                                    <input type="text" class="form-control" id="inputName" name="name" value="<?= $infoCompany['name'] ?>">
                                    <span class="text-danger"><?= (isset($error['error']['name'])) ? $error['error']['name'] : '' ?></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_input form-group">
                                    <label for="inputEmail">Email address</label>
                                    <input type="email" class="form-control" id="inputEmail" name="email" value="<?= $infoCompany['email'] ?>">
                                    <span class="text-danger"><?= (isset($error['error']['email'])) ? $error['error']['email'] : '' ?></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_input form-group">
                                    <label for="inputPhone">Phone</label>
                                    <input type="number" class="form-control" name="phone" id="inputPhone" aria-describedby="phoneNumber" value="<?= $infoCompany['phone'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_input form-group">
                                    <label for="inputWebsite">Website</label>
                                    <input type="text" class="form-control" name="website" id="inputWebsite" value="<?= $infoCompany['website'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="my_resume_textarea mt20">
                                    <div class="form-group">
                                        <label for="inputAbout">About Company</label>
                                        <textarea class="form-control" id="inputAbout" rows="9" name="about"><?= $infoCompany['about'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h4 class="fz18 mb20">Contact Information</h4>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_select_box form-group">
                                    <label for="inputCity">City</label><br>
                                    <select class="selectpicker" name="city">
                                        <option value="1" <?= ($infoCompany['city'] == 1) ? 'selected' : '' ?>>Hà Nội</option>
                                        <option value="2" <?= ($infoCompany['city'] == 2) ? 'selected' : '' ?>>Đà Nẵng</option>
                                        <option value="3" <?= ($infoCompany['city'] == 3) ? 'selected' : '' ?>>TP Hồ Chí Minh</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="my_resume_textarea mt20">
                                    <div class="form-group">
                                        <label for="inputAddress">Full Address</label>
                                        <textarea class="form-control" id="inputAddress" rows="3" name="address"><?= $infoCompany['full_address'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="my_profile_input">
                                    <button type="submit" class="btn btn-lg btn-thm" href="#">Save Changes</button>
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