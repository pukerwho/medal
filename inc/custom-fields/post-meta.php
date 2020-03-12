<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'products' )
    ->add_fields( array(
      Field::make( 'media_gallery', 'crb_product_gallery', 'Все фотографии продукта' )->set_type( array( 'image' ) ),
      Field::make( 'text', 'crb_product_sposob', 'Способ производства' ),
      Field::make( 'text', 'crb_product_material', 'Материал' ),
      Field::make( 'text', 'crb_product_pokritie', 'Покрытие' ),
      Field::make( 'text', 'crb_product_emal', 'Эмаль' ),
      Field::make( 'text', 'crb_product_razmer', 'Размер' ),
      Field::make( 'text', 'crb_product_tolshina', 'Толщина' ),
      Field::make( 'text', 'crb_product_kreplenie', 'Крепление' ),
  ) );
}

?>