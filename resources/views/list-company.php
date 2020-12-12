<?php layout('layout.header'); ?>
<!-- Our Candidate List -->
<section class="our-faq bgc-fa mt50">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-xl-3 dn-smd">
                <div class="faq_search_widget mb30">
                    <h4 class="fz20 mb15">Search Employer</h4>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="e.g. web design" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-search"></span></button>
                        </div>
                    </div>
                </div>
                <div class="faq_search_widget mb30">
                    <h4 class="fz20 mb15">Location</h4>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="All Location" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-location-pin"></span></button>
                        </div>
                    </div>
                </div>
                <div class="faq_search_widget mb30">
                    <h4 class="fz20 mb15">Type</h4>
                    <div class="candidate_revew_select">
                        <select class="selectpicker w100 show-tick">
                            <option>All Type</option>
                            <option>Full Time</option>
                            <option>Part Time</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-xl-9">
                <div class="row">
                    <div class="col-sm-6 col-lg-6">
                        <div class="candidate_job_alart_btn">
                            <button class="btn btn-thm btns dn db-991 float-right">Show Filter</button>
                            <h4 class="fz20 mt10">20 Employers Found</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6">
                        <div class="candidate_revew_select text-right">
                            <ul>
                                <li class="list-inline-item">Sort by:</li>
                                <li class="list-inline-item">
                                    <select class="selectpicker show-tick">
                                        <option>Newest</option>
                                        <option>Recent</option>
                                        <option>Old Review</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <div class="content_details">
                            <div class="details">
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span>Hide Filter</span><i>×</i></a>
                                <div class="faq_search_widget mb30">
                                    <div class="faq_search_widget mb30">
                                        <h4 class="fz20 mb15">Search Employer</h4>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="e.g. web design" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-search"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq_search_widget mb30">
                                        <h4 class="fz20 mb15">Location</h4>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="All Location" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-location-pin"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq_search_widget mb30">
                                        <h4 class="fz20 mb15">Category</h4>
                                        <div class="candidate_revew_select">
                                            <select class="selectpicker w100 show-tick">
                                                <option>All Categories</option>
                                                <option>Recent</option>
                                                <option>Old Review</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="cl_pricing_slider mb30">
                                        <div class="company_life">
                                            <h4 class="fz20 mb20">Est. Since</h4>
                                            <div class="slider-range"></div>
                                            <input type="text" class="amount" placeholder="1998"> -
                                            <input type="text" class="amount2" placeholder="2018">
                                        </div>
                                    </div>
                                    <div class="cl_skill_checkbox mb30">
                                        <h4 class="fz20 mb20">Team Size</h4>
                                        <div class="content ui_kit_checkbox text-left">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">1-101</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">101-201</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                <label class="custom-control-label" for="customCheck3">201-301</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">301-401</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                <label class="custom-control-label" for="customCheck5">401-501</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                <label class="custom-control-label" for="customCheck6">501-601</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                <label class="custom-control-label" for="customCheck7">601-701</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck8">
                                                <label class="custom-control-label" for="customCheck8">701-801</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck9">
                                                <label class="custom-control-label" for="customCheck9">801-901</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck10">
                                                <label class="custom-control-label" for="customCheck10">901-1001</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck11">
                                                <label class="custom-control-label" for="customCheck11">1001-1101</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck12">
                                                <label class="custom-control-label" for="customCheck12">1101-1201</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck13">
                                                <label class="custom-control-label" for="customCheck13">1201-1301</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($listCompany as $company) : ?>
                        <div class="col-sm-6 col-lg-6 col-xl-4 mt30">
                            <div class="employe_grid text-center">
                                <p><span class="text-thm2"><?= $company['open_job'] ?></span> Open Jobs</p>
                                <div class="thumb">
                                    <img src="<?= APP_CONFIG['static'] ?><?= ($company['avatar']) ? $company['avatar'] : 'images/partners/cs1.jpg' ?>" alt="">
                                </div>
                                <div class="details">
                                    <h4><?= $company['name'] ?></h4>
                                    <p class="text-thm2">Education Training</p>
                                    <p><span class="flaticon-location-pin"></span><?= $company['full_address'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-lg-12">
                        <div class="mbp_pagination">
                            <ul class="page_navigation">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">45</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next <span class="flaticon-right-arrow"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php layout('layout.footer'); ?>