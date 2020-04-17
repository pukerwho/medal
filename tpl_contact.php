<?php
/*
Template Name: КОНТАКТЫ
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="p_contact mb-12">
		<div class="container mx-auto">
			<h2 class="with_line">
				<?php the_title(); ?>
			</h2>
		</div>
		<div class="p_contact_content relative">
			<div class="container mx-auto px-4 lg:px-0">
				<div class="flex flex-col lg:flex-row">
					<div class="w-full lg:w-1/3 p_contact_info mb-10 lg:mb-0">
						<!-- Телефоны -->
						<div class="phones">
              <?php $footer_vibers = carbon_get_the_post_meta('crb_contact_vibers');
              foreach ($footer_vibers as $footer_viber): ?>
                <a href="tel:<?php echo $footer_viber['crb_contact_viber'] ?>" class="phone"><?php echo $footer_viber['crb_contact_viber'] ?> <span class="ml-2">(Viber)</span></a>
              <?php endforeach; ?>
							<?php $footer_phones = carbon_get_the_post_meta('crb_contact_phones');
				      foreach ($footer_phones as $footer_phone): ?>
								<a href="tel:<?php echo $footer_phone['crb_contact_phone'] ?>" class="phone"><?php echo $footer_phone['crb_contact_phone'] ?></a>
				      <?php endforeach; ?>
			      </div>
			      <!-- Кнопка -->
				    <div class="p_contact_btn btn_send modal_click_js cursor-pointer" data-modal-id="modal_callback">
							<?php _e('Обратный звонок', 's-cast'); ?>
						</div>
						<!-- Emails -->
						<div class="emails">
							<?php $footer_emails = carbon_get_the_post_meta('crb_contact_emails');
					    foreach ($footer_emails as $footer_email): ?>
				        <a href="mailto:<?php echo $footer_email['crb_contact_email'] ?>" class="email">info@s-cast.ua</a>
					    <?php endforeach; ?>
						</div>  
						<!-- Address -->
						<div class="address">
				    	<?php echo carbon_get_the_post_meta('crb_contact_address'); ?>
				    </div>
					</div>
				</div>
			</div>
			<!-- Map -->
			<div class="map_container">
				<div class="relative">
					<div class="before_map"></div>	
				</div>
				<div id="map"></div>
			</div>
		</div>
	</div>
<?php endwhile; else: ?>
	<p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>	

<script>

function initMap(mapLat, mapLng) {
  // Styles a map in night mode.
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: <?php echo carbon_get_the_post_meta('crb_contact_map_lat'); ?>, lng: <?php echo carbon_get_the_post_meta('crb_contact_map_lng'); ?>},
    zoom: 17,
    styles: [
    {
      "featureType": "all",
      "elementType": "all",
      "stylers": [
        {
          "visibility": "on"
        }
      ]
  	},
  	{
      "featureType": "all",
      "elementType": "geometry",
      "stylers": [
        {
          "visibility": "on"
        }
      ]
  	},
  	{
      "featureType": "all",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "saturation": 36
        },
        {
          "color": "#000000"
        },
        {
          "lightness": 40
        }
      ]
  	},
  	{
      "featureType": "all",
      "elementType": "labels.text.stroke",
      "stylers": [
        {
          "visibility": "on"
        },
        {
          "color": "#000000"
        },
        {
          "lightness": 16
        }
      ]
  	},
  	{
      "featureType": "all",
      "elementType": "labels.icon",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
  	},
  	{
      "featureType": "administrative",
      "elementType": "geometry.stroke",
      "stylers": [
          {
              "color": "#000000"
          },
          {
              "lightness": 17
          },
          {
              "weight": 1.2
          }
      ]
  	},
  	{
      "featureType": "administrative.country",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#868686"
          },
          {
              "visibility": "off"
          }
      ]
  	},
  	{
      "featureType": "administrative.country",
      "elementType": "geometry.stroke",
      "stylers": [
          {
              "visibility": "on"
          }
      ]
  	},
  	{
      "featureType": "administrative.country",
      "elementType": "labels.text.fill",
      "stylers": [
          {
              "color": "#d2d2d2"
          }
      ]
  	},
  	{
      "featureType": "administrative.province",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#676767"
          },
          {
              "visibility": "on"
          }
      ]
  	},
  	{
      "featureType": "administrative.locality",
      "elementType": "labels.text.fill",
      "stylers": [
          {
              "color": "#848484"
          }
      ]
  	},
  	{
      "featureType": "landscape",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#000000"
          },
          {
              "lightness": 20
          }
      ]
  	},
  	{
      "featureType": "landscape",
      "elementType": "geometry.fill",
      "stylers": [
          {
              "color": "#323432"
          },
          {
              "visibility": "on"
          }
      ]
  	},
  	{
      "featureType": "landscape.man_made",
      "elementType": "geometry.fill",
      "stylers": [
          {
              "visibility": "on"
          },
          {
              "color": "#323432"
          }
      ]
  	},
  	{
      "featureType": "landscape.natural",
      "elementType": "geometry.fill",
      "stylers": [
          {
              "visibility": "on"
          },
          {
              "color": "#323432"
          }
      ]
  	},
  	{
      "featureType": "landscape.natural.landcover",
      "elementType": "geometry.fill",
      "stylers": [
          {
              "color": "#323432"
          },
          {
              "visibility": "on"
          }
      ]
  	},
  	{
      "featureType": "landscape.natural.terrain",
      "elementType": "geometry.fill",
      "stylers": [
          {
              "color": "#323432"
          },
          {
              "visibility": "on"
          }
      ]
  	},
  	{
      "featureType": "poi",
      "elementType": "geometry",
      "stylers": [
          {
              "lightness": 21
          },
          {
              "color": "#323432"
          }
      ]
  	},
  	{
      "featureType": "poi.park",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#181818"
          }
      ]
  	},
  	{
      "featureType": "road",
      "elementType": "geometry",
      "stylers": [
          {
              "visibility": "simplified"
          }
      ]
  	},
  	{
      "featureType": "road.highway",
      "elementType": "geometry",
      "stylers": [
          {
              "visibility": "simplified"
          },
          {
              "color": "#454545"
          }
      ]
  	},
  	{
      "featureType": "road.highway",
      "elementType": "geometry.stroke",
      "stylers": [
          {
              "lightness": 29
          },
          {
              "weight": 0.2
          }
      ]
  	},
  	{
      "featureType": "road.highway.controlled_access",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#454545"
          },
          {
              "visibility": "simplified"
          },
          {
              "lightness": "-20"
          }
      ]
  	},
  	{
      "featureType": "road.arterial",
      "elementType": "geometry",
      "stylers": [
          {
              "visibility": "simplified"
          },
          {
              "color": "#454545"
          }
      ]
  	},
  	{
      "featureType": "road.arterial",
      "elementType": "geometry.fill",
      "stylers": [
          {
              "visibility": "on"
          }
      ]
  	},
  	{
      "featureType": "road.local",
      "elementType": "geometry",
      "stylers": [
          {
              "lightness": 16
          },
          {
              "color": "#454545"
          },
          {
              "visibility": "simplified"
          }
      ]
  	},
  	{
      "featureType": "transit",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#323432"
          },
          {
              "lightness": 19
          },
          {
              "visibility": "off"
          }
      ]
  	},
  	{
      "featureType": "water",
      "elementType": "geometry",
      "stylers": [
          {
              "color": "#191a1a"
          },
          {
              "visibility": "on"
          }
      ]
  	}
	]
  });

  var marker = new google.maps.Marker({
    position: {lat: <?php echo carbon_get_the_post_meta('crb_contact_map_lat'); ?>, lng: <?php echo carbon_get_the_post_meta('crb_contact_map_lng'); ?>},
    map: map,
    title: 'S-cast'
  });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7ofGxkOMREhswh27U_aOa-eLyzBfyZkI&callback=initMap"
    async defer></script>

<?php get_footer(); ?>