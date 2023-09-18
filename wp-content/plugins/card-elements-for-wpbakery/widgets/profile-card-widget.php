<?php
/**
 * Display Profile Card layout element
 * 
 * @version 1.0
 * @since 1.0 
 **/
function cewb_profile_card_shortcode($atts, $content = null, $shortcode_handle = '') {
    $default_atts = array(
        'cewb_profile_card_style' => 'profile-card-style-1',
        'cewb_profile_name' => 'John Doe',
        'cewb_profile_position' => 'Developer',
        'cewb_display_profile_description' => 'true',
        'cewb_profile_description' => 'Lorem ipsum dolor sit amet, consectetur adipisci ng elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
        'cewb_profile_image' => '',
        'cewb_profile_background_image' => '',
        'cewb_social_icon_value'=>'true',
        'cewb_social_facebook_icon' => 'fab fa-facebook',
        'cewb_social_facebook_url' => '',
        'cewb_social_twitter_icon' => 'fab fa-twitter',
        'cewb_social_twitter_url' => '',
        'cewb_social_googleplus_icon' => 'fab fa-google-plus',
        'cewb_social_googleplus_url' => '',
        'cewb_social_wordpress_icon' => 'fab fa-wordpress',
        'cewb_social_wordpress_url' => '',
        'cewb_profile_card_style_name_color' => '#91e2f7',
        'cewb_profile_card_style_name_font_size' => '',
        'cewb_profile_card_style_name_alignment' => 'center',
        'cewb_profile_card_style_position_color' => '#54595F',
        'cewb_profile_card_style_position_font_size' => '',
        'cewb_profile_card_style_position_alignment' => 'center',
        'cewb_profile_card_style_description_color' => '#7A7A7A',
        'cewb_profile_card_style_description_font_size' => '',
        'cewb_profile_card_style_description_alignment' => 'center',
        'cewb_profile_card_style_background_color' => '#61ce70',
        'cewb_profile_card_style_social_background_color' => '#61ce70',
        'cewb_profile_card_social_icon_size' => '20px',
        'cewb_profile_card_style_social_icon_background_color' => '#61ce70',
        'cewb_profile_card_style_social_icon_color' => '#fff',
        'cewb_profile_card_social_icon_box_radius' => '0px',
        'cewb_profile_card_social_icon_animation'=> 'none',
        'cewb_profile_card_style_social_hover_background_color' => '#61ce70',
        'cewb_profile_card_style_social_icon_hover_background_color' => 'transparent',
        'cewb_profile_card_style_social_icon_hover_color' => '#fff',
        'cewb_profile_card_social_icon_hover_box_radius' => '',
        'cewb_profile_card_style_triangle_div_background_color' => '#61ce70',
        'cewb_profile_card_style_position_div_background_color' => '',
        'cewb_profile_card_style_name_div_background_color' => '',
        'cewb_profile_card_design_options' => '',
        'cewb_profile_card_style_name_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_profile_card_style_position_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_display_profile_description_font_family' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal'
    );

    $atts = shortcode_atts($default_atts, $atts);
    extract($atts);

    //Design option class
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $cewb_profile_card_design_options, ' ' ));

    //for uniq global class
    $custom_uniq_class = rand(9712 , 205553);

    ob_start();
    
    ?>
    <div class="vc_grid-container-wrapper vc_clearfix <?php echo $css_class; ?>" style='<?php $cewb_profile_card_design_options ?>' >
        <div class="vc_grid-container vc_clearfix wpb_content_element vc_basic_grid">
            <div class="vc_pageable-slide-wrapper vc_clearfix">
                <?php
                if ($cewb_profile_card_style == 'profile-card-style-1') {
                    include CEWB_DIR . 'include/profile-card/wpbakery-profile-card-1.php';
                } else if ($cewb_profile_card_style == 'profile-card-style-2') {
                    include CEWB_DIR . 'include/profile-card/wpbakery-profile-card-2.php';
                } else if ($cewb_profile_card_style == 'profile-card-style-3') {
                    include CEWB_DIR . 'include/profile-card/wpbakery-profile-card-3.php';
                } else if ($cewb_profile_card_style == 'profile-card-style-4') {
                    include CEWB_DIR . 'include/profile-card/wpbakery-profile-card-4.php';
                } else if ($cewb_profile_card_style == 'profile-card-style-5') {
                    include CEWB_DIR . 'include/profile-card/wpbakery-profile-card-5.php';
                } else if ($cewb_profile_card_style == 'profile-card-style-11') {
                    include CEWB_DIR . 'include/profile-card/wpbakery-profile-card-11.php';
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('cewb_profile_card_layout', 'cewb_profile_card_shortcode');

/*
 * All profile card styles
 */
$profile_card_style = array(
    __('Card Style 1', CEWB_TEXTDOMAIN) => 'profile-card-style-1',
    __('Card Style 2', CEWB_TEXTDOMAIN) => 'profile-card-style-2',
    __('Card Style 3', CEWB_TEXTDOMAIN) => 'profile-card-style-3',
    __('Card Style 4', CEWB_TEXTDOMAIN) => 'profile-card-style-4',
    __('Card Style 5', CEWB_TEXTDOMAIN) => 'profile-card-style-5',
    __('Card Style 11', CEWB_TEXTDOMAIN) => 'profile-card-style-11'
);

/*
 * Profile Card Visual Composer Elements
 */
$profile_card_fields = array(
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Profile Card Style', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_profile_card_style',
        'value' => $profile_card_style,
        'admin_label' => true,
        'description' => esc_html__('Select profile card style.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Name', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_profile_name',
        'value' => __('John Doe', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'description' => esc_html__('Enter profile name.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Position', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_profile_position',
        'value' => __('Developer', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'description' => esc_html__('Enter profile position.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Display Profile Description', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_display_profile_description',
        'value' => __('true', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'std' => 'true',
        'dependency' => array(
            'element' => 'cewb_profile_card_style',
            'value' => array(
                'profile-card-style-1', 'profile-card-style-2' ,'profile-card-style-3', 'profile-card-style-4' ,'profile-card-style-5'
            ),
        ),
        'description' => __('Check/Uncheck to show/hide the profile description.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Description', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_profile_description',
        'value' => __('Lorem ipsum dolor sit amet, consectetur adipisci ng elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'dependency' => array(
            'element' => 'cewb_display_profile_description',
            'value' => 'true',
        ),
        'description' => esc_html__('Enter profile description.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Profile Image', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_profile_image',
        'value' => __('', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'description' => esc_html__('Upload profile image.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Profile Background Image', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_profile_background_image',
        'value' => __('', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'description' => esc_html__('Upload profile background image.', CEWB_TEXTDOMAIN)
    ),
    array(
        "type" => "checkbox",
        "class" => "",
        "heading" => __( "Display Social Media ", CEWB_TEXTDOMAIN ),
        "param_name" => "cewb_social_icon_value",
        "value" => __( "true", CEWB_TEXTDOMAIN ),
        'std' => 'true',
        "description" => __( "Check/Uncheck to show/hide the social media icon.", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'iconpicker',
        'heading' => esc_html__('Facebook Icon', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_social_facebook_icon',
        'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'type' => 'fontawesome',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        'value' => 'fab fa-facebook',
        'description' => __('Select icon from library.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type'        => 'vc_link',
        'heading'     => esc_html__('Facebook URL (Link)', CEWB_TEXTDOMAIN),
        'param_name'  => 'cewb_social_facebook_url',
        'value'       => '',
        'admin_label' => true,
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        'description' => esc_html__('Add url to Facebook.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'iconpicker',
        'heading' => __('Twitter Icon', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_social_twitter_icon',
        'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'type' => 'fontawesome',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        'value' => 'fab fa-twitter',
        'description' => __('Select icon from library.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type'        => 'vc_link',
        'heading'     => esc_html__('Twitter URL (Link)', CEWB_TEXTDOMAIN),
        'param_name'  => 'cewb_social_twitter_url',
        'value'       => '',
        'admin_label' => true,
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        'description' => esc_html__('Add url to twitter.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'iconpicker',
        'heading' => __('Google Plus Icon', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_social_googleplus_icon',
        'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'type' => 'fontawesome',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        'value' => 'fab fa-google-plus',
        'description' => __('Select icon from library.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type'        => 'vc_link',
        'heading'     => esc_html__('Google Plus URL (Link)', CEWB_TEXTDOMAIN),
        'param_name'  => 'cewb_social_googleplus_url',
        'value'       => '',
        'admin_label' => true,
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        'description' => esc_html__('Add url to google plus.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'iconpicker',
        'heading' => __('WordPress Icon', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_social_wordpress_icon',
        'settings' => array(
            'emptyIcon' => false, // default true, display an "EMPTY" icon?
            'type' => 'fontawesome',
            'iconsPerPage' => 200, // default 100, how many icons per/page to display
        ),
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        'value' => 'fab fa-wordpress',
        'description' => __('Select icon from library.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type'        => 'vc_link',
        'heading'     => esc_html__('WordPress URL (Link)', CEWB_TEXTDOMAIN),
        'param_name'  => 'cewb_social_wordpress_url',
        'value'       => '',
        'admin_label' => true,
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        'description' => esc_html__('Add url to WordPress.', CEWB_TEXTDOMAIN)
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Name Text color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_profile_card_style_name_color",
        "value" => '#65c4dd', 
        'group' => 'Name Style',
        "description" => __( "Set color for name.", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'vc_number',
        'heading' => __( 'Name Font Size',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_profile_card_style_name_font_size',
        "edit_field_class" => "vc_col-sm-6 ",
        "description" 	=> __( ' ', CEWB_TEXTDOMAIN ),
        "value"			=>	"0",
        "suffix" 		=> 'px',
        "group" 		=> 'Name Style'
    ),
    array(
        'type' => 'dropdown',
        'heading' => __( 'Select Name Alignment',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_profile_card_style_name_alignment',
        'value' => array(
            __( 'Left',  CEWB_TEXTDOMAIN  ) => 'left',
            __( 'Center',  CEWB_TEXTDOMAIN  ) => 'center',
            __( 'Right',  CEWB_TEXTDOMAIN  ) => 'right',
        ),
        'std' => 'center',
        'group' => 'Name Style',
        "description" => __( "Select alignment for name.", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_profile_card_style_name_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', CEWB_TEXTDOMAIN),
                'font_style_description' => esc_html__('Select font styling.', CEWB_TEXTDOMAIN)
            )
        ),
        'group' => 'Name Style',
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Position Text color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_profile_card_style_position_color",
        "value" => '#54595F', 
        'group' => 'Position Style',
        "description" => __( "Set color for position.", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'vc_number',
        'heading' => __( 'Position Font Size',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_profile_card_style_position_font_size',
        "edit_field_class" => "vc_col-sm-6 ",
        "description" 	=> __( ' ', CEWB_TEXTDOMAIN ),
        "value"			=>	"0",
        "suffix" 		=> 'px',
        "group" 		=> 'Position Style'
    ),
    array(
        'type' => 'dropdown',
        'heading' => __( 'Select Position Alignment',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_profile_card_style_position_alignment',
        'value' => array(
            __( 'Left',  CEWB_TEXTDOMAIN  ) => 'left',
            __( 'Center',  CEWB_TEXTDOMAIN  ) => 'center',
            __( 'Right',  CEWB_TEXTDOMAIN  ) => 'right',
        ),
        'std' => 'center',
        'group' => 'Position Style',
        "description" => __( "Select alignment for position.", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_profile_card_style_position_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', CEWB_TEXTDOMAIN),
                'font_style_description' => esc_html__('Select font styling.', CEWB_TEXTDOMAIN)
            )
        ),
        'group' => 'Position Style',
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Description Text color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_profile_card_style_description_color",
        "value" => '#7A7A7A', 
        'group' => 'Description Style',
        'dependency' => array(
            'element' => 'cewb_display_profile_description',
            'value' => 'true',
        ),
        "description" => __( "Set color for description.", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'vc_number',
        'heading' => __( 'Description Font Size',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_profile_card_style_description_font_size',
        "edit_field_class" => "vc_col-sm-6 ",
        "description" 	=> __( ' ', CEWB_TEXTDOMAIN ),
        "value"			=>	"0",
        "suffix" 		=> 'px',
        'dependency' => array(
            'element' => 'cewb_display_profile_description',
            'value' => 'true',
        ),
        "group" 		=> 'Description Style'
    ),
    array(
        'type' => 'dropdown',
        'heading' => __( 'Select Description Alignment',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_profile_card_style_description_alignment',
        'value' => array(
            __( 'Left',  CEWB_TEXTDOMAIN  ) => 'left',
            __( 'Center',  CEWB_TEXTDOMAIN  ) => 'center',
            __( 'Right',  CEWB_TEXTDOMAIN  ) => 'right',
            __( 'Justify' , CEWB_TEXTDOMAIN ) => 'justify',
        ),
        'std' => 'center',
        'group' => 'Description Style',
        'dependency' => array(
            'element' => 'cewb_display_profile_description',
            'value' => 'true',
        ),
        "description" => __( "Select alignment for description.", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_display_profile_description_font_family',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', CEWB_TEXTDOMAIN),
                'font_style_description' => esc_html__('Select font styling.', CEWB_TEXTDOMAIN)
            )
        ),
        'dependency' => array(
            'element' => 'cewb_display_profile_description',
            'value' => 'true',
        ),
        'group' => 'Description Style',
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Background Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_profile_card_style_background_color",
        "value" => '#61ce70', 
        'group' => 'Content Box Style',
        'dependency' => array(
            'element' => 'cewb_profile_card_style',
            'value_not_equal_to' => 'profile-card-style-11',
        ),
        "description" => __( "Set card background color.", CEWB_TEXTDOMAIN )
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Background Color For name', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_profile_card_style_name_div_background_color",
        "value" => '#61ce70', 
        'group' => 'Content Box Style',
        'dependency' => array(
            'element' => 'cewb_profile_card_style',
            'value' => 'profile-card-style-11'
        ),
        "description" => __( "Set name background color.", CEWB_TEXTDOMAIN )
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Background Color for Position', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_profile_card_style_position_div_background_color",
        "value" => '#61ce70', 
        'group' => 'Content Box Style',
        'dependency' => array(
            'element' => 'cewb_profile_card_style',
            'value' => 'profile-card-style-11'
        ),
        "description" => __( "Set position background color.", CEWB_TEXTDOMAIN )
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Triangle Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_profile_card_style_triangle_div_background_color",
        "value" => '#61ce70', 
        'group' => 'Content Box Style',
        'dependency' => array(
            'element' => 'cewb_profile_card_style',
            'value' => 'profile-card-style-11'
        ),
        "description" => __( "Set triangle background color.", CEWB_TEXTDOMAIN )
    ),
    
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Social Area Background Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_profile_card_style_social_background_color",
        "value" => '#61ce70', 
        'group' => 'Social Icon',
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => __( "social media div background color.", CEWB_TEXTDOMAIN )
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Primary Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_profile_card_style_social_icon_background_color",
        "value" => '#61ce70', 
        'group' => 'Social Icon',
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => __( "social media icon background color.", CEWB_TEXTDOMAIN )
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Secondary Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_profile_card_style_social_icon_color",
        "value" => '#fff', 
        'group' => 'Social Icon',
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => __( "social media icon color.", CEWB_TEXTDOMAIN )
    ),
    array(
        'type'        => 'vc_number',
        'heading'     => __( 'Icon Size',  CEWB_TEXTDOMAIN ),
        'param_name'  => 'cewb_profile_card_social_icon_size',
        "edit_field_class" => "vc_col-md-2 vc_column-with-padding",
        'dependency'  => array(
            'element'   => 'cewb_social_icon_value',
            'value'     => 'true',
        ),
        "description" => __( "Select icon size.", CEWB_TEXTDOMAIN ),
        "value"	      =>	"0",
        "suffix"      => 'px',
        "group"       => 'Social Icon'
    ),
    array(
        'type' => 'dropdown',
        'heading' => __( 'Border radius',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_profile_card_social_icon_box_radius',
        'value' => array(
            __( '0px' , CEWB_TEXTDOMAIN ) => '0px',
            __( '10px' , CEWB_TEXTDOMAIN ) => '10px',
            __( '15px' , CEWB_TEXTDOMAIN ) => '15px',
            __( '20px' , CEWB_TEXTDOMAIN ) => '20px',
            __( '25px' , CEWB_TEXTDOMAIN ) => '25px',
            __( '30px' , CEWB_TEXTDOMAIN ) => '30px',
            __( '35px' , CEWB_TEXTDOMAIN ) => '35px',
            __( '50px' , CEWB_TEXTDOMAIN ) => '50px',
        ),
        "edit_field_class" => "vc_col-md-2 vc_column-with-padding",
        'std' => '0px',
        'group' => 'Social Icon',
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => __( "Select box border radius in.", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'dropdown',
        'heading' => __( 'Hover Animation',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_profile_card_social_icon_animation',
        'value' => array(
            __( 'None' , CEWB_TEXTDOMAIN ) => 'none',
            __( 'Grow' , CEWB_TEXTDOMAIN ) => 'grow',
            __( 'Shrink' , CEWB_TEXTDOMAIN ) => 'shrink',
            __( 'Pulse' , CEWB_TEXTDOMAIN ) => 'pulse',
            __( 'Pulse Grow' , CEWB_TEXTDOMAIN ) => 'pulse-grow',
            __( 'Pulse Shrink' , CEWB_TEXTDOMAIN ) => 'pulse-shrink',
            __( 'Push' , CEWB_TEXTDOMAIN ) => 'push',
            __( 'Pop' , CEWB_TEXTDOMAIN ) => 'pop',
            __( 'Bounce In' , CEWB_TEXTDOMAIN ) => 'bounce-in',
            __( 'Bounce Out' , CEWB_TEXTDOMAIN ) => 'bounce-out',
            __( 'Rotate' , CEWB_TEXTDOMAIN ) => 'rotate',
            __( 'Grow Rotate' , CEWB_TEXTDOMAIN ) => 'grow-rotate',
            __( 'Float' , CEWB_TEXTDOMAIN ) => 'float',
            __( 'Sink' , CEWB_TEXTDOMAIN ) => 'sink',
            __( 'Bob' , CEWB_TEXTDOMAIN ) => 'bob',
            __( 'Hang' , CEWB_TEXTDOMAIN ) => 'hang',
            __( 'Skew' , CEWB_TEXTDOMAIN ) => 'skew',
            __( 'Skew Forward' , CEWB_TEXTDOMAIN ) => 'skew-forward',
            __( 'Skew Backward' , CEWB_TEXTDOMAIN ) => 'skew-backward',
            __( 'Wobble Vertical' , CEWB_TEXTDOMAIN ) => 'wobble-vertical',
            __( 'Wobble Horizontal' , CEWB_TEXTDOMAIN ) => 'wobble-horizontal',
            __( 'Wobble To Bottom Right' , CEWB_TEXTDOMAIN ) => 'wobble-to-bottom-right',
            __( 'Wobble To Top Right' , CEWB_TEXTDOMAIN ) => 'wobble-to-top-right',
            __( 'Wobble Top' , CEWB_TEXTDOMAIN ) => 'wobble-top',
            __( 'Wobble Bottom' , CEWB_TEXTDOMAIN ) => 'wobble-bottom',
            __( 'Wobble Skew' , CEWB_TEXTDOMAIN ) => 'wobble-skew',
            __( 'Buzz' , CEWB_TEXTDOMAIN ) => 'buzz',
            __( 'Buzz Out' , CEWB_TEXTDOMAIN ) => 'buzz-out',
        ),
        "edit_field_class" => "vc_col-md-2 vc_column-with-padding",
        'std' => '',
        'group' => 'Social Icon Hover',
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => __( "Choose your animation style", CEWB_TEXTDOMAIN )
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Social Area Background Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_profile_card_style_social_hover_background_color",
        "value" => '#61ce70', 
        'group' => 'Social Icon Hover',
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => __( "social media div background color.", CEWB_TEXTDOMAIN )
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Primary Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_profile_card_style_social_icon_hover_background_color",
        "value" => '', 
        'group' => 'Social Icon Hover',
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => __( "social media icon background color.", CEWB_TEXTDOMAIN )
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Secondary Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_profile_card_style_social_icon_hover_color",
        "value" => '', 
        'group' => 'Social Icon Hover',
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => __( "social media icon color.", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'dropdown',
        'heading' => __( 'Border radius',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_profile_card_social_icon_hover_box_radius',
        'value' => array(
            __( 'defalut' , CEWB_TEXTDOMAIN ) => ' ',
            __( '0' , CEWB_TEXTDOMAIN ) => '0px',
            __( '10' , CEWB_TEXTDOMAIN ) => '10px',
            __( '15' , CEWB_TEXTDOMAIN ) => '15px',
            __( '20' , CEWB_TEXTDOMAIN ) => '20px',
            __( '25' , CEWB_TEXTDOMAIN ) => '25px',
            __( '30' , CEWB_TEXTDOMAIN ) => '30px',
            __( '35' , CEWB_TEXTDOMAIN ) => '35px',
            __( '50' , CEWB_TEXTDOMAIN ) => '50px',
        ),
        "edit_field_class" => "vc_col-md-2 vc_column-with-padding",
        'std' => '',
        'group' => 'Social Icon Hover',
        'dependency' => array(
            'element' => 'cewb_social_icon_value',
            'value' => 'true',
        ),
        "description" => __( "Select box border radius in.", CEWB_TEXTDOMAIN )
    ),
    array(  
        "type" => "css_editor",
        "class" => "",
        "heading" => __( "Field Label", CEWB_TEXTDOMAIN ),
        "param_name" => "cewb_profile_card_design_options",
        "value" => '', 
        'group' => 'Design Options',
        "description" => __( "Enter description.", CEWB_TEXTDOMAIN )
    ),  
);

/*
 * Params
 */
$params = array(
    'name' => esc_html__('Profile Card Layout', CEWB_TEXTDOMAIN),
    'description' => esc_html__('Display profile card layout.', CEWB_TEXTDOMAIN),
    'base' => 'cewb_profile_card_layout',
    'class' => 'cewb_element_wrapper',
    'controls' => 'full',
    'icon' => '',
    'category' => esc_html__('Card Elements', CEWB_TEXTDOMAIN),
    'show_settings_on_create' => true,
    'params' => $profile_card_fields
);

/**
 * wpbakery param to register widget
 * 
 * @version 1.0
 * @since 1.0 
 **/
vc_map($params);
