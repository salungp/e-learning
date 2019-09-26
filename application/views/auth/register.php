<?php $this->load->view('templates/auth-header', ['title' => 'e-learning | login']); ?>
<h1 class="auth-title">Sign up</h1>
<p class="auth-description">Create your account.</p>
<?php echo $this->session->flashdata('status'); ?>
<form action="<?php echo base_url('auth/register'); ?>" method="POST">
	<input type="text" id="name" name="name" class="form-input" placeholder="Name">
	<?php echo form_error('name', '<small class="text-danger mb-3">', '</small>'); ?>
	<input type="text" id="email" name="email" class="form-input" placeholder="Email">
	<?php echo form_error('email', '<small class="text-danger mb-3">', '</small>'); ?>
	<input type="password" id="password" name="password" class="form-input" placeholder="Password">
	<?php echo form_error('password', '<small class="text-danger mb-3">', '</small>'); ?>
	<button type="submit" class="btn btn-primary w-100 mb-3">Sign up</button>
	<p>Have any account? <a href="<?php echo base_url('login'); ?>">Sign in</a></p>
</form>
<?php $this->load->view('templates/auth-footer'); ?>