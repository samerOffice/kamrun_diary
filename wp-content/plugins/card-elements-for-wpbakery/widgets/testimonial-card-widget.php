<?php
/**
 * Display Testimonial Card layout element
 * 
 * @version 1.0
 * @since 1.0
 **/
function cewb_testimonial_card_shortcode($atts, $content = null, $shortcode_handle = '') {
    $default_atts = array(
        'cewb_testimonial_card_style' => 'testimonial-card-style-1',
        'cewb_testimonial_name' => 'John Doe',
        'cewb_testimonial_position' => 'Developer',
        'cewb_display_testimonial_description' => 'true',
        'cewb_testimonial_description' => 'Lorem ipsum dolor sit amet, consectetur adipisci ng elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
        'cewb_testimonial_image' => '',
        'cewb_testimonial_card_style_name_color' => '#02d871',
        'cewb_testimonial_card_style_name_alignment' => 'left',
        'cewb_testimonial_card_style_name_font_size' => '',
        'cewb_testimonial_card_style_name_font_style' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_testimonial_card_style_position_color' => '#54595f',
        'cewb_testimonial_card_style_position_alignment' => 'left',
        'cewb_testimonial_card_style_position_font_size' => '',
        'cewb_testimonial_card_style_position_font_style' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',
        'cewb_testimonial_card_style_description_color' => '#54595f',
        'cewb_testimonial_card_style_description_alignment' => 'left',
        'cewb_testimonial_card_style_description_font_size' => '',
        'cewb_testimonial_card_style_description_font_style' => 'font_family:inherit|font_style:revert%20regular%3A400%3Anormal',                           
        'cewb_testimonial_card_style_background_color' => '#61ce70',
        'cewb_testimonial_card_design_options' => ''
    );

    $atts = shortcode_atts($default_atts, $atts);
    extract($atts);

    // design css class
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $cewb_testimonial_card_design_options, ' ' ));
    ob_start();
    ?>
    <div class="vc_grid-container-wrapper vc_clearfix <?php echo $css_class; ?>" style='<?php $cewb_testimonial_card_design_options ?>' >
        <div class="vc_grid-container vc_clearfix wpb_content_element vc_basic_grid">
            <div class="vc_pageable-slide-wrapper vc_clearfix">
                <?php
                if ($cewb_testimonial_card_style == 'testimonial-card-style-1') {
                    include CEWB_DIR . 'include/testimonial-card/wpbakery-testimonial-card-1.php';
                } else if ($cewb_testimonial_card_style == 'testimonial-card-style-2') {
                    include CEWB_DIR . 'include/testimonial-card/wpbakery-testimonial-card-2.php';
                } else if ($cewb_testimonial_card_style == 'testimonial-card-style-6') {
                    include CEWB_DIR . 'include/testimonial-card/wpbakery-testimonial-card-6.php';
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('cewb_testimonial_card_layout',  'cewb_testimonial_card_shortcode');

/*
 * All testimonial card styles
 */
$testimonial_card_style = array(
    __('Card Style 1', CEWB_TEXTDOMAIN) => 'testimonial-card-style-1',
    __('Card Style 2', CEWB_TEXTDOMAIN) => 'testimonial-card-style-2',
    __('Card Style 6', CEWB_TEXTDOMAIN) => 'testimonial-card-style-6'
);

/*
 * Testimonial Card Visual Composer Elements
 */
$testimonial_card_fields = array(
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Testimonial Card Layouts option', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_testimonial_card_style',
        'value' => $testimonial_card_style,
        'admin_label' => true,
        'description' => esc_html__('Select testimonial card style.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Name', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_testimonial_name',
        'value' => __('John Doe', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'description' => esc_html__('Enter testimonial name.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Position', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_testimonial_position',
        'value' => __('Developer', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'description' => esc_html__('Enter testimonial position.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Description', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_testimonial_description',
        'value' => __('Lorem ipsum dolor sit amet, consectetur adipisci ng elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'description' => esc_html__('Enter testimonial description.', CEWB_TEXTDOMAIN)
    ),
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Testimonial Image', CEWB_TEXTDOMAIN),
        'param_name' => 'cewb_testimonial_image',
        'value' => __('', CEWB_TEXTDOMAIN),
        'admin_label' => true,
        'description' => esc_html__('Upload testimonial image.', CEWB_TEXTDOMAIN)
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__('Name Text color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_testimonial_card_style_name_color",
        "value" => '#02d871', 
        'group' => 'Name Style',
        "description" => __( "Set color for name.", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'dropdown',
        'heading' => __( 'Select Name Alignment',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_testimonial_card_style_name_alignment',
        'value' => array(
            __( 'Left',  CEWB_TEXTDOMAIN  ) => 'left',
            __( 'Center',  CEWB_TEXTDOMAIN  ) => 'center',
            __( 'Right',  CEWB_TEXTDOMAIN  ) => 'right',
        ),
        'group' => 'Name Style',
        "description" => __( "Select alignment For name.", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'vc_number',
        'heading' => __( 'Name Font Size',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_testimonial_card_style_name_font_size',
        "edit_field_class" => "vc_col-sm-6 ",
        "description" 	=> __( ' ', CEWB_TEXTDOMAIN ),
        "value"			=>	"10",
        "suffix" 		=> 'px',
        "group" 		=> 'Name Style'
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_testimonial_card_style_name_font_style',
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
        "param_name" => "cewb_testimonial_card_style_position_color",
        "value" => '#54595f', 
        'group' => 'Position Style',
        "description" => __( "Set color for position.", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'dropdown',
        'heading' => __( 'Select Position Alignment',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_testimonial_card_style_position_alignment',
        'value' => array(
            __( 'Left',  CEWB_TEXTDOMAIN  ) => 'left',
            __( 'Center',  CEWB_TEXTDOMAIN  ) => 'center',
            __( 'Right',  CEWB_TEXTDOMAIN  ) => 'right',
        ),
        'group' => 'Position Style',
        "description" => __( "Select alignment for position.", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'vc_number',
        'heading' => __( 'Position Font Size',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_testimonial_card_style_position_font_size',
        "edit_field_class" => "vc_col-sm-6 ",
        "description" 	=> __( ' ', CEWB_TEXTDOMAIN ),
        "value"			=>	"10",
        "suffix" 		=> 'px',
        "group" 		=> 'Position Style'
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_testimonial_card_style_position_font_style',
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
        "param_name" => "cewb_testimonial_card_style_description_color",
        "value" => '#7A7A7A', 
        'group' => 'Description Style',
        "description" => __( "Set color for description.", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'dropdown',
        'heading' => __( 'Select Description Alignment',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_testimonial_card_style_description_alignment',
        'value' => array(
            __( 'Left',  CEWB_TEXTDOMAIN  ) => 'left',
            __( 'Center',  CEWB_TEXTDOMAIN  ) => 'center',
            __( 'Right',  CEWB_TEXTDOMAIN  ) => 'right',
            __( 'Justify' , CEWB_TEXTDOMAIN ) => 'justify',
        ),
        'group' => 'Description Style',
        "description" => __( "Select alignment for description.", CEWB_TEXTDOMAIN )
    ),
    array(
        'type' => 'vc_number',
        'heading' => __( 'Description Font Size',  CEWB_TEXTDOMAIN ),
        'param_name' => 'cewb_testimonial_card_style_description_font_size',
        "edit_field_class" => "vc_col-sm-6 ",
        "description" 	=> __( ' ', CEWB_TEXTDOMAIN ),
        "value"			=>	"10",
        "suffix" 		=> 'px',
        "group" 		=> 'Description Style'
    ),
    array(
        'type' => 'google_fonts',
        'param_name' => 'cewb_testimonial_card_style_description_font_style',
        'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
        'settings' => array(
            'fields' => array(
                'font_family_description' => esc_html__('Select font family.', CEWB_TEXTDOMAIN),
                'font_style_description' => esc_html__('Select font styling.', CEWB_TEXTDOMAIN)
            )
        ),
        'group' => 'Description Style',
    ),
    array(
        "type" => "colorpicker",
        "class" => '',
        "heading" => esc_html__( 'Background Color', CEWB_TEXTDOMAIN),
        "param_name" => "cewb_testimonial_card_style_background_color",
        "value" => '#61ce70', 
        // set dependency of style
        'dependency' => array(
			'element' => 'cewb_testimonial_card_style',
			'value' => array( 'testimonial-card-style-1' ),
		),
        'group' => 'Content Box Style',
        "description" => __( "Set color for description.", CEWB_TEXTDOMAIN )
    ),
    array(  
        "type" => "css_editor",
        "class" => "",
        "heading" => __( "Field Label", CEWB_TEXTDOMAIN ),
        "param_name" => "cewb_testimonial_card_design_options",
        "value" => '', 
        'group' => 'Design Options',
        "description" => __( "Enter description.", CEWB_TEXTDOMAIN )
    ),
);

/*
 * Params
 */
$params = array(
    'name' => esc_html__('Testimonial Card Layout', CEWB_TEXTDOMAIN),
    'description' => esc_html__('Display testimonial card layout.', CEWB_TEXTDOMAIN),
    'base' => 'cewb_testimonial_card_layout',
    'class' => 'cewb_element_wrapper',
    'controls' => 'full',
    'icon' => '',
    'category' => esc_html__('Card Elements', CEWB_TEXTDOMAIN),
    'show_settings_on_create' => true,
    'params' => $testimonial_card_fields

);

/**
 * wpbakery param to register widget
 * 
 * @version 1.0
 * @since 1.0 
 **/
vc_map($params);