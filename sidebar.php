			<aside class="links">
				<p><i class="fa fa-bookmark"></i> Destacados</p>
				<ul>
				<?php $posts = get_posts('category_name=destacados&numberposts=8&orderby=rand'); ?>
				<?php foreach ($posts as $post) : setup_postdata($post); ?>
					<li>
						<a rel="bookmark" href="<?php the_permalink(); ?>">
						<?php
							if (has_post_thumbnail()) :
								the_post_thumbnail();
							else : 
								echo '<img src="' . get_template_directory_uri() . '/img/destacado.png" alt="' . get_the_title() . '">';
							endif;
							the_title();
						?>
						</a>
					</li>
				<?php endforeach; ?>
				</ul>
			</aside>
