<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">

		<div id="content">

			<h1>Уроци по английски език</h1>
			<p><strong>EasierEnglish.BG</strong> е проект с <strong>уроци и упражнения за английската граматика</strong>, насочени към всички начинаещи и средно-напреднали в обучението си. При нас всичко е структурирано, подредено и обяснено на роден, български език.</p>
			<p><a href="http://easierenglish.bg/екипът-на-easier-english/" target="_blank">Екип от ентусиасти</a> инвестира свободно време в разработване на практични безплатни уроци. Над 10 000 българи ежемесечно учат английски език при нас!</p>

			<hr />

			<h2>Последни уроци:</h2>

			<?php if ( have_posts() ) : ?>
				<div class="articles_block">
				<?php
				/* Loop all posts: */
				while ( have_posts() ) : the_post();
					$category_detail = get_the_category( $post->ID );
					$category_ID = $category_detail[0]->cat_ID;

					echo "<div class='category-" . $category_ID . "'>";
					echo "<h2><a class='mainLinks' href='".get_permalink()."'>";
					echo the_title() . "</a></h2>";
					//echo "<span class='category-circle'>" . $category_detail[0]->name . "</span>";
					echo the_excerpt();
					echo "</div>";
				endwhile;

				twentytwelve_content_nav( 'nav-below' );
				?>
				</div>
			<?php else : ?>

			<article id="post-0" class="post no-results not-found">

			<?php if ( current_user_can( 'edit_posts' ) ) :
				// Show a different message to a logged-in user who can add posts.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'No posts to display', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'twentytwelve' ), admin_url( 'post-new.php' ) ); ?></p>
				</div><!-- .entry-content -->

			<?php else :
				// Show the default message to everyone else.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			<?php endif; // end current_user_can() check ?>

			</article><!-- #post-0 -->

		<?php endif; // end have_posts() check ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>