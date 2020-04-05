<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
 
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
 
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
//头像CDN
$host = 'https://secure.gravatar.com'; //自定义头像CDN服务器
$url = '/avatar/'; //自定义头像目录,一般保持默认即可
$size = '40'; //自定义头像大小
$rating = Helper::options()->commentsAvatarRating;
$hash = md5(strtolower($comments->mail));
$avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
echo $commentClass;
?>">
    <div id="<?php $comments->theId(); ?>">
        <div class="comment-author">
<img class="avatar" src="/usr/themes/hermit/img/avatar.jpg" data-src="<?php echo $avatar ?>" alt="<?php echo $comments->author; ?>" width="40" height="40">
            <cite class="fn"><?php $options->beforeAuthor();CommentAuthor($comments);$options->afterAuthor();?></cite>
            <span class="comment-reply" style="float:right"><?php $comments->reply(); ?></span>
        </div><?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
 
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
 
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
//头像CDN
$host = 'https://secure.gravatar.com'; //自定义头像CDN服务器
$url = '/avatar/'; //自定义头像目录,一般保持默认即可
$size = '40'; //自定义头像大小
$rating = Helper::options()->commentsAvatarRating;
$hash = md5(strtolower($comments->mail));
$avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
echo $commentClass;
?>">
    <div id="<?php $comments->theId(); ?>">
        <div class="comment-author">
<img class="avatar" src="/usr/themes/hermit/img/avatar.jpg" data-src="<?php echo $avatar ?>" alt="<?php echo $comments->author; ?>" width="40" height="40">
            <cite class="fn"><?php $options->beforeAuthor();CommentAuthor($comments);$options->afterAuthor();?></cite>
            <span class="comment-reply" style="float:right"><?php $comments->reply(); ?></span>
        </div>
        <div class="comment-meta">
            <a href="<?php $comments->permalink(); ?>"><?php $comments->date('Y-m-d H:i'); ?></a>
        </div>
        <?php echo preg_replace("/::([a-z]*)::/i", "<img src=\"/usr/themes/hermit/img/face/\\1.gif\"/>", $comments->content);?>
    </div>
<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php } ?>
<div onclick="show();return false;" id="commenta" class="n-comment-form-inpput">
<div class="n-comment-table">
<div class="comment-trigger">
<div class="trigger-title">点击查看＆撰写评论</div>
</div>
<div class="new-comment"><div name="content" rows="2" class="textarea-box" id="comment-content"></div>
</div>
</div>
</div>
<div id="comments" style="display:none">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
	<h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
    
    <?php $comments->listComments(); ?>

    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
    
    	<h3 id="response"><?php _e('添加新评论'); ?></h3>
    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <?php if($this->user->hasLogin()): ?>
    		<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
    		<p>
                <label for="author" class="required"><?php _e('称呼'); ?></label>
    			<input type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" required />
    		</p>
    		<p>
                <label for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('Email'); ?></label>
    			<input type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
    		</p>
    		<p>
                <label for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站'); ?></label>
    			<input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
    		</p>
            <?php endif; ?>
    		<p>
                <label for="textarea" class="required"><?php _e('内容'); ?></label>
                <textarea rows="8" cols="50" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
            </p>
            <p class="comment-smilies">
                    <a class="add-smily" href="javascript:grin('::huaji::')"><img class="wp-smiley" src="/usr/themes/hermit/img/face/huaji.gif"></a>
                    <a class="add-smily" href="javascript:grin('::good::')"><img class="wp-smiley" src="/usr/themes/hermit/img/face/good.gif"></a>
                    <a class="add-smily" href="javascript:grin('::outwater::')"><img class="wp-smiley" src="/usr/themes/hermit/img/face/outwater.gif"></a>
                    <a class="add-smily" href="javascript:grin('::hotface::')"><img class="wp-smiley" src="/usr/themes/hermit/img/face/hotface.gif"></a>
                    <a class="add-smily" href="javascript:grin('::angry::')"><img class="wp-smiley" src="/usr/themes/hermit/img/face/angry.gif"></a>
                    <a class="add-smily" href="javascript:grin('::poor::')"><img class="wp-smiley" src="/usr/themes/hermit/img/face/poor.gif"></a>
                    <a class="add-smily" href="javascript:grin('::unhappy::')"><img class="wp-smiley" src="/usr/themes/hermit/img/face/unhappy.gif"></a>
                    <a class="add-smily" href="javascript:grin('::doubt::')"><img class="wp-smiley" src="/usr/themes/hermit/img/face/doubt.gif"></a>
                    <a class="add-smily" href="javascript:grin('::rose::')"><img class="wp-smiley" src="/usr/themes/hermit/img/face/rose.gif"></a>
            </p>
    		<p>
                <button type="submit" class="submit"><?php _e('提交评论'); ?></button>
            </p>
    	</form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>

        <div class="comment-meta">
            <a href="<?php $comments->permalink(); ?>"><?php $comments->date('Y-m-d H:i'); ?></a>
        </div>
        <?php echo preg_replace("/::([a-z]*)::/i", "<img src=\"/usr/themes/bright/img/face/\\1.gif\"/>", $comments->content);?>
    </div>
