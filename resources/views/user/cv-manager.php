<?php layout('layout.header'); ?>
<!-- Our Dashbord -->
<section class="our-dashbord dashbord">
    <div class="container">
        <div class="row">
            <?php layout('user.layout.menu'); ?>
            <div class="col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="mb30">CV Manager</h4>
                    </div>
                    <div class="col-lg-12 mb30">
                        <div class="candidate_job_reivew cv_manager">
                            <div class="table-responsive job_review_table">
                                <table class="table">
                                    <tbody>
                                        <?php foreach ($listCv as $cv) : ?>
                                            <tr class="mb30">
                                                <th scope="row">
                                                    <ul>
                                                        <li class="list-inline-item"><a href="<?= APP_CONFIG['uploads'].$cv['file'] ?>"><span class="flaticon-doc font"></span></a></li>
                                                        <li class="list-inline-item cv_sbtitle"><a href="#"><?= $cv['name'] ?></a></li>
                                                    </ul>
                                                </th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <ul class="view_edit_delete_list">
                                                        <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-8">
                        <div class="candidate_resume_uploader">
                            <p class="form_title">Curriculum Vitae</p>
                            <form class="form-inline" method="post" enctype="multipart/form-data">
                                <?php csrf_field(); ?>
                                <input class="upload-path" name="name" placeholder="Name CV" />
                                <label class="upload">
                                    <input type="file" name="file" accept=".doc,.docx,.pdf" />
                                    <p><span class="flaticon-download"></span> Select CV</p>
                                </label>
                                <button type="submit" class="btn btn-lg btn-primary ml20">Upload</button>
                            </form>
                            <small class="form-text text-muted">Suitable files are .doc,.docx,.pdf.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php layout('layout.footer'); ?>