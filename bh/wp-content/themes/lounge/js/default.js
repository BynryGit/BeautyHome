var $j = jQuery.noConflict();

var size1 = true;
var size2 = true;
var size3 = true;
var size4 = true;
var size1_width = 1160;
var size2_width = 934;
var size3_width = 500;

$j(document).ready(function() {
		
	initSmallSlider();

	initFlexSlider();

	dropDownMenu();

	dropDownMenu2();

	dropDownMenu3();

	initAccordion();

	initProgressBars();

	initTestimonials();

	initMessages();

	selectMenu();

	placeholderReplace();
	
	initParallax(parallax_speed);
	
	parallaxPager();
		
	viewPort();
	
	backButtonInterval();
	backToTop();
	
	fitVideo();
	
	filterMenu();
	
	initCounter();
});

$j(window).load(function(){
	initTabs();
	setContentTopPadding();
	initPortfolioSingleInfo();
	initPortfolioList();
	initPortfolioFilter();
	checkSizes();
	
	$j('.touch .main_menu li:has(div.second)').doubleTapToGo(); // load script to close menu on youch devices
	$j('.logo a').css('visibility','visible');
	smallSliderArraowsPosition();
	
	logo_height = $j('.logo img').height();
	var scroll = $j(window).scrollTop();
	if(!$j('header').hasClass('centered_logo')){
		setLogoHeightOnLoad();
		centerLogoVertical();
	}
	
	$j('.flexslider, .slider_small, .portfolio_outer').css('visibility','visible');
	
});

$j(window).scroll(function() {
	var scroll = $j(window).scrollTop();
	$j('header.header_top_fixed .header_top_outer').css('height',31 - scroll);
	
	if($j('.centered_logo').length == 0){
		headerSize(scroll);
		centerLogoVertical();
	}

    $j('.touch .drop_down > ul > li').mouseleave();
    $j('.touch .drop_down > ul > li').blur();
});

$j(window).resize(function(){
	checkSizes();
	smallSliderArraowsPosition();
});

function checkSizes(){
	$width = $j(window).width();
	if($width > size1_width && size1 == true){
		size2 = true;
		size3 = true;
		size4 = true;
		size1 = false;
		$j('.portfolio_holder').isotope('reLayout');
	}
	
	if($width < size1_width && size2 == true){
		size1 = true;
		size3 = true;
		size4 = true;
		size2 = false;
		$j('.portfolio_holder').isotope('reLayout');
	}
	
	
	if($width < size2_width && size3 == true){
		size1 = true;
		size2 = true;
		size4 = true;
		size3 = false;
		$j('.portfolio_holder').isotope('reLayout');
	}
	
	if($width < size3_width && size4 == true){
		size1 = true;
		size2 = true;
		size3 = true;
		size4 = false;
		$j('.portfolio_holder').isotope('reLayout');
	}
}

function centerLogoVertical(){
	$j('.logo a').css('margin-top',-$j('.logo a img').height()/2);
}

function setContentTopPadding(){
	if($j('header').hasClass('header_top_fixed')){
		$j('.content').css('padding-top',$j('header').height()-4); // 4 is height og header shadow
	}
}

function initSmallSlider(){
	$j('.slider_small.turn_on ul').bxSlider({
		pager: false,
		minSlides: 1,
		maxSlides: 4,
		slideWidth: 246,
		slideMargin: 20,
		moveSlides: 1,
		infiniteLoop: true
	});
}

function dropDownMenu(){
	var menu_items = $j('.drop_down > ul > li');

	menu_items.each( function(i) {
		if ($j(menu_items[i]).find('.second').length > 0) {
			
			var ul_items = $j(this).find('ul').length;
			if(ul_items <= 4){
				var widthSizeUl = ul_items * 200; //200 is width of one column of second menu
			} else {
				var widthSizeUl = 4 * 200;
			}

			var margin_left = -1/2 * (widthSizeUl + 50) + 1/2 * $j(menu_items[i]).width();
			
			$j(menu_items[i]).find('.inner2').css('width', widthSizeUl);
			$j(menu_items[i]).find('.second').css('margin-left', margin_left);


			$j(menu_items[i]).data('original_height', $j(menu_items[i]).find('.second').height() + 'px');
			$j(menu_items[i]).find('.second').hide();
			$j(menu_items[i]).find('.second').css({'visibility': 'visible'});

			$j(menu_items[i]).mouseenter(function(){
				$j(menu_items[i]).find('.second').css({'display': 'block', 'margin-top': '50px'});
				$j(menu_items[i]).find('.second').stop().fadeIn().animate({'height': $j(menu_items[i]).data('original_height'), 'margin-top': '0px'}, 200, function() {
					$j(menu_items[i]).find('.second').css('overflow', 'visible');
					$j(menu_items[i]).find('.second').css('visibility', 'visible');						
				});
			}).mouseleave( function(){
				$j(menu_items[i]).find('.second').css('display' , 'none').stop().animate(300 , function() {
					$j(menu_items[i]).find('.second').css('overflow', 'hidden');
					$j(menu_items[i]).find('.second').css('visibility', 'hidden');
					
				});
			});
		}
	});
}

