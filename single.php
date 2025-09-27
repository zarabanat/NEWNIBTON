<?php
/**
 * The template for displaying all single posts
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">

        <?php
        while (have_posts()) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

                    <div class="entry-meta">
                        <?php
                        printf(
                            __('Posted on %s by %s', 'minimal-woo'),
                            get_the_date(),
                            '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . get_the_author() . '</a>'
                        );
                        ?>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Pages:', 'minimal-woo'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <footer class="entry-footer">
                    <?php
                    $categories_list = get_the_category_list(', ');
                    if ($categories_list) {
                        printf('<div class="cat-links"><strong>%s</strong> %s</div>', __('Categories:', 'minimal-woo'), $categories_list);
                    }

                    $tags_list = get_the_tag_list('', ', ');
                    if ($tags_list) {
                        printf('<div class="tags-links"><strong>%s</strong> %s</div>', __('Tags:', 'minimal-woo'), $tags_list);
                    }
                    ?>
                </footer>

                <?php
                // Post navigation
                the_post_navigation(array(
                    'prev_text' => __('&larr; Previous Post', 'minimal-woo'),
                    'next_text' => __('Next Post &rarr;', 'minimal-woo'),
                ));
                ?>
            </article>

            <?php
            // If comments are open or we have at least one comment, load up the comment template
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        <?php endwhile; ?>

    </div>
</main>

<?php
get_footer();