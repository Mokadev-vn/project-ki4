<div class="col-sm-12 col-lg-4 col-xl-3 dn-smd">
	<div class="dashbord_nav_list">
		<ul>
			<li><a href="<?= APP_CONFIG['url'] ?>dashboard"><span class="flaticon-dashboard"></span> Dashboard</a></li>
			<?php if (getSession('user')['role'] == 1) : ?>
				<li><a href="<?= APP_CONFIG['url'] ?>user-profile"><span class="flaticon-profile"></span> Profile</a></li>
				<li><a href="<?= APP_CONFIG['url'] ?>applied-jobs"><span class="flaticon-paper-plane"></span> Applied Jobs</a></li>
				<li><a href="<?= APP_CONFIG['url'] ?>cv-manager"><span class="flaticon-analysis"></span> CV Manager</a></li>
			
			<?php elseif (getSession('user')['role'] == 2) : ?>

				<li><a href="<?= APP_CONFIG['url'] ?>company-profile"><span class="flaticon-profile"></span> Company Profile</a></li>
				<li><a href="<?= APP_CONFIG['url'] ?>new-job"><span class="flaticon-resume"></span> Post a New Job</a></li>
				<li><a href="<?= APP_CONFIG['url'] ?>manage-jobs"><span class="flaticon-paper-plane"></span> Manage Jobs</a></li>
				<li><a href="<?= APP_CONFIG['url'] ?>list-resumes"><span class="flaticon-analysis"></span> Shortlisted Resumes</a></li>
				<li><a href="<?= APP_CONFIG['url'] ?>history"><span class="flaticon-clock"></span> History</a></li>
				<li><a href="<?= APP_CONFIG['url'] ?>wallet"><span class="flaticon-wallet"></span> Wallet</a></li>
				
				
			<?php endif; ?>
			<li><a href="<?= APP_CONFIG['url'] ?>change-password"><span class="flaticon-locked"></span> Change Password</a></li>
			<li><a href="<?= APP_CONFIG['url'] ?>logout"><span class="flaticon-logout"></span> Logout</a></li>
		</ul>
	</div>

</div>