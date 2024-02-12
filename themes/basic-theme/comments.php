<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area flexbox" =>

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ($comments_number === 1) {
                printf(_x('One Reply', 'comments title', 'your-theme-text-domain'));
            } else {
                printf(
                    _nx(
                        '%1$s Reply',
                        '%1$s Replies',
                        $comments_number,
                        'comments title',
                        'your-theme-text-domain'
                    ),
                    number_format_i18n($comments_number)
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 50,
            ));
            ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav id="comment-nav-below" class="comment-navigation" role="navigation">
                <div class="nav-previous"><?php previous_comments_link(__('Older Comments', 'your-theme-text-domain')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments', 'your-theme-text-domain')); ?></div>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'your-theme-text-domain'); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>

</div>
