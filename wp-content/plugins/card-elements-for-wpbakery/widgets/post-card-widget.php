<?php
/**
 * Display Post Card layout element
 * 
 * @version 1.0
 * @since 1.0 
 **/
function cewb_post_card_shortcode($atts, $content = null, $shortcode_handle = '') {
    $default_atts = array(
        'cewb_post_card_style' => 'post-card-style-1',
        'cewb_post_columns' => '3',
        'cewb_number_of_post' => 6,
        'cewb_image_size' => 'thumbnail',
        'cewb_show_title' => 'true',
        'cewb_post_title_html_tag' => 'h2',
        'cewb_show_excerpt' => 'true',
        'cewb_post_excerpt_length' => '25',
        'cewb_post_excerpt_from' => 'content',
        'cewb_show_read_more' => 'false',
        'cewb_post_read_more_text' => '',
        'cewb_show_meta_data' => 'true',
        'cewb_meta_data' => 'author,date,comments,tags,category',
        'cewb_post_order_by' => 'post_date',
        'cewb_post_sort_by' => 'asc',
        'cewb_post_card_grid_gap' => '10',
        'cewb_post_card_rows_gap' => '0',
        'cewb_post_layout_alignment' => 'left',
        'cewb_post_layout_image_border_radius' => '0',
        'cewb_post_layout_image_overlay' => '',
        'cewb_post_layout_category_background_overlay' => '#e74c3c',
        'cewb_post_layout_date_background_color' => '#e74c3c',
        'cewb_post_layout_content_box_background_color' => '',
        'cewb_post_layout_content_date_color' => '',
        'cewb_post_layout_content_category_color' => '',
        'cewb_post_layout_content_category_hover_color' => '',
        'cewb_post_layout_content_category_spacing' => '',
        'cewb_post_layout_content_title_color' => '',
        'cewb_post_layout_content_title_hover_color' => '',
        'cewb_post_layout_content_title_spacing' => '',
        'cewb_post_layout_content_excerpt_color' => '',
        'cewb_post_layout_content_excerpt_spacing' => '',
        'cewb_post_layout_content_read_more_color' => '',
        'cewb_post_layout_content_meta_icon_color' => '',
        'cewb_post_layout_content_meta_text_color' => '',
        'cewb_post_layout_content_meta_spacing' => '',
        'cewb_post_layout_category_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_post_layout_title_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_post_layout_excerpt_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_post_layout_read_more_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_post_layout_meta_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_post_layout_date_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal'
    );

    $atts = shortcode_atts($default_atts, $atts);
    foreach ($atts as $sl_key => $sl_value){
        //remove unwanted ” & ″
        $atts[$sl_key] = str_replace(array('″','”'), '', html_entity_decode($sl_value));
    }   

    //extract for make value of here key
    extract($atts);

    ob_start();

    $card_style = $cewb_post_card_style;
    if ($cewb_post_columns == "1") {
        $column = "vc_col-sm-12";
    } else if ($cewb_post_columns == "2") {
        $column = "vc_col-sm-6";
    } else if ($cewb_post_columns == "3") {
        $column = "vc_col-sm-4";
    } else if ($cewb_post_columns == "4") {
        $column = "vc_col-sm-3";
    } else if ($cewb_post_columns == "6") {
        $column = "vc_col-sm-2";
    }

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $cewb_number_of_post,
        'post_status' => 'publish',
        'orderby' => $cewb_post_order_by,
        'order' => $cewb_post_sort_by
    );
    
    //for uniq global class
    $custom_uniq_class = rand(9712 , 205553);

    //$blog_posts = new \WP_Query($args);
    $blog_posts = new WP_Query($args);
    if ($blog_posts->have_posts()) :
        ?>
        <div class="vc_grid-container-wrapper vc_clearfix <?php // echo $css_class; ?>" style='<?php $cewb_post_card_design_options ?>' >
            <div class="vc_grid-container vc_clearfix wpb_content_element vc_basic_grid">
                <div class="vc_pageable-slide-wrapper vc_clearfix">
                    <?php
                    while ($blog_posts->have_posts()) : $blog_posts->the_post();
                        if ($cewb_post_card_style == 'post-card-style-1') {
                            include CEWB_DIR . 'include/post-card/wpbakery-post-card-1.php';
                        } else if ($cewb_post_card_style == 'post-card-style-2') {
                            include CEWB_DIR . 'include/post-card/wpbakery-post-card-2.php';
                        } else if ($cewb_post_card_style == 'post-card-style-6') {
                            include CEWB_DIR . 'include/post-card/wpbakery-post-card-6.php';
                        }
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <?php
    endif;
    return ob_get_clean();
}

