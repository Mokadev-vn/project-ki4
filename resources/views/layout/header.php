<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="candidates, career, employment, freelance, glassdoor, Human Resource Management, indeed, job board, job listing, job portal, job postings, jobs, listings, recruitment, resume">
    <meta name="CreativeLayers" content="ATFN">
    <!-- css file -->
    <link rel="stylesheet" href="<?= APP_CONFIG['static'] ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= APP_CONFIG['static'] ?>css/style.css">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="<?= APP_CONFIG['static'] ?>css/responsive.css">
    <!-- Title -->
    <title>CareerUp - Search Works</title>
    <!-- Favicon -->
    <link href="<?= APP_CONFIG['static'] ?>images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="<?= APP_CONFIG['static'] ?>images/favicon.ico" sizes="128x128" rel="shortcut icon" />

</head>

<body>
    <div class="wrapper">
        <div class="preloader"></div>

        <!-- Main Header Nav -->
        <header class="header-nav menu_style_home_three style_one navbar-scrolltofixed stricky main-menu">
            <div class="container-fluid">
                <!-- Ace Responsive Menu -->
                <nav>
                    <!-- Menu Toggle btn-->
                    <div class="menu-toggle">
                        <img class="nav_logo_img img-fluid" src="<?= APP_CONFIG['static'] ?>images/header-logo3.png" alt="header-logo3.png">
                        <button type="button" id="menu-btn">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <a href="<?= APP_CONFIG['url'] ?>" class="navbar_brand float-left dn-smd">
                        <img class="img-fluid" src="<?= APP_CONFIG['static'] ?>images/header-logo3.png" alt="header-logo3.png">
                    </a>
                    <!-- Responsive Menu Structure-->
                    <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
                    <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
                        <li>
                            <a href="<?= APP_CONFIG['url'] ?>"><span class="title">Home</span></a>
                        </li>
                        <li>
                            <a href=""><span class="title">Works</span></a>
                        </li>
                        <li>
                            <a href=""><span class="title">Employer</span></a>
                        </li>
                        <li>
                            <a href="#"><span class="title">About Us</span></a>
                        </li>
                        <?php if (isset(getSession('user')['role']) && getSession('user')['role'] == 2): ?>
                        <li class="last">
                            <a href="<?= APP_CONFIG['url'] ?>post-job"><span class="title">Post a Job</span></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <?php if (!getSession('user')) : ?>
                        <ul class="sign_up_btn pull-right dn-smd">
                            <li><a href="#" class="btn btn-md btn-transparent" data-toggle="modal" data-target="#exampleModalCenter">Log<span class="dn-md">in</span>/Reg<span class="dn-md">ister</span></a></li>
                        </ul><!-- Button trigger modal -->
                    <?php else : ?>
                        <ul class="header_user_notif pull-right dn-smd">
                            <li class="user_notif">
                                <div class="dropdown">
                                    <a href="page-candidates-job-alert.html" data-toggle="dropdown"><span class="flaticon-alarm color-white fz20"></span><span>8</span></a>
                                    <div class="dropdown-menu">
                                        <div class="so_heading">
                                            <p>Notifications</p>
                                        </div>
                                        <div class="so_content" data-simplebar="init">
                                            <div class="simplebar-wrapper" style="margin: -20px -15px -25px -20px;">
                                                <div class="simplebar-height-auto-observer-wrapper">
                                                    <div class="simplebar-height-auto-observer"></div>
                                                </div>
                                                <div class="simplebar-mask">
                                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                        <div class="simplebar-content" style="padding: 20px 15px 25px 20px; height: auto; overflow: hidden;">
                                                            <ul>
                                                                <li>
                                                                    <h5>Candidate suggestion</h5>
                                                                    <p>You might be interested based on your profile.</p>
                                                                </li>
                                                                <li>
                                                                    <h5>Candidate suggestion</h5>
                                                                    <p>You might be interested based on your profile.</p>
                                                                </li>
                                                                <li>
                                                                    <h5>Candidate suggestion</h5>
                                                                    <p>You might be interested based on your profile.</p>
                                                                </li>
                                                                <li>
                                                                    <h5>Candidate suggestion</h5>
                                                                    <p>You might be interested based on your profile.</p>
                                                                </li>
                                                                <li>
                                                                    <h5>Candidate suggestion</h5>
                                                                    <p>You might be interested based on your profile.</p>
                                                                </li>
                                                                <li>
                                                                    <h5>Candidate suggestion</h5>
                                                                    <p>You might be interested based on your profile.</p>
                                                                </li>
                                                                <li>
                                                                    <h5>Candidate suggestion</h5>
                                                                    <p>You might be interested based on your profile.</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                            </div>
                                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                                <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div>
                                            </div>
                                            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                                <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="user_setting">
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><img class="rounded-circle" src="<?= APP_CONFIG['uploads']. ((getSession('user')['avatar']) ? getSession('user')['avatar'] : 'avatar.png') ?>" alt=""> <span class="pl15 pr15"><?= getSession('user')['fullname'] ?></span></a>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 68px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <div class="user_set_header">
                                            <p>Hi, <?= getSession('user')['fullname'] ?></p>
                                        </div>
                                        <div class="user_setting_content">
                                            <a class="dropdown-item active" href="<?= APP_CONFIG['url'] ?>dashboard"><span class="flaticon-dashboard"></span> Dashboard</a>
                                            <a class="dropdown-item" href="<?= APP_CONFIG['url'] ?>change-password"><span class="flaticon-locked"></span> Change Password</a>
                                            <a class="dropdown-item" href="<?= APP_CONFIG['url'] ?>logout"><span class="flaticon-logout"></span> Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    <?php endif; ?>
                </nav>
                <!-- End of Responsive Menu -->
            </div>
        </header>
        <!-- Modal -->
        <?php if (!getSession('user')) : ?>
            <div class="sign_up_modal modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="login_form">
                                    <form onsubmit="return false;">
                                        <?php csrf_field(); ?>
                                        <div class="heading">
                                            <h3 class="text-center">Quick Login</h3>
                                            <p class="text-center">Don't have an account? <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Sign Up!</a></p>
                                        </div>
                                        <div id="message-login"></div>
                                        <div class="form-group">
                                            <span class="text-danger" id="error-loginEmail"></span>
                                            <input type="email" class="form-control" id="loginEmail" placeholder="Enter email" require>

                                        </div>
                                        <div class="form-group">
                                            <span class="text-danger" id="error-loginPassword"></span>
                                            <input type="password" class="form-control" id="loginPassword" placeholder="Password" require>
                                        </div>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                            <a class="tdu text-thm float-right" href="#">Forgot Password?</a>
                                        </div>
                                        <button class="btn btn-log btn-block btn-thm" id="login">Login</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="sign_up_form">
                                    <div class="heading">
                                        <h3 class="text-center">Create New Account</h3>
                                        <p class="text-center">I have a account? <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Login</a></p>
                                    </div>
                                    <form onsubmit="return false;">
                                        <?php csrf_field(); ?>
                                        <div id="message-register"></div>
                                        <div class="form-group">
                                            <span class="text-danger" id="error-fullname"></span>
                                            <input type="text" class="form-control" id="fullname" placeholder="Full Name">
                                        </div>
                                        <div class="form-group">
                                            <span class="text-danger" id="error-email"></span>
                                            <input type="email" class="form-control" id="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <span class="text-danger" id="error-phone"></span>
                                            <input type="number" class="form-control" id="phone" placeholder="Phone Number">
                                        </div>
                                        <div class="form-group">
                                            <select id="role" class="form-control">
                                                <option value="1">Member</option>
                                                <option value="2">Employer</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <span class="text-danger" id="error-password"></span>
                                            <input type="password" class="form-control" id="password" placeholder="Password">
                                        </div>
                                        <span class="text-danger" id="error-check"></span>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="check">
                                            <label class="form-check-label" for="check">By Registering You Confirm That You Accept <a class="text-thm" href="page-terms-and-policies.html">Terms & Conditions</a> And <a class="text-thm" href="page-terms-and-policies.html">Privacy Policy</a></label>
                                        </div>
                                        <button class="btn btn-log btn-block btn-dark" id="register">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- Main Header Nav For Mobile -->
        <div id="page" class="stylehome1 h0">
            <div class="mobile-menu">
                <div class="header stylehome1 home3">
                    <img class="nav_logo_img img-fluid float-left mt25" src="<?= APP_CONFIG['static'] ?>images/header-logo3.png" alt="header-logo3.png">
                    <a class="bgc-darkblue" href="#menu"><span></span></a>
                </div>
            </div><!-- /.mobile-menu -->
            <nav id="menu" class="stylehome1">
                <ul>
                    <li><span>Home</span>
                        <ul>
                            <li><a href="index.html">Home One</a></li>
                            <li><a href="index2.html">Home Two</a></li>
                            <li><a href="index3.html">Home Three</a></li>
                            <li><a href="index4.html">Home Four</a></li>
                            <li><a href="index5.html">Home Five</a></li>
                            <li><a href="index6.html">Home Six</a></li>
                        </ul>
                    </li>
                    <li><span>Find A Job</span>
                        <ul>
                            <li><span>Job List</span>
                                <ul>
                                    <li><a href="page-job-list-v1.html">List V1</a></li>
                                    <li><a href="page-job-list-v2.html">List V2</a></li>
                                    <li><a href="page-job-list-v3.html">List V3</a></li>
                                    <li><a href="page-job-list-v4.html">List V4</a></li>
                                    <li><a href="page-job-list-v5.html">List V5</a></li>
                                </ul>
                            </li>
                            <li><span>Job Single</span>
                                <ul>
                                    <li><a href="page-job-single-v1.html">Single V1</a></li>
                                    <li><a href="page-job-single-v2.html">Single V2</a></li>
                                    <li><a href="page-job-single-v3.html">Single V3</a></li>
                                    <li><a href="page-job-single-v4.html">Single V4</a></li>
                                    <li><a href="page-job-single-v5.html">Single V5</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><span>Employer</span>
                        <ul>
                            <li><span>Employer List</span>
                                <ul>
                                    <li><a href="page-employer-list-v1.html">List V1</a></li>
                                    <li><a href="page-employer-list-v2.html">List V2</a></li>
                                    <li><a href="page-employer-list-v3.html">List V3</a></li>
                                </ul>
                            </li>
                            <li><span>Employer Single</span>
                                <ul>
                                    <li><a href="page-employer-single-v1.html">Single V1</a></li>
                                    <li><a href="page-employer-single-v2.html">Single V2</a></li>
                                    <li><a href="page-employer-single-v3.html">Single V3</a></li>
                                </ul>
                            </li>
                            <li><span>Employer Admin</span>
                                <ul>
                                    <li><a href="page-employer-dashboard.html">Dashboard</a></li>
                                    <li><a href="page-employer-profile.html">Profile</a></li>
                                    <li><a href="page-employer-post-job.html">Post Job</a></li>
                                    <li><a href="page-employer-manage-job.html">Manage Job</a></li>
                                    <li><a href="page-employer-resume.html">Resume</a></li>
                                    <li><a href="page-employer-packages.html">Packages</a></li>
                                    <li><a href="page-employer-transactions.html">Transactions</a></li>
                                    <li><a href="page-employer-change-password.html">Change Password</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><span>Candidates</span>
                        <ul>
                            <li><span>Candidates List</span>
                                <ul>
                                    <li><a href="page-candidates-list-v1.html">List V1</a></li>
                                    <li><a href="page-candidates-list-v2.html">List V2</a></li>
                                    <li><a href="page-candidates-list-v3.html">List V3</a></li>
                                </ul>
                            </li>
                            <li><span>Candidates Single</span>
                                <ul>
                                    <li><a href="page-candidates-single-v1.html">Single v1</a></li>
                                    <li><a href="page-candidates-single-v2.html">Single v2</a></li>
                                    <li><a href="page-candidates-single-v3.html">Single v3</a></li>
                                </ul>
                            </li>
                            <li><span>Candidates Admin</span>
                                <ul>
                                    <li><a href="page-candidates-dashboard.html">Dashboard</a></li>
                                    <li><a href="page-candidates-profile.html">Profile</a></li>
                                    <li><a href="page-candidates-my-resume.html">My Resume</a></li>
                                    <li><a href="page-candidates-applied-jobs.html">Applied Jobs</a></li>
                                    <li><a href="page-candidates-cv-manager.html">Cv Manager</a></li>
                                    <li><a href="page-candidates-favourite-jobs.html">Favourite Jobs</a></li>
                                    <li><a href="page-candidates-message.html">Message</a></li>
                                    <li><a href="page-candidates-review.html">Review</a></li>
                                    <li><a href="page-candidates-job-alert.html">Job Alert</a></li>
                                    <li><a href="page-candidates-change-password.html">Change Password</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li><span>Pages</span>
                        <ul>
                            <li><a href="page-about.html">About</a></li>
                            <li><span>Blog</span>
                                <ul>
                                    <li><a href="page-blog-v1.html">Page Blog v1</a></li>
                                    <li><a href="page-blog-grid.html">Blog Grid</a></li>
                                    <li><a href="page-blog-list.html">Blog List</a></li>
                                    <li><a href="page-blog-single.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="page-contact.html">Contact Us</a></li>
                            <li><a href="page-error.html">404</a></li>
                            <li><a href="page-faq.html">Faq</a></li>
                            <li><a href="page-how-it-works.html">How It Works</a></li>
                            <li><a href="page-invoice.html">Invoice</a></li>
                            <li><a href="page-log-reg.html">Login/Register</a></li>
                            <li><a href="page-pricing.html">Pricing</a></li>
                            <li><a href="page-terms-and-policies.html">Terms And Policies</a></li>
                            <li><a href="page-ui-element.html">UI Elements</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Post a Job</a></li>
                    <li><a class="text-thm" href="page-log-reg.html">Login/Register</a></li>
                </ul>
            </nav>
        </div>
        <!-- Home Design -->