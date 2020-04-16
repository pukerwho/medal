<?php $args_contact_page = [
  'post_type' => 'page',
  'fields' => 'ids',
  'nopaging' => true,
  'meta_key' => '_wp_page_template',
  'meta_value' => 'tpl_contact.php'
];
$contact_pages = get_posts( $args_contact_page );
foreach ( $contact_pages as $contact_page ): ?>  
  <div class="footer_phones">
    <?php $footer_vibers = carbon_get_post_meta($contact_page, 'crb_contact_vibers');
    foreach ($footer_vibers as $footer_viber): ?>
      <div class="mb-2">
        <a href="tel:<?php echo $footer_viber['crb_contact_viber'] ?>"><?php echo $footer_viber['crb_contact_viber'] ?> <span class="ml-2">(Viber)</span></a>
      </div>
    <?php endforeach; ?>
    <?php $footer_phones = carbon_get_post_meta($contact_page, 'crb_contact_phones');
    foreach ($footer_phones as $footer_phone): ?>
      <div class="mb-2">
        <a href="tel:<?php echo $footer_phone['crb_contact_phone'] ?>"><?php echo $footer_phone['crb_contact_phone'] ?></a>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="footer_emails">
    <?php $footer_emails = carbon_get_post_meta($contact_page, 'crb_contact_emails');
    foreach ($footer_emails as $footer_email): ?>
      <div>
        <a href="mailto:<?php echo $footer_email['crb_contact_email'] ?>">info@s-cast.ua</a>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="footer_address">
    <?php echo carbon_get_post_meta($contact_page, 'crb_contact_address'); ?>
  </div>
<?php endforeach; ?>