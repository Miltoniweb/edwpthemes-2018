<?php
function mawt_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

  if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
      'selector' => '.WP-Header-title',
      'render_callback' => 'mawt_customize_blogname'
    ) );
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
      'selector' => '.WP-Header-description',
      'render_callback' => 'mawt_customize_blogdescription',
    ) );
  }
}

add_action( 'customize_register', 'mawt_customize_register' );

function mawt_customize_blogname () {
  bloginfo( 'name' );
}

function mawt_customize_blogdescription () {
  bloginfo( 'description' );
}
?>
