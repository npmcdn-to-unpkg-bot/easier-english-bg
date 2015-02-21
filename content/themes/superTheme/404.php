<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<h1 class="entry-title">Оооопс ... нещо се счупи.</h1>
			<p>Страницата, която търсиш - не съществува :(</p>
			<p>Може би търсачката ще помогне:  </p>

			<?php get_search_form(); ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>