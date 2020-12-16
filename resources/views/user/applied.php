<?php layout('layout.header'); ?>
<!-- Our Dashbord -->
<section class="our-dashbord dashbord">
    <div class="container">
        <div class="row">
            <?php layout('user.layout.menu'); ?>
            <div class="col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="fz18 mb30">Applied Jobs</h4>
                    </div>
                </div>
                <div class="row applyed_job">
                    <?php foreach ($listApp as $app) : ?>
                        <div class="col-sm-12 col-lg-12">
                            <div class="fj_post">
                                <div class="details">
                                    <h5 class="job_chedule text-thm mt0"><?= ($app['type'] == 1) ? 'Full Time' : 'Part Time' ?></h5>
                                    <div class="thumb fn-smd">
                                        <img class="img-fluid img-thubn" src="<?= ($app['avatar']) ? APP_CONFIG['uploads'].$app['avatar'] : APP_CONFIG['static'].'images/partners/cs1.jpg' ?>" alt="1.jpg">
                                    </div>
                                    <h4><?= $app['title'] ?></h4>
                                    <p><span class="flaticon-clock"></span> <?= formatDate($app['create_at']) ?> by <a class="text-thm" href="#"><?= $app['company_name'] ?></a></p>
                                    <ul class="featurej_post">
                                        <li class="list-inline-item"><span class="flaticon-location-pin"></span> <a href="#"><?= ($app['city'] == 1) ? 'Hà Nội' : (($app['city'] == 2) ? 'Đà Nẵng' : 'TP Hồ Chí Minh') ?></a></li>
                                        <li class="list-inline-item"><span class="flaticon-price pl20"></span> <a href="#"><?= money($app['salary_min']) ?> - <?= money($app['salary_max']) ?></a></li>
                                    </ul>
                                </div>
                                <ul class="view_edit_delete_list float-right">
                                    <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php layout('layout.footer'); ?>