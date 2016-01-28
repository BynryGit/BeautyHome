<?php
$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header('Content-type: text/javascript');

?>

function initFlexSlider(){
	 $j('.flexslider').flexslider({
		animationLoop: true,
		controlNav: false,
		useCSS: false,
		pauseOnAction: true,
    pauseOnHover: true,
		slideshow: <?php if($qode_options_lounge['slider_transition_auto'] != ""){ echo $qode_options_lounge['slider_transition_auto'];} else{ echo "true"; }  ?>,
		animation: <?php if($qode_options_lounge['slider_transition_effect'] != ""){ echo '"'.$qode_options_lounge['slider_transition_effect'].'"';} else{ echo '"slide"'; }  ?>,
		animationSpeed: <?php if($qode_options_lounge['slider_transition_speed'] != ""){ echo $qode_options_lounge['slider_transition_speed'];} else{ echo "600"; }  ?>,
		slideshowSpeed: <?php if($qode_options_lounge['slider_transition_timeout'] != ""){ echo $qode_options_lounge['slider_transition_timeout'];} else{ echo "8000"; }  ?>,
		start: function(){
			setTimeout(function(){$j(".flexslider").fitVids();},100);
			
		}
	});
	
	$j('.flex-direction-nav a').click(function(e){
		e.preventDefault();
		e.stopImmediatePropagation();
		e.stopPropagation();
	});
}

function initTestimonials(){
	$j('.testimonials').bxSlider({
	  auto: true,
	  controls: false,
	  mode: 'fade',
	  pager: false,
	  pause: <?php if($qode_options_lounge['testimonial_transition_speed'] != ""){ echo $qode_options_lounge['testimonial_transition_speed'];} else{ echo "4000"; }  ?>
	});		
}

<?php

if($qode_options_lounge['menu_lineheight'] != ""){
	$line_height = $qode_options_lounge['menu_lineheight'];
}else{
	$line_height = 79;
}

?>

var line_height = <?php echo $line_height; ?>;
var dropDown1Top = <?php echo $line_height; ?> - 27;
var dropDown2Top = <?php echo $line_height; ?> - 8;
var dropDown3Top = <?php echo $line_height; ?> + 3;
var contentTop = <?php echo $line_height; ?> + 3;
var logo_height; // it's value is calculated in window load function

function headerSize(scroll){

<?php
	if(isset($qode_options_lounge['menu_resize'])){
		if($qode_options_lounge['menu_resize'] === "yes"){
			$menu_resize = 'yes';
		}else{
			$menu_resize = 'no';
		}
	}else{
		$menu_resize = 'yes';
	}

	if($menu_resize === "yes"){
?>
		if((line_height - scroll) > 60){		
			$j('header.header_top_fixed nav.main_nav > ul > li > a').css('line-height', line_height - scroll+'px');
			$j('header.header_top_fixed .drop_down .second').css('top', dropDown1Top - scroll+'px');
			$j('header.header_top_fixed .drop_down2 .second').css('top', dropDown2Top - scroll+'px');
			$j('header.header_top_fixed .drop_down3 .second').css('top', dropDown3Top - scroll+'px');
			
			if($j('header').hasClass('header_top_fixed')){
				if($j('.header_top_outer').length > 0){
					$j('.content').css('padding-top',contentTop+30-scroll);
				}else{
					$j('.content').css('padding-top',contentTop-scroll);
				}
			}
		} else if((line_height - scroll) < 60){
			$j('header.header_top_fixed nav.main_nav > ul > li > a').css('line-height', 57+'px');
			$j('header.header_top_fixed .drop_down .second').css('top', 38+'px');
			$j('header.header_top_fixed .drop_down2 .second').css('top', 49+'px');
			$j('header.header_top_fixed .drop_down3 .second').css('top', 60+'px');
			
			if($j('header').hasClass('header_top_fixed')){
				if($j('.header_top_outer').length > 0){
					$j('.content').css('padding-top',60+30-4);
				}else{
					$j('.content').css('padding-top',60-4);
				}
			}
		}

		if($j('header').hasClass('header_top_fixed')){
			if((line_height - scroll < logo_height) && (line_height - scroll) > 60 && logo_height > 55){
				$j('.logo img').height(line_height - scroll - 20);
			}else if((line_height - scroll < logo_height) && (line_height - scroll) < 60 && logo_height > 55){
				$j('.logo img').height(60 - 20);
			}else if(scroll == 0 && logo_height > 55){
				$j('.logo img').height(logo_height);
			}
		}
<?php
	} else {
?>
		if((line_height) > 60){		
			$j('header.header_top_fixed nav.main_nav > ul > li > a').css('line-height', line_height+'px');
			$j('header.header_top_fixed .drop_down .second').css('top', dropDown1Top+'px');
			$j('header.header_top_fixed .drop_down2 .second').css('top', dropDown2Top+'px');
			$j('header.header_top_fixed .drop_down3 .second').css('top', dropDown3Top+'px');
			
			if($j('header').hasClass('header_top_fixed')){
				if($j('.header_top_outer').length > 0){
					$j('.content').css('padding-top',contentTop+30);
				}else{
					$j('.content').css('padding-top',contentTop);
				}
			}
		} else if((line_height) < 60){
			$j('header.header_top_fixed nav.main_nav > ul > li > a').css('line-height', 57+'px');
			$j('header.header_top_fixed .drop_down .second').css('top', 38+'px');
			$j('header.header_top_fixed .drop_down2 .second').css('top', 49+'px');
			$j('header.header_top_fixed .drop_down3 .second').css('top', 60+'px');
			
			if($j('header').hasClass('header_top_fixed')){
				if($j('.header_top_outer').length > 0){
					$j('.content').css('padding-top',60+30-4);
				}else{
					$j('.content').css('padding-top',60-4);
				}
			}
		}
<?php		
	}
?>	
}

function setLogoHeightOnLoad(){
	if(line_height < logo_height && line_height > 60 && logo_height > 55){
		$j('.logo img').height(line_height - 20);
	}else if(line_height < logo_height && line_height < 60 && logo_height > 55){
		$j('.logo img').height(60 - 20);
	}else if(logo_height > 55){
		$j('.logo img').height(logo_height);
	}
}