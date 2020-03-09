function grin(tag) {
	var myField;
	tag = ' ' + tag + ' ';
	if (document.getElementById('textarea') && document.getElementById('textarea').type == 'textarea') {
		myField = document.getElementById('textarea');
	} else {
		return false;
	}
	if (document.selection) {
		myField.focus();
		sel = document.selection.createRange();
		sel.text = tag;
		myField.focus();
	}  else {
		myField.value += tag;
		myField.focus();
	}
}
function scrollTo(ele, speed){
	if(!speed) speed = 300;
	if(!ele){
		$("html,body").animate({scrollTop:0},speed);
	}else{
		if(ele.length>0) $("html,body").animate({scrollTop:$(ele).offset().top},speed);
	}
	return false;
}
   jQuery(document).ready(function($) {
        //点击下一页的链接(即那个a标签)
        $('.next').click(function() {
            $this = $(this);
            $this.addClass('loading').text('=='); //给a标签加载一个loading的class属性，用来添加加载效果
            var href = $this.attr('href'); //获取下一页的链接地址
            if (href != undefined) { //如果地址存在
                $.ajax({ //发起ajax请求
                    url: href,
                    //请求的地址就是下一页的链接
                    type: 'get',
                    //请求类型是get
                    error: function(request) {
                        //如果发生错误怎么处理
                    },
                    success: function(data) { //请求成功
                        $this.removeClass('loading').text('+'); //移除loading属性
                        var $res = $(data).find('.posts-list'); //从数据中挑出文章数据，请根据实际情况更改
                        $('.posts-list').append($res.fadeIn(500)); //将数据加载加进posts-loop的标签中。
                        var newhref = $(data).find('.next').attr('href'); //找出新的下一页链接
                        if (newhref != undefined) {
                            $('.next').attr('href', newhref);
                            scrollTo('.links-group',300);
                        } else {
                            $('.next').remove(); //如果没有下一页了，隐藏
                        }
                    }
                });
            }
            return false;
        });
    });
//监听滚动条事件
window.onscroll = function(){
	Limg()
}

//页面加载时调用一次，使图片显示
window.onload = function() {
	var img = document.querySelectorAll("img[data-src]")
	for(var i = 0; i < img.length; i++) {
		img[i].style.opacity = "0"
	}
	Limg()
}

function Limg() {
	var viewHeight = document.documentElement.clientHeight // 可视区域的高度
	var t = document.documentElement.scrollTop || document.body.scrollTop;
	var limg = document.querySelectorAll("img[data-src]")
	// Array.prototype.forEach.call()是一种快速的方法访问forEach，并将空数组的this换成想要遍历的list
	Array.prototype.forEach.call(limg, function(item, index) {
		var rect
		if(item.getAttribute("data-src") === "")
			return
		//getBoundingClientRect用于获取某个元素相对于视窗的位置集合。集合中有top, right, bottom, left等属性。
		rect = item.getBoundingClientRect()
		// 图片一进入可视区，动态加载
		if(rect.bottom >= 0 && rect.top < viewHeight) {
			(function() {
				var img = new Image()
				img.src = item.getAttribute("data-src")
				item.src = img.src
				//给图片添加过渡效果，让图片显示
				var j = 0
				setInterval(function() {
					j += 1
					if(j <= 1) {
						item.style.opacity = j
						return
					}
				}, 100)
				item.removeAttribute('data-src')
			})()
		}
	})
}
function show() {
        document.getElementById('comments').style.display = 'block';
        document.getElementById('commenta').style.display = 'none';
}