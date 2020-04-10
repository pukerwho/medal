<?php 
add_action( 'customize_register', 'customizer_init' );
add_action( 'customize_preview_init', 'customizer_js_file' );

function customizer_init( WP_Customize_Manager $wp_customize ){
  $transport = 'refresh';

  // Копирайт
  if ( $section = 'copyright' ) {

    $wp_customize->add_section( $section, [
      'title' => 'Копирайт',
      'priority'  => 200,
    ]);

    //Текст
    $setting = 'copyright_text';
    $wp_customize->add_setting( $setting, [
      'default'   => '',
      'transport' => $transport
    ] );
    $wp_customize->add_control( $setting, [
      'section'  => $section,
      'label'    => 'Текст',
      'type'     => 'text'
    ]);
  }
}

function customizer_js_file(){
  wp_enqueue_script( 'theme-customizer', get_stylesheet_directory_uri() . '/js/theme-customizer.js', [ 'jquery', 'customize-preview' ], null, true );
}
?>