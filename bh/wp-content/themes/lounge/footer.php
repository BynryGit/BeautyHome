<?php global $qode_options_lounge; ?>
<?php
$qode_animation="";
if (isset($_SESSION['qode_animation'])) $qode_animation = $_SESSION['qode_animation'];
$qode_top_menu="";
if (isset($_SESSION['qode_top_menu'])) $qode_top_menu = $_SESSION['qode_top_menu'];
$qode_menu="";
if (isset($_SESSION['qode_menu'])) $qode_menu = $_SESSION['qode_menu'];
$qode_footer="";
if (isset($_SESSION['qode_footer'])) $qode_footer = $_SESSION['qode_footer'];
$hide_footer_logo_image = "";
if (isset($qode_options_lounge['hide_footer_logo_image'])) 
	$hide_footer_logo_image = $qode_options_lounge['hide_footer_logo_image'];
?>
				
		</div>
	</div>
		<footer>
			<div class="footer_holder">
				<div class="container">
					<div class="container_inner clearfix">
						<?php	
						$display_footer_widget = false;
						if (!empty($qode_footer)) $display_footer_widget = true;
						elseif ($qode_options_lounge['footer_widget_area'] == "yes") $display_footer_widget = true;
						if($display_footer_widget): ?> 
						<div class="footer_top">
							<div class="four_columns clearfix">
								<div class="column1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="column2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
								<div class="column3">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_3' ); ?>
									</div>
								</div>
								<div class="column4">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_4' ); ?>
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<div class="footer_bottom">
							<div class="left">
								<?php dynamic_sidebar( 'footer_left' ); ?>
							</div>
							<div class="right">
								<?php dynamic_sidebar( 'footer_right' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
</div>
<?php
if($qode_options_lounge['show_toolbar'] == "yes"){
?>

<div id="panel" style="margin-left: -318px;">
        
    <div id="panel-admin">
		<h4>Theme Options</h4>
		<select id="tootlbar_ajax">
			<option value="">Choose page transition</option>
			<option <?php if ($qode_animation == "no") { echo "selected='selected'"; } ?> value="no">No ajax, regular loading</option>
			<option <?php if ($qode_animation == "updown") { echo "selected='selected'"; } ?> value="updown">Page up/down</option>
			<option <?php if ($qode_animation == "fade") { echo "selected='selected'"; } ?> value="fade">Page fade in/fade out</option>
			<option <?php if ($qode_animation == "updown_fade") { echo "selected='selected'"; } ?> value="updown_fade">Page up/down (in) / fade (out)</option>
			<option <?php if ($qode_animation == "leftright") { echo "selected='selected'"; } ?> value="leftright">Page left/right</option>
		</select>
		<select id="tootlbar_top_menu">
			<option value="">Show Top Menu</option>
			<option  <?php if ($qode_top_menu == "yes") { echo "selected='selected'"; } ?> value="yes">Top menu - yes</option>
			<option  <?php if ($qode_top_menu == "no") { echo "selected='selected'"; } ?> value="no">Top menu - no</option>   
    </select>
		<select id="tootlbar_menu">
			<option value="">Choose Dropdown Menu Style</option>
			<option  <?php if ($qode_menu == "drop_down2") { echo "selected='selected'"; } ?> value="drop_down2">Menu type - drop down default</option>
			<option  <?php if ($qode_menu == "move_down") { echo "selected='selected'"; } ?> value="move_down">Menu type - drop down wide</option>
			<option  <?php if ($qode_menu == "drop_down1") { echo "selected='selected'"; } ?> value="drop_down1">Menu type - drop down elegant</option>      
    </select>
		<select id="tootlbar_pattern">
			<option value="">Choose pattern (only boxed layout)</option>
			<option value="pattern1">Transparent 1</option>
			<option value="pattern2">Transparent 2</option>
			<option value="pattern3">Cubes</option>
			<option value="pattern4">Diamond</option>
			<option value="pattern5">Escheresque</option>
			<option value="pattern6">Gradient Squares</option>
			<option value="pattern7">Graphy</option>
			<option value="pattern8">Struckaxiom</option>
			<option value="pattern9">Wavecut</option>
			<option value="pattern10">Whitediamond</option>
			<option value="pattern11">Retina Wood</option>
			<option value="pattern12">Retina Wood Grey</option>
		</select>
    <select id="tootlbar_layout">
			<option value="">Choose layout type</option>
			<option value="wide">Wide</option>
			<option value="boxed">Boxed</option>
    </select>
		<select id="tootlbar_color">
			<option value="">Choose Color</option>
			<option value="#c20b58">Default</option>
			<option value="#8caf00">Green</option>
			<option value="#00acee">Blue</option>
			<option value="#a48a55">Brown</option>
			<option value="#f43400">Orange</option>
			<option value="#00c7d3">Aquamarine</option>
		</select>
		<span class="small">* Change size, color and style on ANY section, element and font with an easy-to-use backend!</span>
    </div>
    
    <a class="open" href="#"></a>

</div><!--PANEL-->
<?php
}
?>

	<script>
		var no_ajax_pages = [];
		var root = '<?php echo home_url(); ?>/';
		<?php if($qode_options_lounge['parallax_speed'] != ''){ ?>
		var parallax_speed = <?php echo $qode_options_lounge['parallax_speed']; ?>;
		<?php }else{ ?>
		var parallax_speed = 1;
		<?php } ?>
	</script>
	<script>
	<?php 
		$pages = get_pages(); 
		foreach ($pages as $page) {
			if(get_post_meta($page->ID, "qode_show-animation", true) == "no_animation") :
	?>
				no_ajax_pages.push('<?php echo get_permalink($page->ID) ?>');
	<?php
			endif;
		}
		if (isset($qode_options_lounge['internal_no_ajax_links'])) {
			foreach (explode(',', $qode_options_lounge['internal_no_ajax_links']) as $no_ajax_link) {
	?>
				no_ajax_pages.push('<?php echo trim($no_ajax_link); ?>');
	<?php
			}
		}
	?>
	</script>
	<?php wp_footer(); ?>
</body>
</html>