<?php
/*
Template Name: Enlaces
*/
 get_header(); ?> 
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
			<article class="post clearfix">
				<header>
					<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				</header>
				<div class="column left">
					<?php wp_list_bookmarks('category=7&category_before=&category_after=&title_before=<h3>&title_after=</h3>'); ?>
				</div>
				<div class="column right">
					<?php wp_list_bookmarks('category=21,664&category_before=&category_after=&title_before=<h3>&title_after=</h3>'); ?>
				</div>
			</article>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>