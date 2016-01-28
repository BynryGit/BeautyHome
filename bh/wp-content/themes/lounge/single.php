<?php $sidebar = get_post_meta(get_the_ID(), "qode_show-sidebar", true);  ?>
<?php
$blog_hide_comments = "";
if (isset($qode_options_lounge['blog_hide_comments'])) 
	$blog_hide_comments = $qode_options_lounge['blog_hide_comments'];
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
				<?php if(!get_post_meta(get_the_ID(), "qode_show-page-title", true)) { ?>
					<div class="title <?php if($qode_options_lounge['title_background_image'] != ""){ echo 'has_background'; } ?>">	
						<div class="container">
							<div class="container_inner clearfix">
								<h1><span><?php the_title(); ?></span> <?php if(get_post_meta(get_the_ID(), "qode_page-subtitle", true)) { ?>/ <?php echo get_post_meta(get_the_ID(), "qode_page-subtitle", true) ?><?php } ?></h1>
								<?php if (function_exists('qode_custom_breadcrumbs')) qode_custom_breadcrumbs(); ?>
							</div>
						</div>
					</div>
				<?php } ?>
				
				<?php if($qode_options_lounge['show_back_button'] == "yes") { ?>
					<a id='back_to_top' href='#'>
						<span class='back_to_top_inner'>
							<span>&nbsp;</span>
						</span>
					</a>
				<?php } ?>
				
				<?php
					$revslider = get_post_meta($id, "qode_revolution-slider", true);
					if (!empty($revslider)){
						echo do_shortcode($revslider);
					}
					?>
				<div class="container">
					<div class="container_inner clearfix">
					<?php if(($sidebar == "default")||($sidebar == "")) : ?>
						<div class="posts_holder2 post_single">	
							<article>								
								<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>	
									<div class="image">
										<?php echo slider_blog(get_the_ID());?>	
									</div>
								<?php } else {
									if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") {
										if ( has_post_thumbnail()) { ?>
											<div class="image">		
											<?php the_post_thumbnail('full'); ?>
											</div>
									<?php }
									}
									?>
								
								<?php	} ?>
								
								<h2><?php the_title(); ?></h2>
								<div class="text">
									<div class="text_inner">
										<span class="create"><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
										<span class="date">
											<span class="number"><?php the_time('d'); ?></span>
											<span class="month"><?php the_time('M'); ?></span>
											<span class="year"><?php the_time('Y'); ?></span>
										</span>
										
										<div class="post_single_text_holder">
											<?php the_content(); ?>
											<?php wp_link_pages(); ?>
										</div>
									</div>
								</div>
								<?php if($blog_hide_comments != "yes"){ ?>
								<div class="info">
									<span class="right"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
								</div>
								<?php } ?>
							</article>
						</div>
						<?php if( has_tag()) { ?>
						<div class="tags">
							<p><?php the_tags(); ?></p>
						</div>
						<?php } ?>
						
						<?php
							if($blog_hide_comments != "yes"){
								comments_template('', true); 
							}else{
								echo "<br/><br/>";
							}
						?> 
						
					<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
						<?php if($sidebar == "1") : ?>	
							<div class="two_columns_66_33 clearfix">
							<div class="column1">
						<?php elseif($sidebar == "2") : ?>	
							<div class="two_columns_75_25 clearfix">
								<div class="column1">
						<?php endif; ?>
					
								<div class="column_inner">
									<div class="posts_holder2 post_single">
									
										<article>									
											
											
												
											<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>	
												<div class="image">
													<?php echo slider_blog(get_the_ID());?>	
												</div>
											<?php } else {
												if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") {
												 if ( has_post_thumbnail()) { ?>
													<div class="image">		
													<?php the_post_thumbnail('full'); ?>
													</div>
												<?php }
												}
												?>
											
											<?php } ?>
											
											<h2><?php the_title(); ?></h2>
											<div class="text">
												<div class="text_inner">
													<span class="create"><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
													<span class="date">
														<span class="number"><?php the_time('d'); ?></span>
														<span class="month"><?php the_time('M'); ?></span>
														<span class="year"><?php the_time('Y'); ?></span>
													</span>
													
													<div class="post_single_text_holder">
														<?php the_content(); ?>
														<?php wp_link_pages(); ?>
													</div>
												</div>
											</div>
											<?php if($blog_hide_comments != "yes"){ ?>
											<div class="info">
												<span class="right"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
											</div>
											<?php } ?>
										</article>
										</div>
										<?php if( has_tag()) { ?>
										<div class="tags">
											<p><?php the_tags(); ?></p>
										</div>
										<?php } ?>
										<?php 
										if($blog_hide_comments != "yes"){
											comments_template('', true); 
										}else{
											echo "<br/><br/>";
										}
										?> 
									</div>
								</div>	
								<div class="column2"> 
									<?php get_sidebar(); ?>
								</div>
							</div>
						<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
							<?php if($sidebar == "3") : ?>	
								<div class="two_columns_33_66 clearfix">
								<div class="column1"> 
									<?php get_sidebar(); ?>
								</div>
								<div class="column2">
							<?php elseif($sidebar == "4") : ?>	
								<div class="two_columns_25_75 clearfix">
									<div class="column1"> 
										<?php get_sidebar(); ?>
									</div>
									<div class="column2">
							<?php endif; ?>
							
									<div class="column_inner">
										<div class="posts_holder2 post_single">
										
											<article>									
												
												
													
												<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>	
													<div class="image">
														<?php echo slider_blog(get_the_ID());?>	
													</div>
												<?php } else {
													if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") {
													 if ( has_post_thumbnail()) { ?>
														<div class="image">		
														<?php	the_post_thumbnail('full'); ?>
														</div>
													<?php }
													}
													?>
												
												<?php	} ?>
												
												<h2><?php the_title(); ?></h2>
												<div class="text">
													<div class="text_inner">
														<span class="create"><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
														<span class="date">
															<span class="number"><?php the_time('d'); ?></span>
															<span class="month"><?php the_time('M'); ?></span>
															<span class="year"><?php the_time('Y'); ?></span>
														</span>
														
														<div class="post_single_text_holder">
															<?php the_content(); ?>
															<?php wp_link_pages(); ?>
														</div>
													</div>
												</div>
												<?php if($blog_hide_comments != "yes"){ ?>
												<div class="info">
													<span class="right"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
												</div>
												<?php } ?>
											</article>
											</div>
											<?php if( has_tag()) { ?>
											<div class="tags">
												<p><?php the_tags(); ?></p>
											</div>
											<?php } ?>
											<?php 
											if($blog_hide_comments != "yes"){
												comments_template('', true); 
											}else{
												echo "<br/><br/>";
											}
											?> 
										</div>
									</div>	
									
								</div>
						<?php endif; ?>
				</div>
			</div>						
<?php endwhile; ?>
<?php endif; ?>	


<?php get_footer(); ?>	