<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
  Container::make( 'theme_options', 'Options' )
    ->add_tab( __('Клиенты'), array(
        Field::make( 'media_gallery', 'crb_main_clients', 'Логотипы клиентов' )->set_type( array( 'image' ) )
    ) )
    ->add_tab( __('Контактные формы'), array(
        Field::make( 'text', 'crb_form_header', 'Шорткод для Заказать просчет (кнопка в шапке)' ),
        Field::make( 'text', 'crb_form_inner', 'Шорткод для Заказать просчет (на странице продукции)' ),
        Field::make( 'text', 'crb_form_callback', 'Шорткод для Заказать звонок' ),
        Field::make( 'text', 'crb_form_contact', 'Шорткод для страницы Контакты' ),
    ) );
}

?>