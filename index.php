<?php get_header(); ?>
<?php if (is_category()) : ?>
	<header class="section">
		<h1>Entradas publicadas en &ldquo;<?php single_cat_title(); ?>&rdquo;</h1>
	</header>
<?php elseif (is_tag()) : ?>
	<header class="section">
		<h1>Entradas etiquetadas como &ldquo;<?php single_tag_title(); ?>&rdquo;</h1>
	</header>
<?php elseif (is_search()) : ?>
	<header class="section">
		<h1>Resultados de la búsqueda</h1>
	</header>
<?php endif; ?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	 		<article class="post clearfix">
				<header>
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				</header>
				<aside class="meta">
					<p><time datetime="<?php the_time('c'); ?>" pubdate><i class="fa fa-calendar-o"></i> <?php the_time('j \d\e F \d\e Y'); ?></time></p>
					<p><i class="fa fa-folder"></i><?php the_category(', '); ?></p>
					<p><?php comments_popup_link('<i class="fa fa-comment-o"></i> Sin comentarios','<i class="fa fa-comment"></i> Un comentario','<i class="fa fa-comments"></i> % comentarios'); ?></p>
					<?php edit_post_link('<i class="fa fa-pencil-square-o"></i> Editar', '<p>', '</p>'); ?>
				</aside>
				<?php the_excerpt(); ?>
				<p class="alignRight">
					<a href="<?php the_permalink() ?>" class="readfull">Leer entrada completa</a>
				</p>
			</article>
	<?php endwhile; ?>
	<?php if (function_exists(pp_has_pagination) && pp_has_pagination()) : ?>
		<nav class="pages">
		<?php pp_the_pagination(); ?>
		<?php if (!pp_is_first_page()) { ?>
			<a href="/">Lo más reciente</a> 
		<?php } if (pp_has_previous_page()) { ?>
			<a href="<?php pp_the_previous_page_permalink(); ?>"><i class="fa fa-chevron-left"></i></a>
		<?php } pp_rewind_pagination(); ?>
		
		<?php while(pp_has_pagination()) { pp_the_pagination(); ?>
		<?php if (pp_is_current_page()) { ?>
			<span><?php pp_the_page_num(); ?></span>
		<?php } else { ?>
			<a href="<?php pp_the_page_permalink(); ?>"><?php pp_the_page_num(); ?></a>
		<?php } ?>
		<?php } pp_rewind_pagination(); ?>
		
		<?php pp_the_pagination(); if (pp_has_next_page()) { ?>
			<a href="<?php pp_the_next_page_permalink(); ?>"><i class="fa fa-chevron-right"></i></a>
		<?php } pp_rewind_pagination(); ?> 
		<?php if (!pp_is_last_page()) { ?>
			<a href="<?php pp_the_last_page_permalink(); ?>">Lo más antiguo</a> 
		<?php } ?>
		</nav>
	<?php endif; ?>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>