<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_page_theme_options' );
function crb_page_theme_options() {
  Container::make( 'post_meta', 'Main' )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'tpl_main.php' )
    ->add_fields( array(
      Field::make( 'textarea', 'crb_main_description', 'Описание услуг' ),
      Field::make( 'textarea', 'crb_main_proizvoditel', 'Информация о производителе' ),
      Field::make( 'complex', 'crb_hero_slide', 'Слайдер' )->add_fields( array(
        Field::make( 'image', 'crb_hero_slide_img', 'Картинка' ),
        Field::make( 'textarea', 'crb_hero_slide_title', 'Заголовок' ),
      )),
      Field::make( 'complex', 'crb_main_adv', 'Наши преимущества' )
        ->add_fields( array(
          Field::make( 'image', 'crb_main_adv_icon', 'Иконка' )->set_value_type( 'url'),
          Field::make( 'text', 'crb_main_adv_title', 'Заголовок' ),
          Field::make( 'textarea', 'crb_main_adv_text', 'Текст' ),
        )),
    ));
  Container::make( 'post_meta', 'Main' )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'tpl_about.php' )
    ->add_fields( array(
      Field::make( 'rich_text', 'crb_about_mainpage_content', 'Описание для главной страницы' ),
    ));
  Container::make( 'post_meta', 'Main' )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'tpl_tech.php' )
    ->add_fields( array(
      Field::make( 'complex', 'crb_tech_blocks', 'Блоки' )
        ->add_fields( array(
          Field::make( 'text', 'crb_tech_block_name', 'Заголовок' ),
          Field::make( 'image', 'crb_tech_block_photo', 'Фото' )->set_value_type( 'url'),
          Field::make( 'rich_text', 'crb_tech_block_text', 'Текст' ),
        )),
    ));  
  Container::make( 'post_meta', 'Main' )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'tpl_contact.php' )
    ->add_fields( array(
      Field::make( 'textarea', 'crb_contact_address', 'Адрес' ),
      Field::make( 'complex', 'crb_contact_vibers', 'Viber' )
      ->add_fields( array(
        Field::make( 'text', 'crb_contact_viber', 'Номер viber' ),
      )),
      Field::make( 'complex', 'crb_contact_phones', 'Телефоны' )
      ->add_fields( array(
        Field::make( 'text', 'crb_contact_phone', 'Номер телефона' ),
      )),
      Field::make( 'complex', 'crb_contact_emails', 'Почтовые ящики' )
      ->add_fields( array(
        Field::make( 'text', 'crb_contact_email', 'Email' ),
      )),
      Field::make( 'text', 'crb_contact_map_lat', 'Координаты для карты (lat)' ),
      Field::make( 'text', 'crb_contact_map_lng', 'Координаты для карты (lng)' ),

      Field::make( 'text', 'crb_contact_facebook', 'Ссылка на facebook' ),
      Field::make( 'text', 'crb_contact_instagram', 'Ссылка на instagram' ),
      Field::make( 'text', 'crb_contact_pinterest', 'Ссылка на pinterest' ),
    ));
}

?>