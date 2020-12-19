<?php layout('layout.header'); ?>
<!-- Our Dashbord -->
<section class="our-dashbord dashbord">
	<div class="container">
		<div class="row">
			<?php layout('admin.layouts.menu'); ?>
			<div class="col-sm-12 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="fz20 mb30">List Company</h4>
                    </div>
                    <div class="col-lg-12">
                        <div class="candidate_job_reivew style2">
                            <div class="table-responsive job_review_table mt0">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Deadline</th>
                                            <th scope="col">Salary</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listJob as $job) : ?>
                                            <tr>
                                                <th scope="row"><?= $job['id'] ?></th>
                                                <td><?= $job['title'] ?></td>
                                                <td><?= formatDate($job['deadline']) ?></td>
                                                <td><?= money($job['salary_min']).'-'.money($job['salary_max']) ?></td>
                                                <td><?= $job['full_address'] ?></td>
                                                <td class="text-thm2 delete-job-admin" id-user="<?= $job['id'] ?>"><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><span class="flaticon-rubbish-bin"></span></a></td>
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