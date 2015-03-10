<?php
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('¿Qué quieres ver, zagal? :D');
if ( post_password_required() ) { ?>
	<p>Esta entrada está protegida por contraseña...</p>
<?php return;
}
if (!empty($comments_by_type['comment'])) {?>
			<section id="comments">
				<header>
					<h2>Comentarios</h2>
				</header>
				<?php wp_list_comments('type=comment&callback=comentario');?>
				<nav class="pages">
					<?php previous_comments_link('<i class="fa fa-chevron-left"></i> Antiguos') ?>
					<?php next_comments_link('Recientes <i class="fa fa-chevron-right"></i>') ?>
				</nav>
			</section>
<?php }
if ('open'==$post->comment_status) { ?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				<h2>¿Tienes algo que decir?</h2>
				<div class="form">
				<?php if ( $user_ID ) {?>
					<p> 
						Has entrado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Salir de esta cuenta">Salir &raquo;</a>
					</p>
				<?php } else {?>
					<p>
						<label for="author">Nombre</label>
						<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1">
					</p>
					<p>
						<label for="email">E-mail (no será publicado)</label>
						<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2">
					</p>
					<p>
						<label for="url">Página web</label>
						<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3">
					</p>
				<?php } ?>
					<p>
						<label for="comment">Comentario</label>
						<textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea>
					</p>
					<p class="right">
						<input type="submit" tabindex="5" value="Enviar comentario" class="send">
					</p>
				</div>
				<?php do_action('comment_form', $post->ID); ?>
			</form>
<?php } ?>