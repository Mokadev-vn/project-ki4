<?php layout('layout.header'); ?>
<!-- Our Dashbord -->
<section class="our-dashbord dashbord">
    <div class="container">
        <div class="row">
            <?php layout('user.layout.menu'); ?>
            <div class="col-sm-12 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="fz20 mb30">History</h4>
                    </div>
                    <div class="col-lg-12">
                        <div class="candidate_job_reivew style2">
                            <div class="table-responsive job_review_table mt0">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Package ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Payment Date</th>
                                            <th scope="col">Payment Type</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listHistory as $history) : ?>
                                            <tr>
                                                <th scope="row"><?= $history['id'] ?></th>
                                                <td><?= $history['message'] ?></td>
                                                <td><?= formatDate($history['create_at']) ?></td>
                                                <td>Deduction</td>
                                                <td><?= $history['coin'] ?></td>
                                                <td class="text-thm2">Approved</td>
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