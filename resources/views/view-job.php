<?php layout('layout.header'); ?>
<?php
    $role = isset(getSession('user')['role']) ? getSession('user')['role'] : 0;
?>
<!-- Candidate Personal Info Details-->
<section class="bgc-fa pb30 mt70 mbt45">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-8">
                <div class="candidate_personal_info style2">
                    <div class="details">
                        <span class="text-thm2 fwb"><?= ($infoJob['type'] == 1) ? 'Full Time' : 'Part Time' ?></span>
                        <h3><?= $infoJob['title'] ?></h3>
                        <p><span class="flaticon-clock"></span> <?= formatDate($infoJob['create_at']) ?> by <a href="#" class="text-thm2"><?= $infoCompany['name'] ?></a></p>
                        <ul class="address_list">
                            <li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span> <?= ($infoJob['city'] == 1) ? 'Hà Nội' : (($infoJob['city'] == 2) ? 'Đà Nẵng' : 'TP Hồ Chí Minh') ?></a></li>
                            <li class="list-inline-item"><a href="#"><span class="flaticon-price"></span> <?= money($infoJob['salary_min']) ?> - <?= money($infoJob['salary_max']) ?></a></li>
                        </ul>
                    </div>
                    <div class="row job_meta_list mt30">
                        <?php if ($role != 2 && coverDay($infoJob['deadline']) >= 0) : ?>
                            <div class="col-sm-4 col-lg-4"><button class="btn btn-block btn-thm application-job" <?= empty(getSession('user')) ? 'data-toggle="modal" data-target="#exampleModalCenter" ' : 'id-job="'.$infoJob['id'].'"' ?>>Apply Now <span class="flaticon-right-arrow pl10"></span></button></div>
                            <div class="col-sm-4 col-lg-4"><button class="btn btn-block btn-gray" <?= empty(getSession('user')) ? 'data-toggle="modal" data-target="#exampleModalCenter"' : '' ?>><span class="flaticon-favorites fz24 pr10"></span> Shortlist</button></div>
                        <?php endif; ?>
                        <div class="col-sm-4 col-lg-4"><a class="btn prpl40 btn-white" href="https://m.facebook.com/sharer.php?u=<?= APP_CONFIG['url'] . 'job/' . $infoJob['slug']; ?>"><span class="flaticon-share fz24 pr10"></span> Share Job</a></div>
                    </div>
                    <div class="row personer_information_company">
                        <div class="col-sm-4 col-lg-4">
                            <div class="icon text-thm"><span class="flaticon-money"></span></div>
                            <div class="details">
                                <p>Offerd Salary</p>
                                <p><?= money($infoJob['salary_min']) ?> - <?= money($infoJob['salary_max']) ?></p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-4">
                            <div class="icon text-thm"><span class="flaticon-mortarboard"></span></div>
                            <div class="details">
                                <p>Experience</p>
                                <p><?= ($infoJob['experience'] == 0) ? 'Fresher' : $infoJob['experience'] . ' Years' ?></p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-4">
                            <div class="icon text-thm"><span class="flaticon-gender"></span></div>
                            <div class="details">
                                <p>Gender</p>
                                <p><?= ($infoJob['gender'] == 1) ? 'Male' : ($infoJob['gender'] == 2 ? 'Female' : 'Other') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                <div class="candidate_personal_overview style3">
                    <div class="thumb">
                        <img class="img-fluid rounded mx-auto img-thubn w-auto" src="<?= ($infoCompany['avatar']) ? APP_CONFIG['uploads'].$infoCompany['avatar'] : APP_CONFIG['static'].'images/partners/cs1.jpg' ?>" alt="cs1.jpg">
                    </div>
                    <ul class="company_job_list mt30 mb30">
                        <li class="list-inline-item"><a class="mt25" href="#">View all jobs <span class="flaticon-right-arrow pl10"></span></a></li>
                        <li class="list-inline-item"><a class="mt25" href="#">Company Profile <span class="flaticon-right-arrow pl10"></span></a></li>
                    </ul>
                    <p class="mb0"></p>
                    <p class="mb20"><?= $infoCompany['full_address'] ?></p>
                    <p class="mb0"><?= $infoCompany['phone'] ?></p>
                    <p><a href="" class="__cf_email__" data-cfemail=""><?= $infoCompany['email'] ?></a></p>
                </div>
            </div>
        </div>
        <div class="row mt20">
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="candidate_about_info style2 mt10">
                            <h4 class="fz20 mb30">Job Description</h4>
                            <p class="mb30"><?= $infoJob['description'] ?></p>

                            <?php if ($role != 2 && coverDay($infoJob['deadline']) >= 0) : ?>
                                <button class="btn btn-lg btn-thm mb15 application-job" <?= empty(getSession('user')) ? 'data-toggle="modal" data-target="#exampleModalCenter"' : 'id-job="'.$infoJob['id'].'"' ?>>Apply Now <span class="flaticon-right-arrow pl10"></span></button>
                            <?php endif; ?>

                            <a class="btn btn-lg btn-gray float-right" href="https://m.facebook.com/sharer.php?u=<?= APP_CONFIG['url'] . 'job/' . $infoJob['slug']; ?>"><span class="flaticon-share pr10"></span> Share Job</a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="my_resume_eduarea">
                            <h4 class="title mb20">People Also Viewed</h4>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="fj_post style2 one">
                            <div class="details">
                                <h5 class="job_chedule text-thm2">Full Time</h5>
                                <div class="thumb fn-smd">
                                    <img class="img-fluid" src="images/partners/1.jpg" alt="1.jpg">
                                </div>
                                <h4>JEB Product Sales Specialist, Russia & CIS</h4>
                                <p>Posted 23 August by <a class="text-thm2" href="#">Wiggle CRC</a></p>
                                <ul class="featurej_post">
                                    <li class="list-inline-item"><span class="flaticon-location-pin"></span> <a href="#">Bothell, WA, USA</a></li>
                                    <li class="list-inline-item"><span class="flaticon-price pl20"></span> <a href="#">$13.00 - $18.00 per hour</a></li>
                                </ul>
                            </div>
                            <a class="favorit" href="#"><span class="flaticon-favorites"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="fj_post style2 one">
                            <div class="details">
                                <h5 class="job_chedule text-thm2">Part Time</h5>
                                <div class="thumb fn-smd">
                                    <img class="img-fluid" src="images/partners/2.jpg" alt="2.jpg">
                                </div>
                                <h4>General Ledger Accountant</h4>
                                <p>Posted 23 August by <a class="text-thm2" href="#">Robert Half Finance & Accounting</a></p>
                                <ul class="featurej_post">
                                    <li class="list-inline-item"><span class="flaticon-location-pin"></span> <a href="#">RG40, Wokingham</a></li>
                                    <li class="list-inline-item"><span class="flaticon-price pl20"></span> <a href="#">$13.00 - $18.00 per hour</a></li>
                                </ul>
                            </div>
                            <a class="favorit" href="#"><span class="flaticon-favorites"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="fj_post style2 one">
                            <div class="details">
                                <h5 class="job_chedule text-thm2">Full Time</h5>
                                <div class="thumb fn-smd">
                                    <img class="img-fluid" src="images/partners/3.jpg" alt="3.jpg">
                                </div>
                                <h4>Junior Digital Graphic Designer</h4>
                                <p>Posted 23 August by <a class="text-thm2" href="#">Parkside Recruitment - Uxbridge Finance</a></p>
                                <ul class="featurej_post">
                                    <li class="list-inline-item"><span class="flaticon-location-pin"></span> <a href="#">New Denham, UB8 1JG</a></li>
                                    <li class="list-inline-item"><span class="flaticon-price pl20"></span> <a href="#">$13.00 - $18.00 per hour</a></li>
                                </ul>
                            </div>
                            <a class="favorit" href="#"><span class="flaticon-favorites"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="job_info_widget">
                    <ul>
                        <li class="bgc-white"><span class="flaticon-24-hours-support text-thm2"></span> <?= day($infoJob['deadline']) ?></li>
                        <li class="bgc-white"><span class="flaticon-zoom-in text-thm2"></span> <span>35697</span> <span>Displayed</h5>
                        </li>
                        <li class="bgc-white"><span class="flaticon-businessman-paper-of-the-application-for-a-job text-thm2"></span> <span>300-500</span> <span>Application</h5>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php layout('layout.footer'); ?>