<?php
/**
 * The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

    <section id="primary" class="site-content">
        <div id="content" role="main" class="categories">

        <?php if ( have_posts() ) : ?>
            <header class="archive-header">
                Категория: <h1 class="archive-title"><?php printf( __( '%s', 'twentytwelve' ), single_cat_title( '', false ) ); ?></h1>

            <?php if ( category_description() ) : // Show an optional category description ?>
                <!-- <div class="archive-meta"><?php echo category_description(); ?></div> -->
            <?php endif; ?>

                <div class="category_info_wrapper group">
                    <?php
                        $args = array(
                            'category_name' => single_cat_title( '', false ),
                            'showposts' => -1,
                            'caller_get_posts' => 1
                        );
                        $posts_count=get_posts($args);
                        $posts_count = count($posts_count);
                        if ( $posts_count > 1 ){
                            $posts_count = $posts_count . " урока";
                        } else {
                            $posts_count =  $posts_count . " урок";
                        }
                    ?>
                    Общо в категорията: <span class="info_value"><?= $posts_count; ?> :)</span>

                    <div class="item_group">Липсва нещо: <button id="fireLessonRequest_form" class="slim_button"><span class="lesson_request">❤</span> Молба за урок!</button></div>


                    <form id="LessonResuestForm" class="contactsForm">
                        Да, все още има доста липсващи уроци, но <strong>с нашите партньори усилено работим по въпроса :)</strong><br /> Изпрати ни твоето предложение за урок, ще се постараем да го осъществим!
                        <div class="group">
                        <p class="contact-name"><input id="request_contact_name" type="text" name="request_contact_name" placeholder="Твоето име..." size="30" value=""></p>
                        <p class="contact-email"><input id="request_contact_email" type="email" name="request_contact_email" placeholder="... твоят e-mail (за да се свържем с теб)" size="30" value=""></p>
                        </div>
                        <p><textarea id="request_message" name="request_message" placeholder="Искам урок за ..." rows="4"></textarea></p>
                        <p><button id="submit_lessonRequestForm">Изпрати!</button></p>
                    </form>                 

                </div>

            </header><!-- .archive-header -->

            <?php
            /* Start the Loop */
            while ( have_posts() ) : the_post();
                echo "<h2><a class='mainLinks' href='".get_permalink()."'>";
                echo the_title()."</a></h2>";
                echo the_excerpt();
            endwhile;

            twentytwelve_content_nav( 'nav-below' );
            ?>

        <?php else : ?>
            <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>

        </div><!-- #content -->
    </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>