function dropDownMenu2(){
	var menu_items = $j('.drop_down2 > ul > li');

	menu_items.each( function(i) {
		if ($j(menu_items[i]).find('.second').length > 0) {
		
			$j(menu_items[i]).data('original_height', $j(menu_items[i]).find('.second').height() + 'px');
			$j(menu_items[i]).find('.second').hide();
			
			var size = $j(menu_items[i]).find('ul > li').size()*10 + 100;

            if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
                $j(menu_items[i]).on("touchstart mouseenter",function(){
                    $j(menu_items[i]).find('.second').css({'height': $j(menu_items[i]).data('original_height'), 'overflow': 'visible', 'visibility': 'visible', 'opacity': '1', 'display' : 'block'});
                }).on("mouseleave", function(){
                    $j(menu_items[i]).find('.second').css({'height': '0px','overflow': 'hidden', 'visivility': 'hidden', 'opacity': '0'});
                });

            } else {
                $j(menu_items[i]).mouseenter(function(){
                    $j(menu_items[i]).find('.second').css({'visibility': 'visible','height': '0px', 'opacity': '0'});
                    $j(menu_items[i]).find('.second').css('display', 'block');
                    $j(menu_items[i]).find('.second').stop().animate({'height': $j(menu_items[i]).data('original_height'),opacity:1}, size, function() {
                        $j(menu_items[i]).find('.second').css('overflow', 'visible');

                    });
                    dropDownMenu2ThirdLevel();
                }).mouseleave( function(){
                    $j(menu_items[i]).find('.second').stop().animate({'height': '0px'},0, function() {
                        $j(menu_items[i]).find('.second').css('overflow', 'hidden');
                        $j(menu_items[i]).find('.second').css('visibility', 'hidden');
                        $j(menu_items[i]).find('.second').css('display', 'none');

                    });
                });
            }

		}

	});
}

function dropDownMenu2ThirdLevel(){
	var menu_items2 = $j('.drop_down2 ul li > .second > .inner > .inner2 > ul > li');
	menu_items2.each( function(i) {
		if ($j(menu_items2[i]).find('ul').length > 0) {
			var sum=0;
			$j(menu_items2[i]).find('ul li').each( function(){ sum+=$j(this).height();});
			
			$j(menu_items2[i]).data('original_height', sum + 'px');
			
			var size2 = $j(menu_items2[i]).find('ul > li').size()*10 + 100;
			$j(menu_items2[i]).mouseenter(function(){
				$j(menu_items2[i]).find('ul').css({'visibility': 'visible','height': '0px', 'opacity':'0'});
				$j(menu_items2[i]).find('ul').css('display', 'block');
				$j(menu_items2[i]).find('ul').css('padding', '10px 0');
				$j(menu_items2[i]).find('ul').stop().animate({'height': $j(menu_items2[i]).data('original_height'),opacity:1}, size2, function() {
					$j(menu_items2[i]).find('ul').css('overflow', 'visible');
				});
			}).mouseleave(function(){
				$j(menu_items2[i]).find('ul').stop().animate({'height': '0px'},0, function() {
					$j(menu_items2[i]).find('ul').css('overflow', 'hidden');
					$j(menu_items2[i]).find('ul').css('padding', '0');
					$j(menu_items2[i]).find('.second').css('visibility', 'hidden');
				});
			});
		}

	});
}

function dropDownMenu3(){
	$j('.drop_down3 > ul > li').each(function(){
		
		var height = $j(this).find('.second').height();
		var header_height = $j('header').height();		

		$j(this).mouseenter(function(){
			$j(this).find('.second').height(0);
			$j(this).find('.second').css('visibility','visible');
			$j(this).find('.second').css('z-index','100');
			$j(this).find('.second').stop().animate({height:height},400);
		}).mouseleave(function(){
			$j(this).find('.second').css('z-index','90');
			$j(this).find('.second').stop().animate({height:0},400,function(){
				$j(this).css('visibility','hidden');
				$j(this).height(0);
			});
		});	
	});
}

