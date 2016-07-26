<?php
function remove_custom_customizer($wp_customize) {
  $wp_customize->remove_section( 'adamos_color_scheme_settings');
  $wp_customize->remove_setting( 'homepage_slider_cat');
  $wp_customize->remove_control( 'homepage_slider_cat_control');
  $wp_customize->remove_setting( 'homepage_slider_slide_no');
  $wp_customize->remove_control( 'homepage_slider_slide_no_control');
  $wp_customize->remove_setting( 'homepage_slider');
  $wp_customize->remove_setting( 'homepage_slider_hide');
    $wp_customize->remove_control( 'homepage_slider_hide_control');
}
add_action( 'customize_register', 'remove_custom_customizer', 1000 );

// Add arbitrary HTML to customizer
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'FUSF_Customize_Misc_Control' ) ) :
class FUSF_Customize_Misc_Control extends WP_Customize_Control {
    public $settings = 'blogname';
    public $description = '';


    public function render_content() {
        switch ( $this->type ) {
            default:
            case 'text' :
                echo '<p class="description">' . $this->description . '</p>';
                break;

            case 'heading':
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
                break;

            case 'line' :
                echo '<hr />';
                break;
        }
    }
}
endif;
function add_custom_customizer($wp_customize) {

  // Change Homepage slider description
  $wp_customize->add_section( 'homepage_slider', array(
    'title'           => __( 'Homepage Slider', 'adamos' ),
    'description'     => __( 'Add images to the homepage slider. Your theme recommends a header size of 1400 × 500 pixels. ', 'adamos' ),
    'panel'       => 'adamos_header_panel',
    'priority'  => 3,
  ));

// Make hide checkbox show before slides
  $wp_customize->add_setting( 'homepage_slider_hide', array(
    'default'       => false,
    'sanitize_callback' => 'adamos_sanitize_checkbox',
  ));
  $wp_customize->add_control(
    new WP_Customize_Control(
      $wp_customize,
      'homepage_slider_hide_control',
      array(
        'label'      => __('Hide Homepage Slider', 'adamos'),
        'section'    => 'homepage_slider',
        'settings'   => 'homepage_slider_hide',
        'type'     => 'checkbox',
        'priority'   => 1,
      )
    )
  );

  // Upload first homepage slider image
  $wp_customize->add_setting('homepage_slider_image_1', array(
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'absint'
  ));
  $wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control(
      $wp_customize,
      'homepage_slider_image_1',
      array(
        'label'       => __('Upload First Slide', 'adamos'),
        'section'     => 'homepage_slider',
        'settings'    => 'homepage_slider_image_1',
        'width'       => 1400,
        'height'      => 500
      )
    )
  );

  // Add Slide 1 title
  $wp_customize->add_setting( 'slide_1_title', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'slide_1_title', array(
      'label'       => __('Slide 1 Title', 'adamos'),
      'section'     => 'homepage_slider',
      'type'      => 'text',
  ));

  // Add Slide 1 caption
  $wp_customize->add_setting( 'slide_1_caption', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'slide_1_caption', array(
      'label'       => __('Slide 1 Caption', 'adamos'),
      'section'     => 'homepage_slider',
      'type'      => 'textarea',
  ) );

  // Add Slide 1 link
  $wp_customize->add_setting( 'slide_1_link', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'slide_1_link', array(
      'label'       => __('Slide 1 Link', 'adamos'),
      'section'     => 'homepage_slider',
      'type'        => 'url',
      'input_attrs' => array(
        'placeholder' => 'http://friendsofuptonstateforest.org'
      )
  ) );

  // Upload second homepage slider image
  $wp_customize->add_setting('homepage_slider_image_2', array(
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'absint'
  ));
  $wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control(
      $wp_customize,
      'homepage_slider_image_2',
      array(
        'label'       => __('Upload Second Slide', 'adamos'),
        'section'     => 'homepage_slider',
        'settings'    => 'homepage_slider_image_2',
        'width'       => 1400,
        'height'      => 500
      )
    )
  );

  // Add Slide 2 title
  $wp_customize->add_setting( 'slide_2_title', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'slide_2_title', array(
      'label'       => __('Slide 2 Title', 'adamos'),
      'section'     => 'homepage_slider',
      'type'      => 'text',
  ));

  // Add Slide 2 caption
  $wp_customize->add_setting( 'slide_2_caption', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'slide_2_caption', array(
      'label'       => __('Slide 2 Caption', 'adamos'),
      'section'     => 'homepage_slider',
      'type'      => 'textarea',
    ) );

  // Add Slide 2 link
  $wp_customize->add_setting( 'slide_2_link', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'slide_2_link', array(
      'label'       => __('Slide 2 Link', 'adamos'),
      'section'     => 'homepage_slider',
      'type'        => 'url',
      'input_attrs' => array(
        'placeholder' => 'http://friendsofuptonstateforest.org'
      )
  ) );

  // Upload third homepage slider image
  $wp_customize->add_setting('homepage_slider_image_3', array(
    'type'              => 'theme_mod',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'absint'
  ));
  $wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control(
      $wp_customize,
      'homepage_slider_image_3',
      array(
        'label'       => __('Upload Third Slide', 'adamos'),
        'section'     => 'homepage_slider',
        'settings'    => 'homepage_slider_image_3',
        'width'       => 1400,
        'height'      => 500
      )
    )
  );

  // Add Slide 3 title
  $wp_customize->add_setting( 'slide_3_title', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'slide_3_title', array(
      'label'       => __('Slide 3 Title', 'adamos'),
      'section'     => 'homepage_slider',
      'type'      => 'text',
    ) );

  // Add Slide 3 caption
  $wp_customize->add_setting( 'slide_3_caption', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'slide_3_caption', array(
      'label'       => __('Slide 3 Caption', 'adamos'),
      'section'     => 'homepage_slider',
      'type'      => 'textarea',
    ) );

  // Add Slide 3 link
  $wp_customize->add_setting( 'slide_3_link', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'slide_3_link', array(
      'label'       => __('Slide 3 Link', 'adamos'),
      'section'     => 'homepage_slider',
      'type'        => 'url',
      'input_attrs' => array(
        'placeholder' => 'http://friendsofuptonstateforest.org'
      )
  ) );

  // ICON BAR
  $wp_customize->add_section( 'icon_bar', array(
      'title'       => 'Icon Bar',
      'description'     => __( 'This is a section to add or remove icons from the homepage icon bar.', 'adamos' ),
      'panel'       => 'adamos_header_panel',
      )
  );

  // FIRST ICON
  // Upload first Icon
  $wp_customize->add_setting( 'icon_1', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'icon_1', array(
      'label'       => __('Icon 1', 'adamos'),
      'section'     => 'icon_bar',
      'type'      => 'text',
    ) );
  // Upload first Icon link
  $wp_customize->add_setting( 'icon_1_link', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'icon_1_link', array(
    'label'       => __('Icon 1 Link', 'adamos'),
    'section'     => 'icon_bar',
    'type'        => 'url',
    'input_attrs' => array(
      'placeholder' => 'http://friendsofuptonstateforest.org'
    )
  ));
  // Upload first Icon Title
  $wp_customize->add_setting( 'icon_1_title', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'icon_1_title', array(
      'label'       => __('Icon 1 Title', 'adamos'),
      'section'     => 'icon_bar',
      'type'      => 'text',
    ) );
