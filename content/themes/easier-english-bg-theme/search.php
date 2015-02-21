<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header" style="padding-bottom: 0;">
				Резултати от търсенето за:<h1 class="search-title page-title"><?php printf( __( '%s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>

			<?php twentytwelve_content_nav( 'nav-above' ); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php twentytwelve_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="search-title entry-title"><?php _e( 'Не намерихме нищо :(', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Опитай с <strong>друга ключова дума или фраза</strong>, а ако нещо наистина липсва ни изпрати <button id="fireLessonRequest_form" class="slim_button"><span class="lesson_request">❤</span> Молба за урок!</button> ', 'twentytwelve' ); ?></p>
				
					<form id="LessonResuestForm" class="contactsForm">
						Да, все още има доста липсващи уроци, но <strong>с нашите партньори усилено работим по въпроса :)</strong><br /> Изпрати ни твоето предложение за урок, ще се постараем да го осъществим!
						<div class="group">
						<p class="contact-name"><input id="request_contact_name" type="text" name="request_contact_name" placeholder="Твоето име..." size="30" value=""></p>
						<p class="contact-email"><input id="request_contact_email" type="email" name="request_contact_email" placeholder="... твоят e-mail (за да се свържем с теб)" size="30" value=""></p>
						</div>
						<p><textarea id="request_message" name="request_message" placeholder="Искам урок за ..." rows="4"></textarea></p>
						<p><button id="submit_lessonRequestForm">Изпрати!</button></p>
					</form>	
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>