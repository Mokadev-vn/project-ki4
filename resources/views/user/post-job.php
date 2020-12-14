<?php layout('layout.header'); ?>
<!-- Our Dashbord -->
<section class="our-dashbord dashbord">
    <div class="container">
        <div class="row">
            <?php layout('user.layout.menu'); ?>
            <div class="col-sm-12 col-lg-8 col-xl-9">
                <div class="my_profile_form_area">
                    <?= ($error && $error['status'] == 'success') ? '<div class="alert alert-success" role="alert">' . $error['message'] . '</div>' : '' ?>
                    <form action="<?= APP_CONFIG['url'] ?>new-job" method="post" enctype="multipart/form-data">
                        <?php csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="mb30">Manage Jobs</h4>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <div class="icon_boxs">
                                    <div class="icon"><span class="flaticon-work"></span></div>
                                    <div class="details">
                                        <h4><?= $headJob['total_job'] ?> Job Posted</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <div class="icon_boxs">
                                    <div class="icon style2"><span class="flaticon-resume"></span></div>
                                    <div class="details">
                                        <h4><?= $headJob['total_app'] ?> Applications</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <div class="icon_boxs">
                                    <div class="icon style3"><span class="flaticon-work"></span></div>
                                    <div class="details">
                                        <h4><?= $headJob['total_active'] ?> Active Jobs</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt30">
                                <div class="my_profile_thumb_edit"></div>
                            </div>
                            <div class="col-lg-12">
                                <div class="my_profile_input form-group">
                                    <label for="inputJobTitle">Job Title</label>
                                    <input type="text" class="form-control" name="title" id="inputJobTitle" placeholder="UX/UI Desginer" required>
                                    <span class="text-danger"><?= (isset($error['error']['title'])) ? $error['error']['tile'] : '' ?></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="my_resume_textarea">
                                    <div class="form-group">
                                        <label for="inputDes">Job Description</label>
                                        <textarea class="form-control" name="description" id="inputDes" rows="9"></textarea>
                                        <span class="text-danger"><?= (isset($error['error']['description'])) ? $error['error']['description'] : '' ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="my_profile_input form-group">
                                    <label for="inputDeadline">Application Deadline Date</label>
                                    <input type="date" class="form-control" name="deadline" id="inputDeadline">
                                    <span class="text-danger"><?= (isset($error['error']['deadline'])) ? $error['error']['deadline'] : '' ?></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_select_box form-group">
                                    <label for="inputType">Job Type</label><br>
                                    <select class="selectpicker" name="type">
                                        <option value="1">Full Time</option>
                                        <option value="2">Part Time</option>
                                    </select>
                                    <span class="text-danger"><?= (isset($error['error']['type'])) ? $error['error']['type'] : '' ?></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_select_box form-group">
                                    <label for="formGroupExampleInput1">Skills</label><br>
                                    <select class="selectpicker" multiple data-actions-box="true">
                                        <option>Basic</option>
                                        <option>Standard</option>
                                        <option>Advance</option>
                                        <option>Expert</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_select_box form-group">
                                    <label for="inputSalaryMin">Salary Min</label>
                                    <input type="number" class="form-control" name="salaryMin" id="inputSalaryMin" placeholder="100000" min="0">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_select_box form-group">
                                    <label for="inputSalaryMax">Salary Max</label>
                                    <input type="number" class="form-control" name="salaryMax" id="inputSalaryMax" placeholder="100000000" min="0">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_select_box form-group">
                                    <label for="inputExperience">Experience Level</label><br>
                                    <select class="selectpicker" name="experience">
                                        <option value="0"> Fresh graduate </option>
                                        <option value="1"> 1 year </option>
                                        <option value="2"> 2 years </option>
                                        <option value="3"> 3 years </option>
                                        <option value="4"> 4 years </option>
                                        <option value="5"> 5 years </option>
                                        <option value="6"> 6 years </option>
                                        <option value="7"> 7 years </option>
                                        <option value="8"> 8 years </option>
                                        <option value="9"> 9 years </option>
                                        <option value="10"> Over 10 years </option>
                                    </select>
                                </div>
                                <span class="text-danger"><?= (isset($error['error']['exp'])) ? $error['error']['exp'] : '' ?></span>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_select_box form-group">
                                    <label for="inputGender">Gender</label><br>
                                    <select class="selectpicker" name="gender">
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h4 class="fz18 mb20">Address / Location</h4>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="my_profile_select_box form-group">
                                    <label for="inputCity">City</label><br>
                                    <select class="selectpicker" name="city">
                                        <option value="1">Hà Nội</option>
                                        <option value="2">Đà Nẵng</option>
                                        <option value="3">Thành Phố Hồ Chí Minh</option>
                                    </select>
                                    <span class="text-danger"><?= (isset($error['error']['city'])) ? $error['error']['city'] : '' ?></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="my_resume_textarea">
                                    <div class="form-group">
                                        <label for="inputAddress">Full Address</label>
                                        <textarea class="form-control" id="inputAddress" rows="3" name="address"></textarea>
                                        <span class="text-danger"><?= (isset($error['error']['address'])) ? $error['error']['address'] : '' ?></span>
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