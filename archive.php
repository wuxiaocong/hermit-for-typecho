<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
	<main class="site-main section-inner thin animated fadeIn faster">
		<h1><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?><?php $this->pageLink('+','next'); ?></h1>
		<div class="posts-group">
			<ul class="posts-list">
        <?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
				<li class="post-item">
					<a href="<?php $this->permalink() ?>">
						<span class="post-title"><?php $this->title() ?></span>
						<span class="post-day"><?php $this->date('M d'); ?></span>
					</a>
				</li>
				<?php endwhile; ?>
        <?php else: ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>
    </div><!-- end #main -->
	</main>
<?php $this->need('footer.php'); ?>