<?php layout('layout.header'); ?>
<!-- Our Dashbord -->
<section class="our-dashbord dashbord">
    <div class="container">
        <div class="row">
            <?php layout('user.layout.menu'); ?>
            <div class="col-sm-12 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="mb30">Manage Jobs</h4>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="icon_boxs">
                            <div class="icon"><span class="flaticon-work"></span></div>
                            <div class="details">
                                <h4><?= $headJob['job_total'] ?> Job Posted</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="icon_boxs">
                            <div class="icon style2"><span class="flaticon-resume"></span></div>
                            <div class="details">
                                <h4><?= $apply['total'] ?> Applications</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="icon_boxs">
                            <div class="icon style3"><span class="flaticon-work"></span></div>
                            <div class="details">
                                <h4><?= $headJob['active_total'] ?> Active Jobs</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="candidate_revew_search_box mt30">
                            <form class="form-inline my-2 my-lg-0"> <input class="form-control mr-sm-2" type="search" placeholder="Serach" aria-label="Search"> <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-search"></span></button> </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="candidate_revew_select text-right mt30">
                            <ul>
                                <li class="list-inline-item">Sort by:</li>
                                <li class="list-inline-item"> <select class="selectpicker show-tick">
                                        <option>Newest</option>
                                        <option>Recent</option>
                                        <option>Old Review</option>
                                    </select> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="cnddte_fvrt_job candidate_job_reivew style2">
                            <div class="table-responsive job_review_table">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Job Title</th>
                                            <th scope="col">Applications</th>
                                            <th scope="col">Status</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listJob as $job) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <h4><?= $job['title'] ?></h4>
                                                    <p><span class="flaticon-location-pin"></span> <?= $job['full_address'] ?></p>
                                                    <ul>
                                                        <li class="list-inline-item"><a href="#"><span class="flaticon-event"> Created: </span></a></li>
                                                        <li class="list-inline-item"><a class="color-black22" href="#"><?= formatDate($job['create_at']) ?></a></li>
                                                        <li class="list-inline-item"><a href="#"><span class="flaticon-event"> Expiry: </span></a></li>
                                                        <li class="list-inline-item"><a class="color-black22" href="#"><?= formatDate($job['deadline']) ?></a></li>
                                                    </ul>
                                                </th>
                                                <td><span class="color-black22"><?= $job['total'] ?></span> Application(s)</td>
                                                <?= ($job['active'] == 1) ? '<td class="text-thm2">Active</td>' : '<td class="color-red">Inactive</td>' ?>
                                                <td>
                                                    <ul class="view_edit_delete_list">
                                                        <li class="list-inline-item"><a href="<?= APP_CONFIG['url'].'job/'.$job['slug'] ?>" data-toggle="tooltip" data-placement="bottom" title="View"><span class="flaticon-eye"></span></a></li>
                                                        <li class="list-inline-item"><a href="<?= APP_CONFIG['url'].'manage-jobs/'.$job['slug'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit"><span class="flaticon-edit"></span></a></li>
                                                        <li class="list-inline-item delete-job" id-job="<?= $job['id']; ?>"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php layout('layout.footer'); ?>