<?php if (!isset($_SESSION['user_id'])) { redirect('login'); } ?>
<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('templates/meta'); ?>
	<title><?php echo $title; ?></title>
</head>
<body>
	<?php $this->load->view('templates/sidebar'); ?>
	<div class="content-wrapper">
		<?php $this->load->view('templates/content-header'); ?>
			<div class="content">