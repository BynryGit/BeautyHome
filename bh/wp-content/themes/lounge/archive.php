<?php get_header(); ?>
<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();

$sidebar = $qode_options_lounge['category_blog_sidebar'];
?>
	<div class="title <?php if($qode_options_lounge['title_background_image'] != ""){ echo 'has_background'; } ?>">	
		<div class="container">
			<div class="container_inner clearfix">
				<?php
				
					if (is_tag()):
					$title = single_term_title("", false)." Tag";
					 
					elseif (is_date()):
					$title = get_the_time('F Y');
					 
					elseif (is_author()):
					$title = "Author: ".get_the_author();
					 
					else:
					$title = _e('Archive','qode');
					
					endif;
				?>
				<h1><?php echo $title; ?></h1>
				<?php if (function_exists('qode_custom_breadcrumbs')) qode_custom_breadcrumbs(); ?>
			</div>
		</div>
	</div>
	
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
				<?php switch ($qode_options_lounge['blog_style']) {
									case 1: ?>
										<div class="posts_holder">
											<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<article <?php post_class(); ?>>
												<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
													<div class="image">
													
													<?php echo slider_blog(get_the_ID());?>	
													</div>
													<?php } else {?>
													<?php if ( has_post_thumbnail() ) { ?>
													<div class="image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														
																<?php the_post_thumbnail('blog-type-1-big'); ?>
														</a>
													</div>
													<?php } } ?>
												<div class="text">
													<div class="text_inner">
														
														<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
														<span class="create"><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
														<?php the_excerpt(); ?>
														<div class="info">
															<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
															<span class="right"><a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('Read More', 'qode'); ?></a></span>
														</div>
													</div>
												</div>
											</article>
												<?php endwhile; ?>
												<?php if($qode_options_lounge['pagination'] != "0") : ?>
												<?php pagination($wp_query->max_num_pages,$wp_query->max_num_pages, $paged); ?>
												<?php endif; ?>
										<?php else: //If no posts are present ?>
											<div class="entry">                        
													<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
										<?php endif; ?>
										</div>
									 <?php	break;
									case 2: ?>
										<div class="posts_holder2">
											<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<article <?php post_class(); ?>>
													
													<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
													<div class="image">
													
													<?php echo slider_blog(get_the_ID());?>	
													</div>
													<?php } else {?>
													<?php if ( has_post_thumbnail() ) { ?>
													<div class="image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														
																<?php	the_post_thumbnail('full'); ?>
														</a>
													</div>
													<?php } } ?>
													<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
													<div class="text">
														<div class="text_inner">
															<span class="date">
																<span class="number"><?php the_time('d'); ?></span>
																<span class="month"><?php the_time('M'); ?></span>
																<span class="year"><?php the_time('Y'); ?></span>
															</span>
															<span class="create">
																<?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?>
															</span>
															<div class="text_holder">
																<?php the_excerpt(); ?>
															</div>
														
														</div>
													</div>
													<div class="info">
															
													<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
													<span class="right"> <a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('Read More', 'qode'); ?></a></span>
													</div>
												</article>
											<?php endwhile; ?>
											<?php if($qode_options_lounge['pagination'] != "0") : ?>
												<?php pagination($wp_query->max_num_pages,$wp_query->max_num_pages, $paged); ?>
											<?php endif; ?>
										<?php else: //If no posts are present ?>
											<div class="entry">                        
													<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
										<?php endif; ?>
									</div>
									<?php	break;
									case 3: ?>
											<div class="posts_holder3 clearfix">
											<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<article <?php post_class(); ?>>
													<div class="article_inner">
														<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
															<div class="image">
																<?php echo slider_blog(get_the_ID());?>	
															</div>
														<?php } else {?>
															<?php if ( has_post_thumbnail() ) { ?>
																	<div class="image">
																		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
																		
																				<?php	the_post_thumbnail('blog-type-3-big'); ?>
																		</a>
																	</div>
														<?php } } ?>
														<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
														
														<div class="text">
															<div class="text_inner">
																<span class="create"><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
																<?php the_excerpt(); ?>
															</div>
														</div>
														<div class="info">
															<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
															<span class="right"> <a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('Read More', 'qode'); ?></a></span>
														</div>
													</div>
												</article>
												<?php endwhile; ?>
												<?php if($qode_options_lounge['pagination'] != "0") : ?>
												<?php pagination($wp_query->max_num_pages,$wp_query->max_num_pages, $paged); ?>
												<?php endif; ?>
											<?php else: //If no posts are present ?>
												<div class="entry">                        
														<p><?php _e('No posts were found.', 'qode'); ?></p>    
												</div>
											<?php endif; ?>
											</div>
									
									
									<?php	break;
									case 4: ?>
										<div class="posts_holder3 posts_holder3_v2 clearfix">
											<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<article <?php post_class(); ?>>
													<div class="article_inner">
														<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
															<div class="image">
																<?php echo slider_blog(get_the_ID());?>	
															</div>
														<?php } else {?>
															<?php if ( has_post_thumbnail() ) { ?>
																	<div class="image">
																		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
																		
																				<?php	the_post_thumbnail('blog-type-4-big'); ?>
																		</a>
																	</div>
														<?php } } ?>
														<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
														
														<div class="text">
															<div class="text_inner">
																<span class="create"><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
																<?php the_excerpt(); ?>
															</div>
														</div>
														<div class="info">
															<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
															<span class="right"> <a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('Read More', 'qode'); ?></a></span>
														</div>
													</div>
												</article>
												<?php endwhile; ?>
												<?php if($qode_options_lounge['pagination'] != "0") : ?>
												<?php pagination($wp_query->max_num_pages,$wp_query->max_num_pages, $paged); ?>
												<?php endif; ?>
											<?php else: //If no posts are present ?>
												<div class="entry">                        
														<p><?php _e('No posts were found.', 'qode'); ?></p>    
												</div>
											<?php endif; ?>
											</div>
									<?php	break;
									
									case 5: ?>
										<div class="posts_holder2">
											<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<article <?php post_class(); ?>>
													
													<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
													<div class="image">
													
													<?php echo slider_blog(get_the_ID());?>	
													</div>
													<?php } else {?>
													<?php if ( has_post_thumbnail() ) { ?>
													<div class="image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														
																<?php	the_post_thumbnail('full'); ?>
														</a>
													</div>
													<?php } } ?>
													<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
													<div class="text">
														<div class="text_inner">
															<span class="date">
																<span class="number"><?php the_time('d'); ?></span>
																<span class="month"><?php the_time('M'); ?></span>
																<span class="year"><?php the_time('Y'); ?></span>
															</span>
															<span class="create"><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
															<div class="text_holder">
																<?php the_content(); ?>
															</div>
														
														
														</div>
													</div>
													<div class="info">
															
													<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
													<span class="right"> <a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('Read More', 'qode'); ?></a></span>
													</div>
												</article>
											<?php endwhile; ?>
											<?php if($qode_options_lounge['pagination'] != "0") : ?>
											<?php pagination($wp_query->max_num_pages,$wp_query->max_num_pages, $paged); ?>
											<?php endif; ?>
										<?php else: //If no posts are present ?>
											<div class="entry">                        
													<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
										<?php endif; ?>
									</div>
								<?php	break;
									
							}
							
							?>
		<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
			<div class="<?php if($sidebar == "1"):?>two_columns_66_33<?php elseif($sidebar == "2") : ?>two_columns_75_25<?php endif; ?> clearfix">
						<div class="column1">
							<div class="column_inner">
									<?php switch ($qode_options_lounge['blog_style']) {
									case 1: ?>
										<div class="posts_holder">
											<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<article <?php post_class(); ?>>
												<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
													<div class="image">
														<?php echo slider_blog(get_the_ID());?>	
													</div>
												<?php } else {?>
													<?php if ( has_post_thumbnail() ) { ?>
													<div class="image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														<?php if($sidebar == 1) : ?>
															<?php	the_post_thumbnail('blog-type-1-small'); ?>
														<?php elseif($sidebar == 2) : ?>
															<?php	the_post_thumbnail('blog-type-1-medium'); ?>
														<?php endif; ?>
														</a>
													</div>
												
														<?php } } ?>
												<div class="text">
													<div class="text_inner">
														
														<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
														<span class="create"><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
														<?php the_excerpt(); ?>
														<div class="info">
															<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
															<span class="right"><a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('Read More', 'qode'); ?></a></span>
														</div>
													</div>
												</div>
											</article>
												<?php endwhile; ?>
												<?php if($qode_options_lounge['pagination'] != "0") : ?>
												<?php pagination($wp_query->max_num_pages,$wp_query->max_num_pages, $paged); ?>
												<?php endif; ?>
										<?php else: //If no posts are present ?>
											<div class="entry">                        
													<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
										<?php endif; ?>
										</div>
									 <?php	break;
									case 2: ?>
										<div class="posts_holder2">
											<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<article <?php post_class(); ?>>
													
													<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
													<div class="image">
													
													<?php echo slider_blog(get_the_ID());?>	
													</div>
													<?php } else {?>
													<?php if ( has_post_thumbnail() ) { ?>
													<div class="image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														
																<?php	the_post_thumbnail('full'); ?>
														</a>
													</div>
													<?php } } ?>
													<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
													<div class="text">
														<div class="text_inner">
															<span class="date">
																<span class="number"><?php the_time('d'); ?></span>
																<span class="month"><?php the_time('M'); ?></span>
																<span class="year"><?php the_time('Y'); ?></span>
															</span>
															<span class="create">
																<?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?>
															</span>
															<div class="text_holder">
																<?php the_excerpt(); ?>
															</div>
														
														
														</div>
													</div>
													<div class="info">
															
													<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
													<span class="right"> <a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('Read More', 'qode'); ?></a></span>
													</div>
												</article>
											<?php endwhile; ?>
											<?php if($qode_options_lounge['pagination'] != "0") : ?>
											<?php pagination($wp_query->max_num_pages,$wp_query->max_num_pages, $paged); ?>
											<?php endif; ?>
										<?php else: //If no posts are present ?>
											<div class="entry">                        
													<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
										<?php endif; ?>
									</div>
									<?php	break;
									case 3: ?>
											<div class="posts_holder3 clearfix">
											<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<article <?php post_class(); ?>>
													<div class="article_inner">
													
														<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
													<div class="image">
														<?php echo slider_blog(get_the_ID());?>	
													</div>
												<?php } else {?>
													<?php if ( has_post_thumbnail() ) { ?>
													<div class="image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														<?php if($sidebar == 1) : ?>
															<?php	the_post_thumbnail('blog-type-3-small'); ?>
														<?php elseif($sidebar == 2) : ?>
															<?php	the_post_thumbnail('blog-type-3-medium'); ?>
														<?php endif; ?>
														</a>
													</div>
												
														<?php } } ?>
														<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
														
														<div class="text">
															<div class="text_inner">
																<span class="create"><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
																<?php the_excerpt(); ?>
															</div>
														</div>
														<div class="info">
															<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
															<span class="right"> <a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('Read More', 'qode'); ?></a></span>
														</div>
													</div>
												</article>
												<?php endwhile; ?>
												<?php if($qode_options_lounge['pagination'] != "0") : ?>
												<?php pagination($wp_query->max_num_pages,$wp_query->max_num_pages, $paged); ?>
												<?php endif; ?>
											<?php else: //If no posts are present ?>
												<div class="entry">                        
														<p><?php _e('No posts were found.', 'qode'); ?></p>    
												</div>
											<?php endif; ?>
											</div>
									
									
									<?php	break;
									case 4: ?>
										<div class="posts_holder3 posts_holder3_v2 clearfix">
											<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<article <?php post_class(); ?>>
													<div class="article_inner">
													<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
													<div class="image">
														<?php echo slider_blog(get_the_ID());?>	
													</div>
												<?php } else {?>
													<?php if ( has_post_thumbnail() ) { ?>
													<div class="image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														<?php if($sidebar == 1) : ?>
															<?php	the_post_thumbnail('blog-type-4-small'); ?>
														<?php elseif($sidebar == 2) : ?>
															<?php	the_post_thumbnail('blog-type-4-medium'); ?>
														<?php endif; ?>
														</a>
													</div>
												
														<?php } } ?>
														<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
														
														<div class="text">
															<div class="text_inner">
																<span class="create"><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
																<?php the_excerpt(); ?>
															</div>
														</div>
														<div class="info">
															<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
															<span class="right"> <a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('Read More', 'qode'); ?></a></span>
														</div>
													</div>
												</article>
												<?php endwhile; ?>
												<?php if($qode_options_lounge['pagination'] != "0") : ?>
												<?php pagination($wp_query->max_num_pages,$wp_query->max_num_pages, $paged); ?>
												<?php endif; ?>
											<?php else: //If no posts are present ?>
												<div class="entry">                        
														<p><?php _e('No posts were found.', 'qode'); ?></p>    
												</div>
											<?php endif; ?>
											</div>
									<?php	break;
									
									case 5: ?>
										<div class="posts_holder2">
											<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<article <?php post_class(); ?>>
													
													<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
													<div class="image">
													
													<?php echo slider_blog(get_the_ID());?>	
													</div>
													<?php } else {?>
													<?php if ( has_post_thumbnail() ) { ?>
													<div class="image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														
																<?php	the_post_thumbnail('full'); ?>
														</a>
													</div>
													<?php } } ?>
													<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
													<div class="text">
														<div class="text_inner">
															<span class="date">
																<span class="number"><?php the_time('d'); ?></span>
																<span class="month"><?php the_time('M'); ?></span>
																<span class="year"><?php the_time('Y'); ?></span>
															</span>
															<span class="create"><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
															<div class="text_holder">
																<?php the_content(); ?>
															</div>
														
														
														</div>
													</div>
													<div class="info">
															
													<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
													<span class="right"> <a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('Read More', 'qode'); ?></a></span>
													</div>
												</article>
											<?php endwhile; ?>
											<?php if($qode_options_lounge['pagination'] != "0") : ?>
											<?php pagination($wp_query->max_num_pages,$wp_query->max_num_pages, $paged); ?>
											<?php endif; ?>
										<?php else: //If no posts are present ?>
											<div class="entry">                        
													<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
										<?php endif; ?>
									</div>
								<?php	break;
							}
							
							?>		
							</div>
						</div>
						<div class="column2">
						<?php get_sidebar(); ?>	
						</div>
					</div>
		<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
			<div class="<?php if($sidebar == "3"):?>two_columns_33_66<?php elseif($sidebar == "4") : ?>two_columns_25_75<?php endif; ?> clearfix">
						<div class="column1">
						<?php get_sidebar(); ?>	
						</div>
						<div class="column2">
							<div class="column_inner">
									<?php switch ($qode_options_lounge['blog_style']) {
									case 1: ?>
										<div class="posts_holder">
											<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<article <?php post_class(); ?>>
												<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
													<div class="image">
														<?php echo slider_blog(get_the_ID());?>	
													</div>
												<?php } else {?>
													<?php if ( has_post_thumbnail() ) { ?>
													<div class="image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														<?php if($sidebar == 3) : ?>
															<?php	the_post_thumbnail('blog-type-1-small'); ?>
														<?php elseif($sidebar == 4) : ?>
															<?php	the_post_thumbnail('blog-type-1-medium'); ?>
														<?php endif; ?>
														</a>
													</div>
												
														<?php } } ?>
												<div class="text">
													<div class="text_inner">
														
														<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
														<span class="create"><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
														<?php the_excerpt(); ?>
														<div class="info">
															<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
															<span class="right"><a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('Read More', 'qode'); ?></a></span>
														</div>
													</div>
												</div>
											</article>
												<?php endwhile; ?>
												<?php if($qode_options_lounge['pagination'] != "0") : ?>
												<?php pagination($wp_query->max_num_pages,$wp_query->max_num_pages, $paged); ?>
												<?php endif; ?>
											<?php else: //If no posts are present ?>
												<div class="entry">                        
														<p><?php _e('No posts were found.', 'qode'); ?></p>    
												</div>
											<?php endif; ?>
										</div>
									 <?php	break;
									case 2: ?>
										<div class="posts_holder2">
											<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<article <?php post_class(); ?>>
													
													<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
													<div class="image">
													
													<?php echo slider_blog(get_the_ID());?>	
													</div>
													<?php } else {?>
													<?php if ( has_post_thumbnail() ) { ?>
													<div class="image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														
																<?php	the_post_thumbnail('full'); ?>
														</a>
													</div>
													<?php } } ?>
													<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
													<div class="text">
														<div class="text_inner">
															<span class="date">
																<span class="number"><?php the_time('d'); ?></span>
																<span class="month"><?php the_time('M'); ?></span>
																<span class="year"><?php the_time('Y'); ?></span>
															</span>
															<span class="create">
																<?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?>
															</span>
															<div class="text_holder">
																<?php the_excerpt(); ?>
															</div>
														
														
														</div>
													</div>
													<div class="info">
															
													<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
													<span class="right"> <a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('Read More', 'qode'); ?></a></span>
													</div>
												</article>
											<?php endwhile; ?>
											<?php if($qode_options_lounge['pagination'] != "0") : ?>
												<?php pagination($wp_query->max_num_pages,$wp_query->max_num_pages, $paged); ?>
											<?php endif; ?>
										<?php else: //If no posts are present ?>
											<div class="entry">                        
													<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
										<?php endif; ?>
									</div>
									<?php	break;
									case 3: ?>
											<div class="posts_holder3 clearfix">
											<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<article <?php post_class(); ?>>
													<div class="article_inner">
													
														<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
													<div class="image">
														<?php echo slider_blog(get_the_ID());?>	
													</div>
												<?php } else {?>
													<?php if ( has_post_thumbnail() ) { ?>
													<div class="image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														<?php if($sidebar == 3) : ?>
															<?php	the_post_thumbnail('blog-type-3-small'); ?>
														<?php elseif($sidebar == 4) : ?>
															<?php	the_post_thumbnail('blog-type-3-medium'); ?>
														<?php endif; ?>
														</a>
													</div>
												
														<?php } } ?>
														<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
														
														<div class="text">
															<div class="text_inner">
																<span class="create"><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
																<?php the_excerpt(); ?>
															</div>
														</div>
														<div class="info">
															<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
															<span class="right"> <a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('Read More', 'qode'); ?></a></span>
														</div>
													</div>
												</article>
												<?php endwhile; ?>
												<?php if($qode_options_lounge['pagination'] != "0") : ?>
												<?php pagination($wp_query->max_num_pages,$wp_query->max_num_pages, $paged); ?>
												<?php endif; ?>
											<?php else: //If no posts are present ?>
												<div class="entry">                        
														<p><?php _e('No posts were found.', 'qode'); ?></p>    
												</div>
											<?php endif; ?>
											</div>
									
									
									<?php	break;
									case 4: ?>
										<div class="posts_holder3 posts_holder3_v2 clearfix">
											<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<article <?php post_class(); ?>>
													<div class="article_inner">
													<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
													<div class="image">
														<?php echo slider_blog(get_the_ID());?>	
													</div>
												<?php } else {?>
													<?php if ( has_post_thumbnail() ) { ?>
													<div class="image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														<?php if($sidebar == 3) : ?>
															<?php	the_post_thumbnail('blog-type-4-small'); ?>
														<?php elseif($sidebar == 4) : ?>
															<?php	the_post_thumbnail('blog-type-4-medium'); ?>
														<?php endif; ?>
														</a>
													</div>
												
														<?php } } ?>
														<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
														
														<div class="text">
															<div class="text_inner">
																<span class="create"><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
																<?php the_excerpt(); ?>
															</div>
														</div>
														<div class="info">
															<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
															<span class="right"> <a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('Read More', 'qode'); ?></a></span>
														</div>
													</div>
												</article>
												<?php endwhile; ?>
												<?php if($qode_options_lounge['pagination'] != "0") : ?>
												<?php pagination($wp_query->max_num_pages,$wp_query->max_num_pages, $paged); ?>
												<?php endif; ?>
											<?php else: //If no posts are present ?>
												<div class="entry">                        
														<p><?php _e('No posts were found.', 'qode'); ?></p>    
												</div>
											<?php endif; ?>
											</div>
									<?php	break;
									
									case 5: ?>
										<div class="posts_holder2">
											<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<article <?php post_class(); ?>>
													
													<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
													<div class="image">
													
													<?php echo slider_blog(get_the_ID());?>	
													</div>
													<?php } else {?>
													<?php if ( has_post_thumbnail() ) { ?>
													<div class="image">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														
																<?php	the_post_thumbnail('full'); ?>
														</a>
													</div>
													<?php } } ?>
													<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
													<div class="text">
														<div class="text_inner">
															<span class="date">
																<span class="number"><?php the_time('d'); ?></span>
																<span class="month"><?php the_time('M'); ?></span>
																<span class="year"><?php the_time('Y'); ?></span>
															</span>
															<span class="create"><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
															<div class="text_holder">
																<?php the_content(); ?>
															</div>
														
														
														</div>
													</div>
													<div class="info">
															
													<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( __('no comments','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></span>
													<span class="right"> <a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('Read More', 'qode'); ?></a></span>
													</div>
												</article>
											<?php endwhile; ?>
											<?php if($qode_options_lounge['pagination'] != "0") : ?>
											<?php pagination($wp_query->max_num_pages,$wp_query->max_num_pages, $paged); ?>
											<?php endif; ?>
										<?php else: //If no posts are present ?>
											<div class="entry">                        
													<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
										<?php endif; ?>
									</div>
								<?php	break;
									
							}
							
							?>		
							</div>
						</div>
						
					</div>
		<?php endif; ?>
	
	</div>
</div>
<?php get_footer(); ?>