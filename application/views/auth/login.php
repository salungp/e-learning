<?php $this->load->view('templates/auth-header', ['title' => 'e-learning | login']); ?>
<h1 class="auth-title">Sign in</h1>
<p class="auth-description">Sign in to start your session.</p>
<?php echo $this->session->flashdata('status'); ?>
<form action="<?php echo base_url('auth/login'); ?>" method="POST">
	<input type="text" name="email" placeholder="Email" class="form-input">
	<?php echo form_error('email', '<small class="text-danger mb-3">', '</small>'); ?>
	<input type="password" name="password" placeholder="Password" class="form-input">
	<?php echo form_error('password', '<small class="text-danger mb-3">', '</small>'); ?>
	<button type="submit" class="btn btn-primary w-100 mb-3">Sign in</button>
	<p>Do you not have any account <a href="<?php echo base_url('register'); ?>">Sign up</a></p>
</form>
<?php $this->load->view('templates/auth-footer'); ?>