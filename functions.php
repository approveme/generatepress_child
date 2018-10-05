<?php

/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file. 
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */
function generatepress_child_enqueue_scripts() {
    if (is_rtl()) {
        wp_enqueue_style('generatepress-rtl', trailingslashit(get_template_directory_uri()) . 'rtl.css');
    }
}

add_action('wp_enqueue_scripts', 'generatepress_child_enqueue_scripts', 100);

function wpb_author_info_box($content) {

    global $post;

// Detect if it is a single post with a post author
    if (is_single() && isset($post->post_author)) {

// Get author's display name 
        $display_name = get_the_author_meta('display_name', $post->post_author);

// If display name is not available then use nickname as display name
        if (empty($display_name))
            $display_name = get_the_author_meta('nickname', $post->post_author);

// Get author's biographical information or description
        $user_description = get_the_author_meta('user_description', $post->post_author);

// Get author's website URL 
        $user_website = get_the_author_meta('url', $post->post_author);

// Get link to the author archive page
        $user_posts = get_author_posts_url(get_the_author_meta('ID', $post->post_author));

        if (!empty($display_name))
            $author_details = '<p class="author_name"></p>';

        if (!empty($user_description))
// Author avatar and bio
            $author_details .= '<div class="author_details_section">' . get_avatar(get_the_author_meta('user_email'), 90) . '<p class="author_details"><a href="' . $user_website . '" target="_blank" rel="nofollow">' . $display_name . '</a> ' . nl2br($user_description) . '</p></div>';;

        $author_details .= '<p class="author_links"><a href="' . $user_posts . '">( View all posts by ' . $display_name . ' )</a>';

// Pass all this info to post content  
        $content = $content . '<footer class="author_bio_section" >' . $author_details . '</footer>';
    }
    echo $content;
}

// Add author info function to the post content filter 
add_action('generate_after_entry_content', 'wpb_author_info_box');

// Allow HTML in author bio section 
remove_filter('pre_user_description', 'wp_filter_kses');


// Add custom sidebar
include("custom-sidebar.php");