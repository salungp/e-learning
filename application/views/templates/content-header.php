<?php $user = $this->db->get_where('users', ['id' => $this->session->userdata('user_id')])->row_array(); ?>
<header>
	<button type="button" id="openSidebar">
		<i class="fa fa-bars"></i>
	</button>
	<!-- search bar -->
	<div class="search-bar">
		<form action="<?php echo base_url('cari'); ?>" method="GET">
			<div class="input-group">
				<input type="search" name="key" placeholder="Cari video, file..." autocomplete="off" required="">
				<button type="submit" class="input-btn">
					<i class="fa fa-search"></i>
				</button>
			</div>
		</form>
	</div>
	<!-- end search bar -->
	<!-- nav right -->
	<div class="nav-right">
		<div class="profile-dropdown">
			<a href="" id="openProfile" class="nav-item">
				<img src="<?php echo base_url('asset/img/default.jpg'); ?>">
			</a>
			<div class="profile-dropdown-item">
				<h1><?php echo $user['name']; ?></h1>
				<a href="#" class="profile-btn">Profile</a>
				<a href="<?php echo base_url('logout'); ?>" class="profile-btn">Logout</a>
			</div>
		</div>
		<div class="profile-dropdown">
			<a href="" id="openProfile" class="nav-item">
				<?php $this->db->order_by('id', 'desc'); ?>
				<?php $notif = $this->db->get_where('notifications', ['to' => $this->session->userdata('user_id')])->result_array(); ?>
				<span class="notif-info"><?php echo count($notif); ?></span>
				<i class="fa fa-bell"></i>
			</a>
			<div class="profile-dropdown-notif">
				<?php foreach ($notif as $q) : ?>
					<a href="<?php echo base_url(); ?>"><?php echo $q['text']; ?></a>
				<?php endforeach; ?>
				<a href="<?php echo base_url('clear_notif'); ?>" style="width: 100%;display: block;background-color: #2196F3;color: #fff;text-align: center;">Bersihkan semua</a>
			</div>
		</div>
	</div>
	<!-- end nav right -->
</header>