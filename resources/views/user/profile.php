<?php layout('layout.header'); ?>
<!-- Our Dashbord -->
<section class="our-dashbord dashbord">
    <div class="container">
        <div class="row">
            <?php layout('user.layout.menu'); ?>
            <div class="col-sm-12 col-lg-8 col-xl-9">
                <div class="my_profile_form_area employer_profile">
                    <form action="<?= APP_CONFIG['url'] ?>user-profile" method="post" enctype="multipart/form-data">
                        <?php csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="fz20 mb20">My Profile</h4>
                            </div>
                            <div class="col-lg-12">
                                <div class="avatar-upload mb30">
                                    <div class="avatar-edit">
                                        <input class="btn btn-thm" type="file" name="avatar" id="imageUpload" accept=".png, .jpg, .jpeg">
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview"><img src="<?= ($infoUser['avatar']) ? APP_CONFIG['uploads'].$infoUser['avatar'] : APP_CONFIG['uploads'].'avatar.png' ?>" alt="" width="150px" height="130px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="my_profile_thumb_edit"></div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_input form-group">
                                    <label for="inputFullName">Full Name</label>
                                    <input type="text" class="form-control" name="fullname" id="inputFullName" value="<?= $infoUser['fullname'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_input form-group">
                                    <label for="inputUsername">Username</label>
                                    <input type="text" class="form-control" id="inputUsername" value="" disabled>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_input form-group">
                                    <label for="inputPhone">Phone</label>
                                    <input type="number" class="form-control" name="phone" id="inputPhone" aria-describedby="phoneNumber" value="<?= $infoUser['phone'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_input form-group">
                                    <label for="inputEmail">Email address</label>
                                    <input type="email" class="form-control" name="email" id="inputEmail" value="<?= $infoUser['email'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="my_resume_textarea mt20">
                                    <div class="form-group">
                                        <label for="inputDes">Description</label>
                                        <textarea class="form-control" name="description" id="inputDes" rows="9"><?= $infoUser['description'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h4 class="fz18 mb20">Social Network</h4>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_input form-group">
                                    <label for="inputFacebook">Facebook</label>
                                    <input type="text" class="form-control" name="facebook" id="inputFacebook" value="<?= $infoUser['facebook'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_input form-group">
                                    <label for="inputTwitter">Twitter</label>
                                    <input type="text" class="form-control" name="twitter" id="inputTwitter" value="<?= $infoUser['twitter'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_input form-group">
                                    <label for="inputLinkedin">Linkedin</label>
                                    <input type="text" class="form-control" name="linkedin" id="inputLinkedin" value="<?= $infoUser['linkedin'] ?>">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="my_resume_textarea mt20">
                                    <div class="form-group">
                                        <label for="inputAddress">Full Address</label>
                                        <textarea class="form-control" name="address" id="inputAddress" rows="3"><?= $infoUser['address'] ?></textarea>
                                    </div>
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