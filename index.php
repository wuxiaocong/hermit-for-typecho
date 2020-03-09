<?php
/**
 * 由吴尼玛仿自hugo的一款主题
 * 
 * @package hermit 
 * @author 吴尼玛
 * @version 1.0
 * @link https://feed.cc/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
	<main class="site-main section-inner thin animated fadeIn faster">
		<h1>Posts<?php $this->pageLink('+','next'); ?></h1>
		<div class="posts-group">
			<ul class="posts-list">
				<?php while($this->next()): ?>
				<li class="post-item">
					<a href="<?php $this->permalink() ?>">
						<span class="post-title"><?php $this->title() ?></span>
						<span class="post-day"><?php $this->date('M d'); ?></span>
					</a>
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
		<h1>Links</h1>
		<div class="links-group">
<?php Links(); ?>
		</div>
	</main>
<?php $this->need('footer.php'); ?>
