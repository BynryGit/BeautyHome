$j(window).load(function(){
	setTimeout(function(){
		$j("#panel").animate({marginLeft: "0px"});
		$j("a.open").addClass('opened');
	},1000);
});


$j(document).ready(function() {


	$j("#panel a.open").click(function(e){
		e.preventDefault();
		var margin_left = $j("#panel").css("margin-left");
		if (margin_left == "-318px"){
			$j("#panel").animate({marginLeft: "0px"});
			$j(this).addClass('opened');
		}
		else{
			$j("#panel").animate({marginLeft: "-318px"});
			$j(this).removeClass('opened');
		}
		return false;
	});
	
	$j('#panel select').sSelect();
	$j('#tootlbar_ajax').change(function(){
		if($j(this).val() != ""){
			
			// sessionStorage.setItem("animation", $j(this).val());
    	$j.post(root+'updatesession.php', {animation : $j(this).val()}, function(data){
					location.reload();
			});
			
			
		}
	});

	
	$j('#tootlbar_pattern').change(function(){
		if($j(this).val() != ""){
			
			newSkin ="body.boxed { \
									background-image: url('wp-content/themes/lounge/img/"+$j(this).val()+".png'); \
									background-position: 0px 0px; \
									background-repeat: repeat; \
								} \
							";
			jQuery('body').append('<style id="tootlbar_pattern" type="text/css">'+newSkin+'</style>'); 
			
		}else{
			newSkin ="body { \
									background-image: none; \
								} \
							";
			jQuery('body').append('<style id="tootlbar_pattern" type="text/css">'+newSkin+'</style>'); 
		}
	});
	
	$j('#tootlbar_layout').change(function(){
		$j('body').removeClass('boxed');
		$j('body').removeClass('wide');
		$j('body').addClass($j(this).val());
	});
	
	$j('#tootlbar_top_menu').change(function(){
		if($j(this).val() != ""){
			
			$j.post(root+'updatesession.php', {top_menu : $j(this).val()}, function(data){
					location.reload();
			});
		}
	});
	
	$j('#tootlbar_menu').change(function(){
		if($j(this).val() != ""){
			$j.post(root+'updatesession.php', {menu : $j(this).val()}, function(data){
					location.reload();
			});
		}
	});
	
	$j('#tootlbar_color').change(function(){
		if($j(this).val() != ""){
			newSkin =".link_holder:hover, \
								.circle_item .circle, \
								.dropcap.circle, \
								.dropcap.square, \
								.accordion h3 span, \
								.progress_bars .progress_content, \
								.highlight, \
								.list.num_bold ul > li:before, \
								.list.num ul > li:before, \
								.button, \
								input[type='submit'], \
								.tabs .tabs-nav li a, \
								.active_best_price, \
								.social_menu li a:hover, \
								.box_small_holder.white:hover, \
								.box_small_holder.black:hover, \
								.posts_holder2 article .text .date, \
								.pagination2 ul li span, \
								.pagination2 ul li a:hover, \
								.link_holder_parallax a:hover, \
								.link_holder_parallax a.active, \
								#back_to_top:hover, \
								.widget.widget_search form input[type='submit'], \
								.widget .tagcloud a  \
								{ \
									background-color: "+$j(this).val()+"; \
								} \
								a:hover, \
								p a:hover, \
								nav.main_menu ul li a.current, \
								nav.main_menu ul li:hover a, \
								nav.main_menu2 ul li.active a, \
								nav.main_menu2 ul li:hover a, \
								.drop_down .second .inner ul li:first-child a, \
								.drop_down .second .inner ul li a:hover, \
								.drop_down2 .second .inner2 ul li:hover a, \
								.drop_down2 .second .inner2 ul li.sub ul li:hover a, \
								.drop_down3 .second .mc a.have_sub, \
								.breadcrumbs a, \
								.breadcrumbs span, \
								.dropcap, \
								blockquote p, \
								.latest_post h3 a:hover, \
								.latest_post h6 a, \
								.posts_holder3 article h3 a, \
								.posts_holder2 article h2 a, \
								.posts_holder3 article h3 a:hover, \
								.posts_holder2 article h2 a:hover, \
								.posts_holder article h2 a:hover, \
								.filter a:hover, \
								.filter a.current, \
								.portfolio_detail .info h6 a, \
								.portfolio_navigation .portfolio_prev a:hover, \
								.portfolio_navigation .portfolio_next a:hover, \
								.slide .text.type2, \
								.tooltip, \
								aside .widget a:hover, \
								.footer_top li a:hover { \
									color: "+$j(this).val()+"; \
								} \
								nav.main_nav > ul > li:hover > a, \
								nav.main_nav > ul > li > a.current, \
								nav.main_nav > ul > li.active > a \
								{ \
									border-color: "+$j(this).val()+"; \
								} \
							";
			jQuery('body').append('<style id="tootlbar_color" type="text/css">'+newSkin+'</style>'); 
		}
	});
	
	

	

}); 