function initAccordion(){
	$j( ".accordion2" ).accordion({
		animate: "swing",
		collapsible: true,
		icons: "",
		heightStyle: "content"
	});
	
	$j(".toggle").addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset")
	.find("h3")
	.addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom")
	.hover(function() { $j(this).toggleClass("ui-state-hover"); })
	.click(function() {
	$j(this)
		.toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
		.next().toggleClass("ui-accordion-content-active").slideToggle(200);
		return false;
	})
	.next()
	.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom")
	.hide(); 
}

function initProgressBars(){
	$j('.progress_bars').each(function() {
		$j(this).appear(function() {
			$j(this).find('.progress_bar').each(function() {
				var percentage = $j(this).find('.progress_content').data('percentage');
				$j(this).find('.progress_content').css('width', '0%');
				$j(this).find('.progress_number').css('width', '0%');
				$j(this).find('.progress_content').animate({
					width: percentage+'%'
				}, 2000);
				$j(this).find('.progress_number').html(percentage+'%');
				$j(this).find('.progress_number').animate({width: 48+'px'}, 1400);
			});
		});
	});
	
}

function initTabs(){

	var $tabsNav = $j('.tabs-nav'),
	$tabsNavLis = $tabsNav.children('li'),
	$tabContent = $j('.tab-content');
	$tabsNav.each(function() {
		var $this = $j(this);
		$this.next().children('.tab-content').stop(true,true).hide().first().show();
		$this.children('li').first().addClass('active').stop(true,true).show();
	});
	$tabsNavLis.on('click', function(e) {
		var $this = $j(this);
		$this.siblings().removeClass('active').end().addClass('active');
		$this.parent().next().children('.tab-content').stop(true,true).hide().siblings( $this.find('a').attr('href') ).fadeIn();
		e.preventDefault();
	}); 
}

function initMessages(){
	$j('.message').each(function(){
		$j(this).find('.close').click(function(e){
			e.preventDefault();
			$j(this).parent().fadeOut(500);
		});
	});
}

var $scrollHeight;
function initPortfolioSingleInfo(){
	var $sidebar   = $j(".portfolio_single_follow");
	if($j(".portfolio_single_follow").length > 0){
	
		offset = $sidebar.offset();
		$scrollHeight = $j(".portfolio_container").height();
		$scrollOffset = $j(".portfolio_container").offset();
		$window = $j(window);
		
		if($j('.header_top_fixed').length > 0){
			
			$menuLineHeight = parseInt($j('.main_nav > ul > li > a').css('line-height'), 10);
			$topPadding = $menuLineHeight + 31 + 3; // 31 is height of top menu and 3 is height of hover line on main menu
			
			$window.scroll(function() {
				if($window.width() > 960){

					if ($window.scrollTop() + $menuLineHeight + 3 > offset.top) {
						if ($window.scrollTop() + $topPadding + $sidebar.height() + 24 < $scrollOffset.top + $scrollHeight) {
							$sidebar.stop().animate({
								marginTop: $window.scrollTop() - offset.top + $topPadding
							});
						} else {
							$sidebar.stop().animate({
								marginTop: $scrollHeight - $sidebar.height() - 24
							});
						}
					} else {
						$sidebar.stop().animate({
							marginTop: 0
						});
					}		
				}else{
					$sidebar.css('margin-top',0);
				}
				
			});
		}else{
			$topPadding = 15;
			$window.scroll(function() {
				if($window.width() > 960){

					if ($window.scrollTop() > offset.top) {
						if ($window.scrollTop() + $topPadding + $sidebar.height() + 24 < $scrollOffset.top + $scrollHeight) {
							$sidebar.stop().animate({
								marginTop: $window.scrollTop() - offset.top + $topPadding
							});
						} else {
							$sidebar.stop().animate({
								marginTop: $scrollHeight - $sidebar.height() - 24
							});
						}
					} else {
						$sidebar.stop().animate({
							marginTop: 0
						});
					}		
				}else{
					$sidebar.css('margin-top',0);
				}
				
			});
		}
		
		
	}
}

function initPortfolioList(){
	
	$j('.portfolio_holder').isotope({
		itemSelector: '.element',
		animationEngine : 'jquery',
		animationOptions: {
			duration: 250,
			easing: 'linear',
			queue: false
		}
	});

}

