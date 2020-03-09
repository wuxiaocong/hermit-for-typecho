<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
	<main class="site-main section-inner thin animated fadeIn faster">
		<h1><?php $this->title() ?></h1>
		<div class="content">
			<?php parseContent($this); ?>
		</div>
		<?php $this->need('comments.php'); ?>
	</main>
<?php $this->need('footer.php'); ?>
