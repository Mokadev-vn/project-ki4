<?php layout('layout.header'); ?>
<!-- Our Dashbord -->
<section class="our-dashbord dashbord">
    <div class="container">
        <div class="row">
            <?php layout('user.layout.menu'); ?>
            <div class="col-sm-12 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="fz20">Shortlisted Resumes</h4>
                    </div>
                    <?php foreach ($listResumes as $info) : ?>
                    <div class="col-lg-12">
                        <div class="candidate_list_view style2">
                            <div class="thumb">
                                <img class="img-fluid rounded-circle" width="120px" src="<?= APP_CONFIG['uploads'] ?><?= ($info['avatar']) ? $info['avatar'] : 'avatar.png' ?>" alt="c2.jpg">
                                <div class="cpi_av_rating"><span>4.5</span></div>
                            </div>
                            <div class="content">
                                <h4 class="title"><?= $info['name'] ?> <small class="verified text-thm2 pl10"><i class="fa fa-check-circle"></i></small></h4>
                                <p>Development Manager at <span class="text-thm2">Wiggle CRC</span></p>
                                <ul class="review_list">
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                                </ul>
                                <ul class="address_list">
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span> <?= $info['address'] ?></a></li>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-price"></span> $13.00 - $18.00 per hour</a></li>
                                </ul>
                            </div>
                            <ul class="view_edit_delete_list mt25 float-right fn-xl">
                                <li class="list-inline-item"><a href="<?= APP_CONFIG['uploads'].$info['file'] ?>" data-toggle="tooltip" data-placement="top" title="Download CV"><span class="flaticon-resume"></span> Download CV</a></li>
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