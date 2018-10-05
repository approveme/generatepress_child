<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *  abu creating social widget 
 */
function approvme_register_social_widget() {
    register_widget('approveme_social_icon');
}

add_action('widgets_init', 'approvme_register_social_widget');

class approveme_social_icon extends WP_Widget {

    function __construct() {
        parent::__construct(
// widget ID
                'approveme_social_icon',
// widget name
                __('Approveme Social Icon Widget', 'approveme'),
// widget description
                array('description' => __('social icons', 'approvemea'),)
        );
    }

    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget'];
//if title is present
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];
//output

        include("custom-edit/social-icon.html");


        echo $args['after_widget'];
    }

    public function form($instance) {
        if (isset($instance['title']))
            $title = $instance['title'];
        else
            $title = __('Default Title', 'hstngr_widget_domain');
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

}

/**
 * Subscription form  sidebar 
 */
function approvme_register_signup_widget() {
    register_widget('approveme_sign_up');
}

add_action('widgets_init', 'approvme_register_signup_widget');

class approveme_sign_up extends WP_Widget {

    function __construct() {
        parent::__construct(
// widget ID
                'approveme_sign_up',
// widget name
                __('Approveme Sign UP Widget', 'approveme'),
// widget description
                array('description' => __('Sign up', 'approvemea'),)
        );
    }

    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget'];
//if title is present
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];
//output
        global $post;

        $newsletter_signup_meta = get_post_meta($post->ID, 'newsletter_signup_meta', true);
        $newsletter_signup_title = get_post_meta($post->ID, 'newsletter_signup_title', true);

        if (!empty($newsletter_signup_meta)) {
            echo "<form action='//approve.activehosted.com/proc.php' method='post' id='_form_367' accept-charset='utf-8' enctype='multipart/form-data'>
  <input type='hidden' name='f' value='367'>
  <input type='hidden' name='s' value=''>
  <input type='hidden' name='c' value='0'>
  <input type='hidden' name='m' value='0'>
  <input type='hidden' name='act' value='sub'>
  <input type='hidden' name='nlbox[]' value='25'>
<div id='featured_content'>
                    	<div id='featured_text'>
						<h2>Join <span class='list-callout'>3,000 $newsletter_signup_title</span> and get an original article once a week.</h2>
            <div class='emaillist_fields'>
			<input type='hidden' name='fullname' >

            <input type='email' name='email' class='subscribe_input' placeholder='Email Address:' >


            <input type='submit' class='subscribe_btn' value='Sign Up'>	
</div>
<div class='featured_tagline'>
						$newsletter_signup_meta
						</div>
</div>
</div>
</form>";
        }

        // Download Ebook Guide
        if (empty($newsletter_signup_meta)) {
            echo "<div id='featured_content_ebook'>
<div class='left-column'><img src='https://www.approveme.com/resources/ebooks/7-questions-to-ask-pdf-cover-232x300.png'></div>
<div class='right-column'>
<h3>7 Ways to Protect Yourself from Contracts That Aren’t Binding</h3>
<p>In this free guide, we'll outline seven practical things to look for when creating and sending contracts to your customers.</p>
<p><a class='cta' title='Free Download' href='https://www.approveme.com/free-ebook-digital-e-signature-is-it-legal/' target='_new'>Free Download</a></p>
</div>
</div>";
        }


        echo $args['after_widget'];
    }

    public function form($instance) {
        if (isset($instance['title']))
            $title = $instance['title'];
        else
            $title = __('Default Title', 'approveme');
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

}

/**
 *  Approve free guid widget 
 */
function approvme_register_freeguide_widget() {
    register_widget('approveme_free_guide');
}

add_action('widgets_init', 'approvme_register_freeguide_widget');

class approveme_free_guide extends WP_Widget {

    function __construct() {
        parent::__construct(
// widget ID
                'approveme_free_guide',
// widget name
                __('Approveme Free Guide Widget', 'approveme'),
// widget description
                array('description' => __('Free Guide', 'approve'),)
        );
    }

    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget'];
//if title is present
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];
//output
        global $post;

        $newsletter_signup_meta1 = get_post_meta(get_the_ID(), 'newsletter_signup_meta', true);
        $newsletter_signup_title1 = get_post_meta(get_the_ID(), 'newsletter_signup_title', true);
        if (!empty($newsletter_signup_meta1)) {

            echo "<div id='sidebar_content'>
                <div id='sidebar_guide_wrap'>
                        <div id='sidebar_text'>
                        <div class='featured_text'>Join 3,000 " . $newsletter_signup_title1 . " and get an original article once a week</div>
                      
                        <form action='//approve.activehosted.com/proc.php' method='post' id='_form_367' accept-charset='utf-8' enctype='multipart/form-data'>
  <input type='hidden' name='f' value='367'>
  <input type='hidden' name='s' value=''>
  <input type='hidden' name='c' value='0'>
  <input type='hidden' name='m' value='0'>
  <input type='hidden' name='act' value='sub'>
  <input type='hidden' name='nlbox[]' value='25'>
 
			<input type='hidden' name='fullname' >

            <input type='email' name='email' class='subscribe_input' placeholder='Email Address:' >
			
            <p align='center'><input type='submit' class='subscribe_btn' value='JOIN THE CLUB'></p>
        
</form>
</div><!-- Sidebar text -->
</div><!-- Sidebar_guide_wrap-->
</div><!-- Sidebar_content -->";
        } elseif (empty($newsletter_signup_meta1)) {
            echo "<div id='sidebar_content'>
                <div id='sidebar_guide_wrap'>
                        <div id='sidebar_text'>
                        <div class='featured_text'>Free Guide: 7 Ways to Protect Your Company from Contracts That Aren’t Binding</div>
                      
                        <form action='//approve.activehosted.com/proc.php' method='post' id='_form_253' accept-charset='utf-8' enctype='multipart/form-data'>
  <input type='hidden' name='f' value='253'>
  <input type='hidden' name='s' value=''>
  <input type='hidden' name='c' value='0'>
  <input type='hidden' name='m' value='0'>
  <input type='hidden' name='act' value='sub'>
  <input type='hidden' name='nlbox[]' value='17'>
 
            <input type='email' class='subscribe_input' placeholder='Email address:' name='email'>
            <p align='center'><input type='submit' class='subscribe_btn' value='SEND IT TO ME'></p>
        
</form>
</div><!-- Sidebar text -->
</div><!-- Sidebar_guide_wrap-->
</div><!-- Sidebar_content -->";


            echo $args['after_widget'];
        }
    }

    public function form($instance) {
        if (isset($instance['title']))
            $title = $instance['title'];
        else
            $title = __('Default Title', 'approveme');
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

}

/**
 *  registering a sidebar 
 */
register_sidebar(array(
    'id' => 'approveme-subscription-sidebar',
    'name' => __('Approveme Subscription Sidebar', "approveme"),
    'description' => __('This sidebar is located above Author section.', 'approveme'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
));
