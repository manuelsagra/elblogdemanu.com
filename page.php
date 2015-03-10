<?php get_header(); ?> 
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
			<article class="page clearfix">
				<header>
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				</header>
				<aside class="meta">
					<p><time datetime="<?php the_time('c'); ?>" pubdate><i class="fa fa-calendar-o"></i> <?php the_time('j \d\e F \d\e Y'); ?></time></p>
					<p><?php comments_popup_link('<i class="fa fa-comment-o"></i> Sin comentarios','<i class="fa fa-comment"></i> Un comentario','<i class="fa fa-comments"></i> % comentarios'); ?></p>
				</aside>
				<?php the_content(); ?>
				<p class="share">
					Comparte esta página
					<a href="http://twitter.com/home?status=<?php the_title_attribute(); ?>%20<?php the_permalink() ?>" title="Twitter"><i class="fa fa-twitter"></i></a>
					<a href="https://plus.google.com/share?url=<?php the_permalink() ?>" title="Google+"><i class="fa fa-google-plus"></i></a>
					<a href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?php the_permalink() ?>&amp;p[images][0]=&amp;p[title]=<?php the_title_attribute(); ?>&amp;p[summary]=<?php the_excerpt(); ?>" title="Facebook"><i class="fa fa-facebook"></i></a>
				</p>
			</article>
	<?php endwhile; ?>
	<?php comments_template('', true); ?>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>