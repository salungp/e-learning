<?php $user = $this->db->get_where('users', ['id' => $this->session->userdata('user_id')])->row_array(); ?>
<aside class="sidebar">
	<div class="sidebar-header">
		<a class="sidebar-logo" href="<?php base_url(); ?>">e - Learning</a>
	</div>
	<div class="sidebar-body">
		<ul class="sidebar-list">
			<li>
				<a class="sidebar-link" href="<?php base_url(); ?>">
					<i class="fa fa-dashboard"></i> <span>Beranda</span>
				</a>
			</li>
			<li>
				<a class="sidebar-link" href="#">
					<i class="fa fa-gear"></i> <span>Setting</span>
				</a>
			</li>
			<li>
				<a class="sidebar-link" href="<?php echo base_url('logout'); ?>">
					<i class="fa fa-sign-out"></i> <span>Logout</span>
				</a>
			</li>
		</ul>
	</div>
</aside>