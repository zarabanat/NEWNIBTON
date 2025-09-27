<?php
/**
 * The template for displaying archive pages
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">

        <?php if (have_posts()) : ?>

            <header class="page-header">
                <?php
                the_archive_title('<h1 class="page-title">', '</h1>');
                the_archive_description('<div class="archive-description">', '</div>');
                ?>
            </header>

            <div class="posts-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>

                            <?php if ('post' === get_post_type()) : ?>
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
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                            <a href="<?php echo esc_url(get_permalink()); ?>" class="read-more">
                                <?php _e('Read More', 'minimal-woo'); ?>
                            </a>
                        </div>
                    </article>

                <?php endwhile; ?>
            </div>

            <?php
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('&larr; Previous', 'minimal-woo'),
                'next_text' => __('Next &rarr;', 'minimal-woo'),
            ));
            ?>

        <?php else : ?>

            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php _e('Nothing Found', 'minimal-woo'); ?></h1>
                </header>

                <div class="page-content">
                    <p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'minimal-woo'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </section>

        <?php endif; ?>

    </div>
</main>

<?php
get_footer();