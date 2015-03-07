<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
            <?php the_post_thumbnail(); ?>
            <?php endif; ?>

            <div class="inside_articleBox article_info_wrapper group">
                <?php
                    $author_email = md5( strtolower( trim( get_post_meta( $post->ID, 'articleAuthor', true ) ) ) );

                    //With Google+ API:
                    $author_id = str_replace("https://plus.google.com/", "", get_the_author_meta( $field = 'googleplus' ));
                    $google_profile_json = file_get_contents("https://www.googleapis.com/plus/v1/people/" . $author_id . "?fields=image&key=AIzaSyCj4CItxsT4pF15t3BOk86bK8r5LyglyQg");
                    $google_profile_json = json_decode($google_profile_json, true);
                    $image_url = $google_profile_json["image"]["url"];

                    if (isset($image_url)) {
                        $image_url = str_replace("sz=50", "sz=240", $image_url);
                    } else {
                        $image_url = "http://www.gravatar.com/avatar/" . $author_email . "?s=240";
                    }

                    $author_info = file_get_contents( 'http://www.gravatar.com/' . $author_email . '.php' );
                    $author_profile = unserialize( $author_info );

                    if ( is_array( $author_profile ) && isset( $author_profile['entry'] ) ) {
                        $author_profile = $author_profile['entry'][0];
                        for ($i = 0; i < count($author_profile['accounts']); $i++ ){
                            if($author_profile['accounts'][$i]["domain"] == "linkedin.com"){
                                $author_linkedin = $author_profile['accounts'][$i]["url"];
                                break;
                            }
                        }
                    }

                    //If it's not set, use Wordpress API:
                    if (!isset($author_linkedin)) {
                        $author_linkedin = get_the_author_meta( $field = 'user_url' );
                    }
                    $author_name = get_the_author_meta( $field = 'first_name' ) . " " . get_the_author_meta( $field = 'last_name' );
                ?>
                <?php if( isset($author_linkedin) ) echo '<a href='. $author_linkedin . ' target="_blank">'; ?>
                <img src="<?= $image_url ?>" class="article-author" height="80" width="80" alt="<?= $author_name; ?>" />
                <?php if( isset($author_linkedin) ) echo '</a>'; ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="reading-time">
                ... за прочитане си отдели около: <span class="info_value"><?php echo get_post_meta( $post->ID, 'completionTime', true ); ?> минути</span>
                </div>

                <?php
                    $enableExam =  get_post_meta( $post->ID, 'enableExam', true );
                    if ( $enableExam == "true" ) {
                ?>
                    <button id="start_exam" class="slim_button startExam">Стартирай упражнение</button>
                <?php
                    }
                ?>

                <div class="item_header_group" style="display: none;">Ниво на трудност: <span class="info_value"><?php echo get_post_meta( $post->ID, 'difficultyLevel', true ); ?></span></div>
            </div>
        </header>

        <div id="post_mainContent" class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
        </div><!-- .entry-content -->
        <footer class="entry-meta">
            <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>

            <?php if (strlen(get_the_author_meta('description')) > 0) { ?>
                <div class="author-card group">
                    <?php if( isset($author_linkedin) ) echo '<a class="profile-image-link" title="'. $author_name .' в LinkedIn" href='. $author_linkedin . ' target="_blank">'; ?>
                    <img src="<?= $image_url ?>" class="author-image left" height="120" width="120" alt="<?= $author_name; ?>" />
                    <?php if( isset($author_linkedin) ) echo '<span class="personal_linked">'. $author_name .' в LinkedIn</span>'; ?>
                    <?php if( isset($author_linkedin) ) echo '</a>'; ?>
                    <?php
                        $author_posts = get_the_author_posts();
                        if ( intval($author_posts) == 1){
                            $author_posts .= " урок";
                        } else {
                            $author_posts .= " урока";
                        }
                    ?>
                    <h5><?= get_the_author() . ", <a target='_blank' href=" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . ">" . $author_posts . "</a>"; ?></h5>
                    <p><?= get_the_author_meta('description'); ?></p>
                </div>
            <?php } ?>

            <div class="post_updated">
                Урокът е последно обновен на <span class="date updated"><?php the_modified_date(); ?></span> от <span class="vcard author"><?php the_author_posts_link(); ?></span>
            </div>

            <?php
                $category_data = get_the_category($post->ID);
                $category_ID = $category_data[0]->term_id;
                $category_name = $category_data[0]->name;
                $category_count = $category_data[0]->count;

                if ($category_count > 1) { ?>
                    <br />
                    <h4>Още уроци от категорията: <?php echo $category_name; ?></h4>
                    <ul class="more-posts-below">
                        <?php
                            $args = array( 'posts_per_page' => 5, 'offset'=> 1, 'category' => $category_ID );

                            $myposts = get_posts( $args );
                            foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </li>
                            <?php endforeach;
                            wp_reset_postdata();
                        ?>
                    </ul>
            <?php } ?>

        </footer><!-- .entry-meta -->
    </article><!-- #post -->
