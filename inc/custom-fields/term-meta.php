<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_term_options' );
function crb_term_options() {
  Container::make( 'term_meta', 'Options' )
    ->where( 'term_taxonomy', '=', 'cats' )
    ->add_fields( array(
    	Field::make( 'text', 'crb_term_title', 'Заголовок для страницы' ),
    	Field::make( 'textarea', 'crb_term_desc', 'Короткое описание' ),
    	Field::make( 'image', 'crb_term_photo', 'Заглавная картинка' )->set_value_type( 'url'),
    	Field::make( 'text', 'crb_term_titletext', 'Заголовок для текста' ),
    	Field::make( 'rich_text', 'crb_term_seotext', 'Текст' ),
    ) );
}

?>