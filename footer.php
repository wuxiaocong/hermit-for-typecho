<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
	<footer id="site-footer" class="section-inner thin animated fadeIn faster">
		<p>&copy; 2020 <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a> &#183; <a href="https://creativecommons.org/licenses/by-nc/4.0/" target="_blank" rel="noopener">CC BY-NC 4.0</a><a href="<?php $this->options->siteUrl(); ?>feed" target="_blank" title="rss"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-rss"><path d="M4 11a9 9 0 0 1 9 9"></path><path d="M4 4a16 16 0 0 1 16 16"></path><circle cx="5" cy="19" r="1"></circle></svg></a></p>
	</footer>
<?php $this->footer(); ?>
	<script src="<?php $this->options->themeUrl(); ?>style/jquery-3.3.1.min.js"></script>
	<script src="<?php $this->options->themeUrl(); ?>style/bundle.min.js"></script>
	<script src="<?php $this->options->themeUrl(); ?>style/script.js"></script>
	<script src="<?php $this->options->themeUrl(); ?>style/jquery.fancybox.min.js"></script>
</body>
</html>