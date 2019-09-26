<?php $this->load->view('templates/header', ['title' => 'E-Learning | home']); ?>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<div class="row">
	<div class="col-md-7">

		<div class="form-post mb-3">
			<button class="form-post-title" type="button">Add new post <span class="plus-btn">+</span></button>

			<form action="<?php echo base_url('upload'); ?>" id="form" method="POST" enctype="multipart/form-data" <?php if (form_error('text', '<small class="text-danger">', '</small>') != null || @$error != null) { echo 'style="display: block;"'; }  ?>>

				<label for="text">Text postingan</label>
				<textarea id="text" name="text" class="form-input"><?php echo set_value('text'); ?></textarea>
				<?php echo form_error('text', '<small class="text-danger">', '</small>'); ?>
				<label for="video">Video . optional</label>
				<input type="file" name="video" id="video" class="form-input">
				<?php echo '<small class="text-danger">'.@$error.'</small>'; ?>
				<button class="btn btn-success">Posting</button>

			</form>

		</div>
		<?php $this->db->order_by('id', 'desc'); ?>
		<?php $data = $this->db->get('materi')->result_array(); ?>

		<section class="post-wrapper">

		<?php foreach ($data as $key) : ?>

			<?php $userProfile = $this->db->get_where('users', ['id' => $key['user_id']])->row_array(); ?>

			<div class="post">
				<div class="post-header">
					<div class="post-dropdown">
						<button type="button" class="post-dropdown-btn"><i class="fa fa-ellipsis-v"></i></button>
						<div class="post-dropdown-item">
							<button type="button" data-link="<?php echo base_url(); ?>" id="copyBtn">Salin link</button>
							<a href="">Tanggapi postingan</a>
						</div>
					</div>
					<img src="<?php echo base_url('asset/img/default.jpg'); ?>">
					<div class="text">
						<p class="post-profile-name"><?php echo $userProfile['name']; ?></p>
						<p class="post-date"><?php echo date('D M Y', strtotime($key['created_at'])); ?></p>
					</div>
				</div>
				<div class="post-body">
					<p><?php echo $key['text']; ?></p>
					<?php if ($key['file_type'] == 'empty') : ?>
					<?php else : ?>
						<video controls="" class="post-video">
							<source src="<?php echo base_url('asset/user/video/'.$key['file']); ?>" type="video/mp4">
						</video>
					<?php endif; ?>
				</div>
			</div>

		<?php endforeach; ?>

		</section>

	</div>
	<div class="col-md-5">
		
	</div>
</div>
<?php $this->load->view('templates/footer'); ?>