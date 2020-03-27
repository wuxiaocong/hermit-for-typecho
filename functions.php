<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $stitle = new Typecho_Widget_Helper_Form_Element_Text('stitle', NULL, '', _t('副标题'), _t('只在首页出现'));
    $form->addInput($stitle);
    $Links = new Typecho_Widget_Helper_Form_Element_Textarea('Links', NULL, NULL, _t('链接列表（注意：切换主题会被清空，注意备份！）'), _t('按照格式输入链接信息，格式：<br><strong>链接名称（必须）,链接地址（必须）,链接描述,链接分类</strong><br>不同信息之间用英文逗号“,”分隔，若中间有暂时不想填的信息，请留空，多个链接换行即可，一行一个'));
$form->addInput($Links);

}
function parseContent($obj){
    $options = Typecho_Widget::widget('Widget_Options');
    $obj->content = preg_replace("/<a href=\"([^\"]*)\">/i", "<a href=\"\\1\" rel=\"nofollow\" target=\"_blank\" class=\"btn btn-primary\">", $obj->content);
    $obj->content = preg_replace("/<img src=\"([^\"]*)\" alt=\"([^\"]*)\" title=\"([^\"]*)\">/i", "<div class=\"postimg\"><a data-fancybox=\"gallery\" href=\"\\1\"><img src=\"\\1\" alt=\"\\2\" title=\"\\3\"></a><div class=\"meta\">[\\2]</div></div>", $obj->content);
    $obj->content = preg_replace("/::([a-z]*)::/i", "<img src=\"/usr/themes/hermit/img/face/\\1.gif\"/>", $obj->content);
    echo trim($obj->content);
}
function CommentAuthor($obj, $autoLink = NULL, $noFollow = NULL) {
    $options = Helper::options();
    $autoLink = $autoLink ? $autoLink : $options->commentsShowUrl;    
    $noFollow = $noFollow ? $noFollow : $options->commentsUrlNofollow; 
    if ($obj->url && $autoLink) {
        echo '<a href="'.$obj->url.'"'.($noFollow ? ' rel="external nofollow"' : NULL).(strstr($obj->url, $options->index) == $obj->url ? NULL : ' target="_blank"').'>'.$obj->author.'</a>';
    } else {
        echo $obj->author;
    }
}
function Links($sorts = NULL) {
    $options = Typecho_Widget::widget('Widget_Options');
    $link = NULL;
    if ($options->Links) {
        $list = explode("\r\n", $options->Links);
        foreach ($list as $val) {
            list($name, $url, $description, $sort) = explode(",", $val);
            if ($sorts) {
                $arr = explode(",", $sorts);
                if ($sort && in_array($sort, $arr)) {
                    $link .= $url ? '<a href="'.$url.'" title="'.$description.'" target="_blank">'.$name.'</a>' : '<a title="'.$description.'"><del>'.$name.'</del></a>';
                }
            } else {
                $link .= $url ? '<a href="'.$url.'" title="'.$description.'" target="_blank">'.$name.'</a>' : '<a title="'.$description.'"><del>'.$name.'</del></a>';
            }
        }
    }
    echo $link ? $link : '暂无链接';
}
