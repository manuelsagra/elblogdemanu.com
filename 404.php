<?php get_header(); ?> 
			<article class="page clearfix">
				<header>
					<h1>¡Ooops! No he encontrado lo que buscas</h1>
				</header>
				<img class="derecha" src="<?php bloginfo('template_directory'); ?>/img/homer.png" alt="Doh!" title="Do'h!">
				<p>Pero no desesperes, es posible que se haya movido a otro sitio, o que veas algo interesante por aquí:</p>
				<ul>
					<li>Si estás viendo esto en un monitor grande, a la derecha de Homer aparecen algunas de las entradas que más me gustan en el blog. A lo mejor a ti también te gustan...</li>
					<li>En el <a href="/archivo/">archivo</a> puedes llegar a los contenidos publicados organizados por fecha, y etiquetas.</li>
					<li>O quizás en la <a href="/">página principal</a> encuentres algo interesante.</li>
				</ul>
				<p>Y si no, Google quizás te ayude:</p>
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
			</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>