add_shortcode('cewb_post_card_layout', 'cewb_post_card_shortcode');

/*
 * All post card styles
 */
$post_card_style = array(
    __('Card Style 1', CEWB_TEXTDOMAIN) => 'post-card-style-1',
    __('Card Style 2', CEWB_TEXTDOMAIN) => 'post-card-style-2',
    __('Card Style 6', CEWB_TEXTDOMAIN) => 'post-card-style-6'
);

/*
 * How many post columns
 */
$post_columns = array(
    __('1', CEWB_TEXTDOMAIN) => '1',
    __('2', CEWB_TEXTDOMAIN) => '2',
    __('3', CEWB_TEXTDOMAIN) => '3',
    __('4', CEWB_TEXTDOMAIN) => '4',
    __('6', CEWB_TEXTDOMAIN) => '6'
);

/*
 * Post image size
 */
$post_image_size = array(
    __('Thumbnail - 150 x 150', CEWB_TEXTDOMAIN) => 'thumbnail',
    __('Medium - 300 x 300', CEWB_TEXTDOMAIN) => 'medium',
    __('Medium Large - 768 x 0', CEWB_TEXTDOMAIN) => 'medium_large',
    __('Large - 1024 x 1024', CEWB_TEXTDOMAIN) => 'large',
    __('1536x1536 - 1536 x 1536', CEWB_TEXTDOMAIN) => '1536x1536',
    __('2048x2048 - 2048 x 2048', CEWB_TEXTDOMAIN) => '2048x2048',
    __('Post Card Thumb - 680 x 460', CEWB_TEXTDOMAIN) => 'post_card_thumb',
    __('Full', CEWB_TEXTDOMAIN) => 'full'
);

/*
 * Title HTML Tag
 */
$post_title_html_tag = array(
    __('H1', CEWB_TEXTDOMAIN) => 'h1',
    __('H2', CEWB_TEXTDOMAIN) => 'h2',
    __('H3', CEWB_TEXTDOMAIN) => 'h3',
    __('H4', CEWB_TEXTDOMAIN) => 'h4',
    __('H5', CEWB_TEXTDOMAIN) => 'h5',
    __('H6', CEWB_TEXTDOMAIN) => 'h6',
    __('div', CEWB_TEXTDOMAIN) => 'div',
    __('span', CEWB_TEXTDOMAIN) => 'span',
    __('p', CEWB_TEXTDOMAIN) => 'p'
);

/*
 * Excerpt From
 */
$post_excerpt_from = array(
    __('Content', CEWB_TEXTDOMAIN) => 'content',
    __('Excerpt', CEWB_TEXTDOMAIN) => 'excerpt'
);

/*
 * Order By
 */
$post_order_by = array(
    __('Date', CEWB_TEXTDOMAIN) => 'post_date',
    __('Title', CEWB_TEXTDOMAIN) => 'post_title',
    __('Menu Order', CEWB_TEXTDOMAIN) => 'menu_order',
    __('Random', CEWB_TEXTDOMAIN) => 'rand'
);

/*
 * Sort By
 */
$post_sort_by = array(
    __('ASC', CEWB_TEXTDOMAIN) => 'asc',
    __('DESC', CEWB_TEXTDOMAIN) => 'desc'
);

/*
 * Post Card Visual Composer Elements
 */
