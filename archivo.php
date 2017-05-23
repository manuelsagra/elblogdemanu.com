<?php
/*
Template Name: Archivo
*/
 get_header(); ?> 
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
			<article class="post clearfix">
				<header>
					<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				</header>
				<form method="get" action="http://www.google.es/search">
					<input type="hidden" name="ie" value="UTF-8">
					<input type="hidden" name="oe" value="UTF-8">
					<input type="hidden" name="domains" value="http://elblogdemanu.com/">
					<input type="hidden" name="sitesearch" value="http://elblogdemanu.com/">
					<table>
						<tr>
							<td>
								<a href="http://www.google.es/">
									<img SRC="http://www.google.com/logos/Logo_40wht.gif" alt="Google">
								</a>
							</td>
							<td>
								<input type="text" name="q" size="31" maxlength="255" value="">
								<input type="submit" name="btnG" VALUE="Buscar">
							</td
						</tr>
					</table>
				</form>
				<h3>Por meses</h3>
				<ul class="archive">
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
				<h3>Por etiquetas</h3>
				<ul class="tagcloud">
					<?php wp_tag_cloud('smallest=0.7&largest=2.5&unit=em'); ?>
				</ul>
			</article>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>