function initPortfolioFilter(){
	$j('.filter a:first').addClass('current');
	$j('.filter a').click(function(){
		var selector = $j(this).attr('data-filter');
		$j('.portfolio_holder').isotope({ filter: selector });
		
		$j(".filter a").removeClass("current");
		$j(this).addClass("current");
		
		return false;
	});
}

function selectMenu(){
	var $menu_select = $j("<div class='select'><ul></ul></div>");
	$j("<span>&nbsp;</span>").prependTo($menu_select);
	$menu_select.appendTo(".selectnav");
	
	if($j(".main_nav").hasClass('drop_down')){
		$j(".main_nav ul li a").each(function(){
			var menu_url = $j(this).attr("href");
			var menu_text = $j(this).text();
			if ($j(this).parents("ul").length == 2) { menu_text = "&nbsp;&nbsp;&nbsp;" + menu_text; }
			if ($j(this).parents("li").length == 2) {
				if (!$j(this).parents("li").hasClass('sl')) { menu_text = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + menu_text; }
			}
			
			var li = $j("<li />");
			var link = $j("<a />", {"href": menu_url, "html": menu_text}).appendTo(li);
			li.appendTo($menu_select.find('ul'));
		});
	}else if($j(".main_nav").hasClass('drop_down2')){
		$j(".main_nav ul li a").each(function(){
			var menu_url = $j(this).attr("href");
			var menu_text = $j(this).text();
			if ($j(this).parents("li").length == 2) { menu_text = "&nbsp;&nbsp;&nbsp;" + menu_text; }
			if ($j(this).parents("li").length == 3) { menu_text = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + menu_text; }
			if ($j(this).parents("li").length > 3) { menu_text = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + menu_text; }
			
			// $j("<li><a href="+menu_url+">"+menu_text+"</a></li>").appendTo($menu_select.find('ul'));
			var li = $j("<li />");
			var link = $j("<a />", {"href": menu_url, "html": menu_text}).appendTo(li);
			li.appendTo($menu_select.find('ul'));
		});
	}else if($j(".main_nav").hasClass('drop_down3')){
		$j(".main_nav ul li a").each(function(){
			var menu_url = $j(this).attr("href");
			var menu_text = $j(this).text();
			if ($j(this).parents("div.mc").length == 1) { menu_text = "&nbsp;&nbsp;&nbsp;" + menu_text; }
			if ($j(this).hasClass('sub')) { menu_text = "&nbsp;&nbsp;&nbsp;" + menu_text; }
			
			//$j('<li><a href=' + menu_url + '>' + menu_text + '</a></li>').appendTo($menu_select.find('ul'));
			var li = $j("<li />");
			var link = $j("<a />", {"href": menu_url, "html": menu_text}).appendTo(li);
			li.appendTo($menu_select.find('ul'));
		});
	}
	
	$j(".select span").click(function () {
		if ($j(".select ul").is(":visible")){
			$j(".select ul").slideUp();
		} else {
			$j(".select ul").slideDown();
		}
	});
	
	$j(".selectnav ul li a").click(function () {
		$j(".select ul").slideUp();
	});
}

function placeholderReplace(){
	$j('[placeholder]').focus(function() {
	 var input = $j(this);
		if (input.val() == input.attr('placeholder')) {
			if (this.originalType) {
				this.type = this.originalType;
				delete this.originalType;
			}
			input.val('');
			input.removeClass('placeholder');
		}
	}).blur(function() {
		var input = $j(this);
		if (input.val() == '') {
			if (this.type == 'password') {
				this.originalType = this.type;
				this.type = 'text';
			}
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		}
	}).blur();

	$j('[placeholder]').parents('form').submit(function () {
		 $j(this).find('[placeholder]').each(function () {
				 var input = $j(this);
				 if (input.val() == input.attr('placeholder')) {
						 input.val('');
				 }
		 })
 });
}

function initParallax(speed){
	
	if($j('html').hasClass('touch')){
		$j('.parallax section').each(function() {
			var $self = $j(this);
			var section_height = $self.data('height');
			$self.height(section_height);
			var rate = 0.5;
			
			var bpos = (- $j(this).offset().top) * rate;
			$self.css({'background-position': 'center ' + bpos  + 'px' });
			
			$j(window).bind('scroll', function() {
				var bpos = (- $self.offset().top + $j(window).scrollTop()) * rate;
				$self.css({'background-position': 'center ' + bpos  + 'px' });
			});
		});
	}else{
		$j('.parallax section').each(function() {
			var $self = $j(this);
			var section_height = $self.data('height');
			$self.height(section_height);
			var rate = (section_height / $j(document).height()) * speed;
			
			var distance = $j.elementoffset($self);
			var bpos = - (distance * rate);
			$self.css({'background-position': 'center ' + bpos  + 'px' });
			
			$j(window).bind('scroll', function() {
				var distance = $j.elementoffset($self);
				var bpos = - (distance * rate);
				$self.css({'background-position': 'center ' + bpos  + 'px' });
			});
		});
	}
	return this;
	
}