<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php } ?>
<div onclick="show();return false;" id="commenta" class="n-comment-form-inpput">
<div class="n-comment-table">
<div class="comment-trigger">
<div class="trigger-title">点击查看＆撰写评论</div>
</div>
<div class="new-comment"><div name="content" rows="2" class="textarea-box" id="comment-content"></div>
</div>
</div>
</div>
<div id="comments" style="display:none">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
	<h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
    
    <?php $comments->listComments(); ?>

    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
    
    	<h3 id="response"><?php _e('添加新评论'); ?></h3>
    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <?php if($this->user->hasLogin()): ?>
    		<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
    		<p>
                <label for="author" class="required"><?php _e('称呼'); ?></label>
    			<input type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" required />
    		</p>
    		<p>
                <label for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('Email'); ?></label>
    			<input type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
    		</p>
    		<p>
                <label for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站'); ?></label>
    			<input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
    		</p>
            <?php endif; ?>
    		<p>
                <label for="textarea" class="required"><?php _e('内容'); ?></label>
                <textarea rows="8" cols="50" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
            </p>
            <p class="comment-smilies">
                    <a class="add-smily" href="javascript:grin('::huaji::')"><img class="wp-smiley" src="/usr/themes/bright/img/face/huaji.gif"></a>
                    <a class="add-smily" href="javascript:grin('::good::')"><img class="wp-smiley" src="/usr/themes/bright/img/face/good.gif"></a>
                    <a class="add-smily" href="javascript:grin('::outwater::')"><img class="wp-smiley" src="/usr/themes/bright/img/face/outwater.gif"></a>
                    <a class="add-smily" href="javascript:grin('::hotface::')"><img class="wp-smiley" src="/usr/themes/bright/img/face/hotface.gif"></a>
                    <a class="add-smily" href="javascript:grin('::angry::')"><img class="wp-smiley" src="/usr/themes/bright/img/face/angry.gif"></a>
                    <a class="add-smily" href="javascript:grin('::poor::')"><img class="wp-smiley" src="/usr/themes/bright/img/face/poor.gif"></a>
                    <a class="add-smily" href="javascript:grin('::unhappy::')"><img class="wp-smiley" src="/usr/themes/bright/img/face/unhappy.gif"></a>
                    <a class="add-smily" href="javascript:grin('::doubt::')"><img class="wp-smiley" src="/usr/themes/bright/img/face/doubt.gif"></a>
                    <a class="add-smily" href="javascript:grin('::rose::')"><img class="wp-smiley" src="/usr/themes/bright/img/face/rose.gif"></a>
            </p>
    		<p>
                <button type="submit" class="submit"><?php _e('提交评论'); ?></button>
            </p>
    	</form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>
