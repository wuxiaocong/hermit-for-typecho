<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="theme-color" content="#494f5c">
	<meta name="msapplication-TileColor" content="#494f5c">
	<link rel="manifest" href="<?php $this->options->themeUrl(); ?>style/site.webmanifest">
	<link rel="shortcut icon" href="https://feed.cc/usr/uploads/2020/02/2262269642.png">
	<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?><?php if ($this->is('index')) : ?> | <?php $this->options->stitle(); ?><?php endif; ?></title>
	<link rel="stylesheet" href="<?php $this->options->themeUrl(); ?>style/main.css">
	<link rel="stylesheet" href="<?php $this->options->themeUrl(); ?>style/style.css">
	<link rel="stylesheet" href="<?php $this->options->themeUrl(); ?>style/jquery.fancybox.min.css">
	<?php $this->header(); ?>
</head>
<body id="page">
	
	<header id="site-header" class="animated slideInUp faster">
		<div class="hdr-wrapper section-inner">
			<div class="hdr-left">
				<div class="site-branding">
					<a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
				</div>
			</div>
			<div class="hdr-right">
				<nav class="site-nav hide-in-mobile">
					<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                    <?php endwhile; ?>
				</nav>
<button id="menu-btn" class="hdr-btn" title="Menu"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></button>
			</div>
		</div>
	</header>
<div id="mobile-menu" class="animated fast" style="animation-name: bounceInRight; display: none;">
		<ul>
					<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <li><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
                    <?php endwhile; ?>
		</ul>
	</div>