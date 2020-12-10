<?php layout('layout.header'); ?>
<!-- Our Dashbord -->
<section class="our-dashbord dashbord">
    <div class="container">
        <div class="row">
            <?php layout('user.layout.menu'); ?>
            <div class="col-sm-12 col-lg-8 col-xl-9">
                <div class="my_profile_form_area">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="fz20 mb20">Post a New Job</h4>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="icon_boxs">
                                <div class="icon"><span class="flaticon-work"></span></div>
                                <div class="details">
                                    <h4>2 Job Posted</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="icon_boxs">
                                <div class="icon style2"><span class="flaticon-resume"></span></div>
                                <div class="details">
                                    <h4>3 Applications</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="icon_boxs">
                                <div class="icon style3"><span class="flaticon-work"></span></div>
                                <div class="details">
                                    <h4>1 Active Jobs</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt30">
                            <div class="my_profile_thumb_edit"></div>
                        </div>
                        <div class="col-lg-12">
                            <div class="my_profile_input form-group">
                                <label for="inputJobTitle">Job Title</label>
                                <input type="text" class="form-control" id="inputJobTitle" placeholder="UX/UI Desginer">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="my_resume_textarea">
                                <div class="form-group">
                                    <label for="inputDes">Job Description</label>
                                    <textarea class="form-control" id="inputDes" rows="9">
									    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <div class="my_profile_input form-group">
                                <label for="formGroupExampleInputDate">Application Deadline Date</label>
                                <input type="date" class="form-control" id="formGroupExampleInputDate" placeholder="22/05/2010">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="my_profile_select_box form-group">
                                <label for="formGroupExampleInput1">Job Type</label><br>
                                <select class="selectpicker">
                                    <option>Basic</option>
                                    <option>Standard</option>
                                    <option>Advance</option>
                                    <option>Expert</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="my_profile_select_box form-group">
                                <label for="formGroupExampleInput1">Specialisms</label><br>
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
                                <label for="exampleFormControlInput3">Offerd Salary</label><br>
                                <select class="selectpicker">
                                    <option>25-30 K</option>
                                    <option>25-35 K</option>
                                    <option>25-40 K</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="my_profile_select_box form-group">
                                <label for="exampleFormControlInput4">Career Level</label><br>
                                <select class="selectpicker">
                                    <option>45-85 K</option>
                                    <option>45-85 K</option>
                                    <option>45-85 K</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="my_profile_select_box form-group">
                                <label for="formGroupExampleInput1">Experience</label><br>
                                <select class="selectpicker">
                                    <option>1Year to 2Year</option>
                                    <option>2Year to 3Year</option>
                                    <option>3Year to 4Year</option>
                                    <option>4Year to 5Year</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="my_profile_select_box form-group">
                                <label for="formGroupExampleInput1">Gender</label><br>
                                <select class="selectpicker">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="my_profile_select_box form-group">
                                <label for="formGroupExampleInput1">Industry</label><br>
                                <select class="selectpicker">
                                    <option>Industry1</option>
                                    <option>Industry2</option>
                                    <option>Industry3</option>
                                    <option>Industry4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="my_profile_select_box form-group">
                                <label for="formGroupExampleInput1">Qualification</label><br>
                                <select class="selectpicker">
                                    <option>Qualification1</option>
                                    <option>Qualification2</option>
                                    <option>Qualification3</option>
                                    <option>Qualification4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h4 class="fz18 mb20">Address / Location</h4>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="my_profile_select_box form-group">
                                <label for="exampleFormControlInput9">Country</label><br>
                                <select class="selectpicker">
                                    <option>United Kingdom</option>
                                    <option>United State</option>
                                    <option>Ukraine</option>
                                    <option>Uruguay</option>
                                    <option>UK</option>
                                    <option>Uzbekistan</option>
                                    <option>Uganda</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="my_profile_select_box form-group">
                                <label for="exampleFormControlInput9">City</label><br>
                                <select class="selectpicker">
                                    <option>London</option>
                                    <option>Manchester</option>
                                    <option>Birmingham</option>
                                    <option>Liverpool England</option>
                                    <option>Bristol</option>
                                    <option>City of London</option>
                                    <option>Leeds</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="my_resume_textarea">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea2">Full Address</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="3">London, United Kingdom</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="my_profile_input">
                                <a class="btn btn-lg btn-thm" href="#">Save Changes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<?php layout('layout.footer'); ?>