$post_card_fields = array(
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Post Card Style', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_post_card_style',
        'value' => $post_card_style,
        'admin_label' => true,
        'description' => esc_html__('Select post card style.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Columns', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_post_columns',
        'value' => $post_columns,
        'std' => '3',
        'admin_label' => true,
        'description' => esc_html__('Select post columns.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Display Number of Posts', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_number_of_post',
        'value' => __('6', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'description' => esc_html__('Enter number of posts. e.g. 6.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Image Size', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_image_size',
        'value' => $post_image_size,
        'admin_label' => true,

        'description' => esc_html__('Select image size.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Show Title', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_show_title',
        'value' => __('true', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'std' => 'true',
        'description' => __('Check/Uncheck to show/hide the title.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Title HTML Tag', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_post_title_html_tag',
        'value' => $post_title_html_tag,
        'std' => 'h2',
        'admin_label' => true,
        'description' => esc_html__('Select title HTML tag.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Show Excerpt', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_show_excerpt',
        'value' => __('true', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'std' => 'true',
        'description' => __('Check/Uncheck to show/hide the excerpt.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Excerpt Length', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_post_excerpt_length',
        'value' => __('25', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'description' => esc_html__('Enter excerpt length for posts. e.g. 25.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Excerpt From', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_post_excerpt_from',
        'value' => $post_excerpt_from,
        'admin_label' => true,
        'description' => esc_html__('Select excerpt from.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Show Read More', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_show_read_more',
        'value' => __('', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'description' => __('Check/Uncheck to show/hide the read more.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Read More Text', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_post_read_more_text',
        'value' => __('', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'description' => esc_html__('Enter read more text for posts. e.g. Read More.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Show Meta Data', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_show_meta_data',
        'value' => __('true', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'std' => 'true',
        'description' => __('Check/Uncheck to show/hide the meta data.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Meta Data', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_meta_data',
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),
        'value' => array(
            __('Author', CEWB_TEXTDOMAIN) => 'author',
            __('Date', CEWB_TEXTDOMAIN) => 'date',
            __('Comments', CEWB_TEXTDOMAIN) => 'comments',
            __('Tags', CEWB_TEXTDOMAIN) => 'tags',
            __('Category', CEWB_TEXTDOMAIN) => 'category',
        ),
        'admin_label' => true,
        'std' => 'author,date,comments,tags,category',
        'description' => __('Select the meta data you want to display.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Order By', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_post_order_by',
        'value' => $post_order_by,
        'admin_label' => true,
        'description' => esc_html__('Select order by.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Sort By', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_post_sort_by',
        'value' => $post_sort_by,
        'admin_label' => true,
        'description' => esc_html__('Select sort by.', CEWB_TEXTDOMAIN)
    ),
    //style options start here
    array(
        'type' => 'vc_number',
        'heading' => __( 'Grid Gap',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_post_card_grid_gap',
        'edit_field_class' => 'vc_col-sm-6',
        'description' 	=> esc_html__( 'Set layout grid gap e.g. 30', CEWB_TEXTDOMAIN ),
        'value'			=> '10',
        'suffix' 		=> 'px',
        'group' 		=> 'Layout'
    ),
    array(
        'type' => 'vc_number',
        'heading' => __( 'Rows Gap',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_post_card_rows_gap',
        'edit_field_class' => 'vc_col-sm-6',
        'description' 	=> esc_html__('Set layout row gap e.g. 35', CEWB_TEXTDOMAIN),
        'value'			=> '35',
        'suffix' 		=> 'px',
        'group' 		=> 'Layout'
    ),
    array(
        'type' => 'dropdown',
        'heading' => __( 'Alignment',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_post_layout_alignment',
        'value' => array(
            __( 'Left',  CEWB_TEXTDOMAIN  ) => 'left',
            __( 'Center',  CEWB_TEXTDOMAIN  ) => 'center',
            __( 'Right',  CEWB_TEXTDOMAIN  ) => 'right',
            __( 'Justify' , CEWB_TEXTDOMAIN ) => 'justify',
        ),
        'std' => 'left',
        'group' => 'Layout',
        'description' => esc_html__('Set layout alignment', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'vc_number',
        'heading' => __( 'Border Radius',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_post_layout_image_border_radius',
        'edit_field_class' => 'vc_col-sm-6',
        'description' 	=> esc_html__( 'Set image border radius', CEWB_TEXTDOMAIN ),
        'value'			=> '0',
        'dependency' => array(
            'element' => 'cewb_post_card_style',
            'value_not_equal_to' => 'post-card-style-3',
        ),
        'dependency' => array(
            'element' => 'cewb_post_card_style',
            'value_not_equal_to' => 'post-card-style-6',
        ),
        'suffix' 		=> '%',
        'group' 		=> 'Image'
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Image Overlay', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_post_layout_image_overlay",
        "value" => __('', CEWB_TEXTDOMAIN),
        'group' => 'Image',
        'dependency' => array(
            'element' => 'cewb_post_card_style',
            'value_not_equal_to' => 'post-card-style-6',
        ),
        "description" => __( "Set overlay for layout Image", CEWB_TEXTDOMAIN )
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Category Background Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_post_layout_category_background_overlay",
        "value" => '#e74c3c', 
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),

        'dependency' => array(
            'element' => 'cewb_post_card_style',
            'value_not_equal_to' => array(   'post-card-style-6', 'post-card-style-2'    ),
        ),
        "group" => "Background Color",
        "description" => __( "", CEWB_TEXTDOMAIN )
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Date background Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_post_layout_date_background_color",
        "value" => __('#e74c3c', CEWB_TEXTDOMAIN), 
        'group' => 'Background Color',
        "dependency" => array(
            "element" => "cewb_meta_data",
            "value" => "date",
        ),
        'dependency' => array(
            'element' => 'cewb_post_card_style',
            'value_not_equal_to' => 'post-card-style-6',
        ),
        "description" => __( "", CEWB_TEXTDOMAIN )
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Content Box Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_post_layout_content_box_background_color",
        "value" => __('', CEWB_TEXTDOMAIN), 
        'group' => 'Background Color',
        "dependency" => array(
            "element" => "cewb_meta_data",
            "value" => "content",
        ),
        "description" => __( "", CEWB_TEXTDOMAIN )
    ),
    //Date start
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Date Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_post_layout_content_date_color",
        "value" => '#54595F', 
        'group' => 'Date',
        "dependency" => array(
            "element" => "cewb_meta_data",
            "value" => "date",
        ),
        "description" => __( "", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_post_layout_date_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', CEWB_TEXTDOMAIN),
                'font_style_description' => esc_html__('Select font styling.', CEWB_TEXTDOMAIN)
            )
        ),
        "dependency" => array(
            "element" => "cewb_meta_data",
            "value" => "date",
        ),
        'group' => 'Date',
    ),
    //category start
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Category Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_post_layout_content_category_color",
        "value" => '#54595F', 
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),
        'group' => 'Category',
        "description" => __( "", CEWB_TEXTDOMAIN )
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Category Hover Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_post_layout_content_category_hover_color",
        "value" => '#54595F', 
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),
        'group' => 'Category',
        "description" => __( "", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'vc_number',
        'heading' => __( 'Spacing For Category',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_post_layout_content_category_spacing',
        'edit_field_class' => 'vc_col-sm-6',
        'description' 	=> esc_html__( '', CEWB_TEXTDOMAIN ),
        'dependency' => array(
            'element' => 'cewb_show_meta_data',
            'value' => 'true',
        ),   
        'value'			=> '0',
        'suffix' 		=> 'px',
        'group' 		=> 'Category'
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_post_layout_category_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', CEWB_TEXTDOMAIN),
                'font_style_description' => esc_html__('Select font styling.', CEWB_TEXTDOMAIN)
            )
        ),
        'dependency' => array(
            'element' => 'cewb_show_meta_data',
            'value' => 'true',
        ), 
        'group' => 'Category',
    ),
    //title start
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Title Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_post_layout_content_title_color",
        "value" => '#54595F', 
        'group' => 'Title',
        "dependency" => array(
            "element" => "cewb_show_title",
            "value" => "true",
        ),
        "description" => __( "", CEWB_TEXTDOMAIN )
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Title Color hover', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_post_layout_content_title_hover_color",
        "value" => '#54595F', 
        "dependency" => array(
            "element" => "cewb_show_title",
            "value" => "true",
        ),
        'group' => 'Title',
        "description" => __( "", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'vc_number',
        'heading' => __( 'Spacing For Title',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_post_layout_content_title_spacing',
        'edit_field_class' => 'vc_col-sm-6',
        'description' 	=> esc_html__( 'Set spacing bottom', CEWB_TEXTDOMAIN ),
        'value'			=> '0',
        'suffix' 		=> 'px',
        'dependency' => array(
            'element' => 'cewb_show_title',
            'value' => 'true',
        ),
        'group' 		=> 'Title'
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_post_layout_title_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', CEWB_TEXTDOMAIN),
                'font_style_description' => esc_html__('Select font styling.', CEWB_TEXTDOMAIN)
            )
        ),
        'dependency' => array(
            'element' => 'cewb_show_title',
            'value' => 'true',
        ),
        'group' => 'Title',
    ),
    //excerpt start
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Excerpt Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_post_layout_content_excerpt_color",
        "value" => '', 
        'group' => 'Excerpt',
        'dependency' => array(
            'element' => 'cewb_show_excerpt',
            'value' => 'true',
        ),
        "description" => __( "", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'vc_number',
        'heading' => __( 'Spacing For Excerpt',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_post_layout_content_excerpt_spacing',
        'edit_field_class' => 'vc_col-sm-6',
        'description' 	=> esc_html__( '', CEWB_TEXTDOMAIN ),
        'value'			=> '0',
        'suffix' 		=> 'px',
        "dependency" => array(
            "element" => "cewb_show_excerpt",
            "value" => "true",
        ),
        'group' 		=> 'Excerpt'
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_post_layout_excerpt_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', CEWB_TEXTDOMAIN),
                'font_style_description' => esc_html__('Select font styling.', CEWB_TEXTDOMAIN)
            )
        ),
        'dependency' => array(
            'element' => 'cewb_show_excerpt',
            'value' => 'true',
        ),
        'group' => 'Excerpt',
    ),
    //read more start
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Read More color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_post_layout_content_read_more_color",
        "value" => '#61CE70', 
        "dependency" => array(
            "element" => "cewb_show_read_more",
            "value" => "true",
        ),
        'group' => 'Read more',
        "description" => __( "", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_post_layout_read_more_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', CEWB_TEXTDOMAIN),
                'font_style_description' => esc_html__('Select font styling.', CEWB_TEXTDOMAIN)
            )
        ),
        "dependency" => array(
            "element" => "cewb_show_read_more",
            "value" => "true",
        ),
        'group' => 'Read more',
    ),
    //meta start
    array(
        'type' => 'colorpicker',
        "class" => '',
        "heading" => esc_html__('Meta Icon Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_post_layout_content_meta_icon_color",
        "value" => '', 
        'group' => 'Meta',
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),
        "description" => __( "", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'colorpicker',
        "class" => '',
        "heading" => esc_html__('Meta Text Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_post_layout_content_meta_text_color",
        "value" => '', 
        'group' => 'Meta',
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),
        "description" => __( "", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'vc_number',
        'heading' => __( 'Spacing for meta',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_post_layout_content_meta_spacing',
        'edit_field_class' => 'vc_col-sm-6',
        'description' 	=> esc_html__( '', CEWB_TEXTDOMAIN ),
        'value'			=> '0',
        'suffix' 		=> 'px',
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),
        'group' 		=> 'Meta'
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_post_layout_meta_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', CEWB_TEXTDOMAIN),
                'font_style_description' => esc_html__('Select font styling.', CEWB_TEXTDOMAIN)
            )
        ),
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),
        'group' => 'Meta',
    ),
    array(  
        "type" => "css_editor",
        "class" => "",
        "heading" => __( "Field Label", CEWB_TEXTDOMAIN ),
        "param_name" => "cewb_post_card_design_options",
        "value" => '', 
        'group' => 'Design Options',
        "dependency" => array(
            "element" => "cewb_show_meta_data",
            "value" => "true",
        ),
        "description" => __( "Enter description.", CEWB_TEXTDOMAIN )
    ),
);

/*
 * Params
 */
$params = array(
    'name' => esc_html__('Post Card Layout', CEWB_TEXTDOMAIN),
    'description' => esc_html__('Display Post Card Layout.', CEWB_TEXTDOMAIN),
    'base' => 'cewb_post_card_layout',
    'class' => 'cewb_element_wrapper',
    'controls' => 'full',
    'icon' => '',
    'category' => esc_html__('Card Elements', CEWB_TEXTDOMAIN),
    'show_settings_on_create' => true,
    'params' => $post_card_fields
);

/**
 * wpbakery param to register widget
 * 
 * @version 1.0
 * @since 1.0 
 **/
vc_map($params);
