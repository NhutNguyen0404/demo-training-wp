<?php
function setup_meta_seo()
{
    /* Add meta boxes on the 'add_meta_boxes' hook. */
    add_action('add_meta_boxes', 'init_meta_seo_form');

    /* Save post meta on the 'save_post' hook. */
    add_action( 'save_post', 'save_meta_seo', 10, 2 );
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function init_meta_seo_form()
{
    add_meta_box(
        'smashing-post-meta-seo',      // Unique ID
        esc_html__('SEO INFO', 'example'),    // Title
        'create_form_meta_seo',   // Callback function
        'sanpham',         // Admin page (or post type)
        'normal',         // Context
        'default'         // Priority,
    );
}

/* Display the post meta box. */
function create_form_meta_seo($post)
{ ?>
    <?php wp_nonce_field(basename(__FILE__), 'smashing_post_class_nonce'); ?>

    <p>
        <label for="smashing-post-class"><?php _e("Title", 'example'); ?></label>
        <br />
        <input class="widefat" type="text" name="seo_title" id="smashing-post-class" value="<?php echo esc_attr(get_post_meta($post->ID, 'seo_title', true)); ?>" size="30" />
    </p>
    <p>
        <label for="smashing-post-class"><?php _e("Descriptions", 'example'); ?></label>
        <br />
        <input class="widefat" type="text" name="seo_descriptions" id="smashing-post-class" value="<?php echo esc_attr(get_post_meta($post->ID, 'seo_descriptions', true)); ?>" size="30" />
    </p>
    <p>
        <label for="smashing-post-class"><?php _e("Keywords", 'example'); ?></label>
        <br />
        <input class="widefat" type="text" name="seo_keywords" id="smashing-post-class" value="<?php echo esc_attr(get_post_meta($post->ID, 'seo_keywords', true)); ?>" size="30" />
    </p>
<?php }

/* Save the meta box’s post metadata. */
function save_meta_seo($post_id, $post)
{
    $meta_seo_keys = [
        'seo_title',
        'seo_descriptions',
        'seo_keywords',
    ];

    foreach ($meta_seo_keys as $meta_key) {
        save_meta_item($meta_key, $post_id, $post);
    }
}

function save_meta_item($meta_key, $post_id, $post)
{
    /* Get the post type object. */
    $post_type = get_post_type_object($post->post_type);

    /* Check if the current user has permission to edit the post. */
    if (!current_user_can($post_type->cap->edit_post, $post_id))
        return $post_id;

    /* Get the posted data and sanitize it for use as an HTML class. */
    $new_meta_value = (isset($_POST[$meta_key]) ? $_POST[$meta_key] : '');

    /* Get the meta value of the custom field key. */
    $meta_value = get_post_meta($post_id, $meta_key, true);

    /* If a new meta value was added and there was no previous value, add it. */
    if ($new_meta_value && '' == $meta_value)
        add_post_meta($post_id, $meta_key, $new_meta_value, true);

    /* If the new meta value does not match the old value, update it. */
    elseif ($new_meta_value && $new_meta_value != $meta_value)
        update_post_meta($post_id, $meta_key, $new_meta_value);

    /* If there is no new meta value but an old value exists, delete it. */
    elseif ('' == $new_meta_value && $meta_value)
        delete_post_meta($post_id, $meta_key, $meta_value);
}

function show_seo()
{
    global $post;
    if (isset($post))
    {
       echo '<title>'. get_post_meta($post->ID, 'seo_title', true) .'</title>
<meta name="keywords" content="'. get_post_meta($post->ID, 'seo_keywords', true) .'" />
<meta name="description" content="'. get_post_meta($post->ID, 'seo_descriptions', true) .'" />';
    }
}

add_action( 'load-post.php', 'setup_meta_seo');
add_action( 'load-post-new.php', 'setup_meta_seo');
add_action( 'wp_head', 'show_seo' );