<?php $this->need('header.php'); ?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 归档页面
 *
 * @package custom
 */
?>
	<main class="site-main section-inner thin animated fadeIn faster">
		<h1>Archives</h1>
		<div class="posts-group">
<?
    $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);   
    $year=0; $i=0; $j=0;   
    $output = '';   
    while($archives->next()):   
        $year_tmp = date('Y',$archives->created);   
        $mon_tmp = date('m',$archives->created);   
        $y=$year;   
        if ($year != $year_tmp && $year > 0) $output .= '</ul></div><div class="posts-group">';   
        if ($year != $year_tmp) {   
            $year = $year_tmp;   
            $output .= '<div class="post-year" id="'. $year .'">'. $year .' </div><ul class="posts-list">'; //输出年份   
        }   
        $output .= '<li class="post-item"><a href="'.$archives->permalink .'"><span class="post-title">'. $archives->title .'</span><span class="post-day">'.date('M d',$archives->created).'</span></a></li>'; //输出文章日期和标题   
    endwhile;   
    $output .= '</ul></li></ul></div>';
    echo $output;
?>
		</div>
	</main>
<?php $this->need('footer.php'); ?>