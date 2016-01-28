<?php global $qode_options_lounge; ?>	

<?php get_header(); ?>
			<div class="title <?php if($qode_options_lounge['title_background_image'] != ""){ echo 'has_background'; } ?>">	
				<div class="container">
					<div class="container_inner clearfix">					
						<h1><?php if($qode_options_lounge['404_title'] != ""): echo $qode_options_lounge['404_title']; else: ?> <?php _e('404', 'qode'); ?> <?php endif;?> / <?php if($qode_options_lounge['404_subtitle'] != ""): echo $qode_options_lounge['404_subtitle']; else: ?> <?php _e('Something went wrong', 'qode'); ?> <?php endif; ?> </h1>
						<?php if (function_exists('qode_custom_breadcrumbs')) qode_custom_breadcrumbs(); ?>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="container_inner clearfix">
					<div class="page_not_found">
						<h2><?php if($qode_options_lounge['404_text'] != ""): echo $qode_options_lounge['404_text']; else: ?> <?php _e('Page not found', 'qode'); ?> <?php endif;?></h2>
						<div class="separator_small"></div>
						<p><a href="<?php echo home_url(); ?>/"><?php if($qode_options_lounge['404_backlabel'] != ""): echo $qode_options_lounge['404_backlabel']; else: ?> <?php _e('Back to homepage', 'qode'); ?> <?php endif;?></a></p>
					</div>
				</div>
			</div>
			
<?php get_footer(); ?>	