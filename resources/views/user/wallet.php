<?php layout('layout.header'); ?>
<!-- Our Dashbord -->
<section class="our-dashbord dashbord">
    <div class="container">
        <div class="row">
            <?php layout('user.layout.menu'); ?>
            <div class="col-sm-12 col-lg-8 col-xl-9">
                <div class="my_profile_form_area employer_profile">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="fz20 mb20">Wallet</h4>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <div class="pricing_table">
                                <div class="pt_header_four">
                                    <div class="pt_tag_four"><span><?= money($info['coin']) ?></span></div>
                                    <h4>Total Money</h4>
                                </div>
                                <div class="pt_details">
                                    <ul>
                                        <li>Deposit coin from Momo </li>
                                        <li>Coin used for payment</li>
                                        <li><a href="#">Support 24/7</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="pricing_table">
                                <div class="pt_header_four">
                                    <h4>Payment By Momo</h4>
                                </div>
                                <div class="pt_details mt25">
                                    <?= ($error && $error['status'] == 'success') ? '<div class="alert alert-success" role="alert">' . $error['message'] . '</div>' : '' ?>
                                    <?= ($error && $error['status'] == 'error' && $error['message'] != '') ? '<div class="alert alert-danger" role="alert">' . $error['message'] . '</div>' : '' ?>
                                    <form action="<?= APP_CONFIG['url'] ?>pay" method="post" onsubmit="return checkCaptcha()">
                                        <?php csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="inputAmount">Enter the amount to deposit:</label>
                                            <input type="number" class="form-control" name="amount" id="inputAmount" placeholder="VNĐ" min="0">
                                            <span class="text-danger"><?= (isset($error['error']['amount'])) ? $error['error']['amount'] : '' ?></span>
                                        </div>
                                        <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="6LeQQAgaAAAAAOkWmXt3T8P_WSJtZsyo9pENRzfR" name="reCaptcha"></div>
                                            <span class="text-danger" id="error-captcha"><?= (isset($error['error']['captcha'])) ? $error['error']['captcha'] : '' ?></span>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="my_profile_input">
                                                <button type="submit" class="btn btn-lg btn-thm">Pay Now</button>
                                            </div>
                                        </div>
                                    </form>
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