// Line Break
  $wp_customize->add_control(
    new FUSF_Customize_Misc_Control(
        $wp_customize,
        'fusf_line_1',
        array(
            'section'  => 'icon_bar',
            'type'     => 'line',
        )
    )
);

  // SECOND ICON
  // Upload second Icon
  $wp_customize->add_setting( 'icon_2', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'icon_2', array(
      'label'       => __('Icon 2', 'adamos'),
      'section'     => 'icon_bar',
      'type'      => 'text',
    ) );
  // Upload second Icon link
    $wp_customize->add_setting( 'icon_2_link', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'icon_2_link', array(
    'label'       => __('Icon 2 Link', 'adamos'),
    'section'     => 'icon_bar',
    'type'        => 'url',
    'input_attrs' => array(
      'placeholder' => 'http://friendsofuptonstateforest.org'
    )
  ));
  // Upload second Icon title
  $wp_customize->add_setting( 'icon_2_title', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'icon_2_title', array(
      'label'       => __('Icon 2 Title', 'adamos'),
      'section'     => 'icon_bar',
      'type'      => 'text',
    ) );

// Line break
  $wp_customize->add_control(
    new FUSF_Customize_Misc_Control(
        $wp_customize,
        'fusf_line_2',
        array(
            'section'  => 'icon_bar',
            'type'     => 'line',
        )
    )
);

  // THIRD ICON
  // Upload first Icon
  $wp_customize->add_setting( 'icon_3', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'icon_3', array(
      'label'       => __('Icon 3', 'adamos'),
      'section'     => 'icon_bar',
      'type'      => 'text',
    ) );
  // Upload third icon link
  $wp_customize->add_setting( 'icon_3_link', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'icon_3_link', array(
    'label'       => __('Icon 3 Link', 'adamos'),
    'section'     => 'icon_bar',
    'type'        => 'url',
    'input_attrs' => array(
      'placeholder' => 'http://friendsofuptonstateforest.org'
    )
  ));
  // Upload third icon title
  $wp_customize->add_setting( 'icon_3_title', array(
    'transport'     => 'postMessage',
    'sanitize_callback' => 'adamos_sanitize_text',
  ));
  $wp_customize->add_control( 'icon_3_title', array(
      'label'       => __('Icon 3 Title', 'adamos'),
      'section'     => 'icon_bar',
      'type'      => 'text',
    ) );
}
add_action( 'customize_register', 'add_custom_customizer', 1000 );
?>