$j.elementoffset = function($element) {
	var fold = $j(window).scrollTop();
	return (fold) - $element.offset().top + 104;
};

function totop_button(a) {
		var b = $j("#back_to_top");
		b.removeClass("off on");
		if (a == "on") { b.addClass("on") } else { b.addClass("off") }
}

function backButtonInterval(){
	window.setInterval(function () {
			var b = $j(this).scrollTop();
			var c = $j(this).height();
			if (b > 0) { var d = b + c / 2 } else { var d = 1 }
			if (d < 1e3) { totop_button("off") } else { totop_button("on") }
	}, 300);
}

function backToTop(){
	$j(document).on('click','#back_to_top',function(e){
		e.preventDefault();
		
		$j('body,html').animate({scrollTop: 0}, $j(window).scrollTop()/3, 'swing');
	});
}

function parallaxPager(){
	var link_holder = $j('.link_holder_parallax');
	$j('section.parallax section').each(function(){	
		var href = $j(this).attr("id");
		var title = $j(this).data("title");
		
		var link = $j("<a />", {"href": "#"+href, "class":"link", "title": title, "html": "&nbsp;"});
		link.appendTo(link_holder);
		
	});
	link_holder.css('margin-top',-link_holder.height()/2);
	
	
	$j('.link_holder_parallax .link:first-child').addClass('active');
	$j(document).on('click','a.link',function() {
	
		$j('.tooltip').fadeOut(10);
		if($j(this).hasClass('active')){
			return false;
		}
		$j('.link_holder_parallax .link').removeClass('active');
		$j(this).addClass('active');
		
		$j.scrollTo($j($j(this).attr("href")), {
			duration: 750,
			offset: {top:-1}
		});
		return false;
	});	
	
	$j(".link_holder_parallax a[title]").tooltip({
		 position: "top left",
		 offset: [20, -20]
		 
	});
	
}

function viewPort(){

	$j('.parallax section').waypoint( function(direction) {
		var $active = $j(this).next();
		
		if (direction === "up") {
			$active = $active.prev();
		}
		if (!$active.length) {
			$active = $j(this);
		}
		
		var id = $active.attr("id");
		$j(".link").each(function(){
			var i = $j(this).attr("href").replace("#",""); 
			
			if(i == id){
				$j(this).addClass('active');
			}else{
				$j(this).removeClass('active');
			}
		});	
	}, { offset: '0%' });
}
function filterMenu(){
	var filter_items = $j('div.filter > ul > li');
	
		filter_items.each( function(i) {
			
			if ($j(filter_items[i]).find('ul').length>0) {
				$j(filter_items[i]).data('original_height', '29px');
				$j(filter_items[i]).find('ul:first').hide();
				$j(filter_items[i]).find('ul:first').css({'visibility':'visible', 'height':$j(this).data('original_height'), 'opacity': 0, 'z-index':0});
				
				$j(filter_items[i]).hover(
						function() {
							$j(this).find('ul:first').css("height",$j(this).data('original_height'));
							$j(this).find('ul:first').css("display","block");
							$j(this).find('ul:first').css("overwlow","hidden");
							$j(this).find('ul:first').css("z-index",10);
							$j(this).find('ul:first').stop().animate({'opacity': 1}, 500);
						}, function() {
							$j(this).find('ul:first').stop();
							$j(this).find('ul:first').css('overflow','hidden');
							
							$j(this).find('ul:first').stop().animate({'opacity': 0}, 500,'',function(){
								$j(this).hide();
								
							});
							$j(this).find('ul:first').css("z-index",0);
							
						});
				
			}
		});
}

function smallSliderArraowsPosition(){		
	var slider_image_height= $j('div.slider_small .slide_item .image').height();

	$j('div.slider_small a.bx-prev').css('top', slider_image_height/2);
	$j('div.slider_small a.bx-next').css('top', slider_image_height/2);
}

function fitVideo(){	
	$j(".portfolio_images").fitVids();
	$j(".video_holder").fitVids();
}

function initCounter(){
	$j('.counter').each(function() {
		$j(this).appear(function() {
			$j(this).absoluteCounter({
				speed: 3000,
				fadeInDelay: 1000
			});
		});
	});
	
}