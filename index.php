<?php
/**
 * The main template file
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">

        <?php if (have_posts()) : ?>

            <?php if (is_home() && !is_front_page()) : ?>
                <header class="page-header">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header>
            <?php endif; ?>

            <div class="posts-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php
                            if (is_singular()) :
                                the_title('<h1 class="entry-title">', '</h1>');
                            else :
                                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                            endif;

                            if ('post' === get_post_type()) :
                                ?>
                                <div class="entry-meta">
                                    <?php
                                    printf(
                                        __('Posted on %s by %s', 'minimal-woo'),
                                        get_the_date(),
                                        get_the_author()
                                    );
                                    ?>
                                </div>
                            <?php endif; ?>
                        </header>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php
                            if (is_singular()) :
                                the_content();

                                wp_link_pages(array(
                                    'before' => '<div class="page-links">' . __('Pages:', 'minimal-woo'),
                                    'after'  => '</div>',
                                ));
                            else :
                                the_excerpt();
                                ?>
                                <a href="<?php echo esc_url(get_permalink()); ?>" class="read-more">
                                    <?php _e('Read More', 'minimal-woo'); ?>
                                </a>
                                <?php
                            endif;
                            ?>
                        </div>

                        <?php if (is_singular()) : ?>
                            <footer class="entry-footer">
                                <?php
                                $categories_list = get_the_category_list(', ');
                                if ($categories_list) {
                                    printf('<span class="cat-links">%s %s</span>', __('Categories:', 'minimal-woo'), $categories_list);
                                }

                                $tags_list = get_the_tag_list('', ', ');
                                if ($tags_list) {
                                    printf('<span class="tags-links">%s %s</span>', __('Tags:', 'minimal-woo'), $tags_list);
                                }
                                ?>
                            </footer>
                        <?php endif; ?>
                    </article>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if (is_singular() && (comments_open() || get_comments_number())) :
                        comments_template();
                    endif;
                    ?>

                <?php endwhile; ?>
            </div>

            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('Previous', 'minimal-woo'),
                'next_text' => __('Next', 'minimal-woo'),
            ));
            ?>

        <?php else : ?>

            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php _e('Nothing Found', 'minimal-woo'); ?></h1>
                </header>

                <div class="page-content">
                    <?php
                    if (is_home() && current_user_can('publish_posts')) :
                        printf(
                            '<p>' . __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'minimal-woo') . '</p>',
                            esc_url(admin_url('post-new.php'))
                        );
                    elseif (is_search()) :
                        ?>
                        <p><?php _e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'minimal-woo'); ?></p>
                        <?php
                        get_search_form();
                    else :
                        ?>
                        <p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'minimal-woo'); ?></p>
                        <?php
                        get_search_form();
                    endif;
                    ?>
                </div>
            </section>

        <?php endif; ?>

    </div>
</main>

<?php
get_footer();