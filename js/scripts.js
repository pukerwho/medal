function init() {
  //Jquery LightSlider
  $('#lightSlider').lightSlider({
    gallery: true,
    item: 1,
    loop: true,
    slideMargin: 0,
    thumbItem: 5,
    onAfterSlide: function (el) {
      SliderPost();
    },
  });

  let headerScrollClass = document.querySelector('.header_scroll');

  function fixedHeader(currentScroll) {
    if (currentScroll > 145) {
      headerScrollClass.classList.add('show');
    } else {
      headerScrollClass.classList.remove('show');
    }
  }

  window.addEventListener('scroll', function(){
    currentScroll = pageYOffset;
    fixedHeader(currentScroll);
  });

  //HeaderScrollSub
  // let headerScrollSub = document.querySelector('.header_scroll_sub');
  // let headerScrollCatalogBtn = document.querySelector('.header_scroll .catalog');
  // let headerScrollCatalogIcon = document.querySelector('.header_scroll .catalog .icon');
  // headerScrollCatalogBtn.addEventListener('click', function(){
  //   headerScrollSub.classList.toggle('show');
  //   headerScrollCatalogIcon.classList.toggle('show');
  // });

  //Modal upload styling
  let lang = document.querySelector('html').getAttribute('lang');
  console.log(lang);
  if (lang === 'uk') {
    chooseFileText = 'Додати файл';
  } else {
    chooseFileText = 'Загрузить файл';
  }
  
  let modalFiles = document.querySelectorAll('input[type="file"]');
  Array.prototype.forEach.call( modalFiles, function( modalFile ){
    if (modalFile) {

      fileInputId = modalFile.id;
      fileInputCode = '<label for="'+fileInputId+'"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>'+chooseFileText+'</span></label>'
      modalFile.insertAdjacentHTML('afterEnd', fileInputCode);

      modalFile.addEventListener( 'change', function( e ) {
        fileLabel   = modalFile.nextElementSibling;
        var fileName = '';
        fileName = e.target.value.split( '\\' ).pop();
        if( fileName ) {
          fileLabel.querySelector( 'span' ).innerHTML = fileName;
        }
        console.log(fileLabel);
        
      });
    }
  });

  function SliderPost() {
    let lightSlider = document.querySelector('#lightSlider');
    if (lightSlider) {
      sliderActiveImgHeight = document.querySelector('.lslide.active img').naturalHeight;
      sliderActiveImgWidth = document.querySelector('.lslide.active img').naturalWidth;
      siderActiveWidth = $('.lslide.active').width();

      sliderNewKoef = sliderActiveImgWidth/siderActiveWidth;
      sliderNewHeight = sliderActiveImgHeight/sliderNewKoef;
      $('#lightSlider').css({'height':sliderNewHeight+'px'})  
    }
  }

  SliderPost();
  
  // Show/Hide mobile menu
  let mobileMenuBtn = document.querySelector('.menu-humburger');
  let mobileMenuCover = document.querySelector('.mobile_cover');
  let bodyTag = document.querySelector('body');
  let contentTagId = document.querySelector('#content');
  let footerTag = document.querySelector('footer');

  if (mobileMenuBtn) {
    mobileMenuBtn.addEventListener('click', function(){
      mobileMenuBtn.classList.toggle('open');
      mobileMenuCover.classList.toggle('open');
      bodyTag.classList.toggle('overflow-hidden');
    });
  }

  //About photo height
  let aboutBlock = document.querySelector('.desktop .about');
  let aboutBlockContent = document.querySelector('.desktop .about_content');
  let aboutPhoto = document.querySelector('.desktop .about_photo');
  if (aboutPhoto) {
    aboutPhoto.style.height = aboutBlockContent.offsetHeight + 'px';
  }

  //Click Order
  let bgModal = document.querySelector('.modal_bg');
  let modalsClickId = document.querySelectorAll('.modal_click_js');

  for (modalClickId of modalsClickId) {
    if (modalClickId) {
      modalClickId.addEventListener('click', function(){
        modalThisId = this.dataset.modalId;
        console.log(modalThisId);
        let modal = document.querySelector(".modal[data-modal-id='" + modalThisId + "'");
          modal.classList.add('open');
          bgModal.classList.add('open');
      });
    }
  }

  //Close Order modal 
  let modalCloseBtns = document.querySelectorAll('.mobile .modal .close_btn', '.tablet .modal .close_btn');
  let allModals = document.querySelectorAll('.modal');
  document.addEventListener('click', function(e){
    if(e.target.classList.value === 'modal_bg open') {
      bgModal.classList.remove('open');
      for (allModal of allModals) {
        allModal.classList.remove('open');  
      }
    }
  });

  if (modalCloseBtns) {
    for (modalCloseBtn of modalCloseBtns) {
      modalCloseBtn.addEventListener('click', function(){
        bgModal.classList.remove('open');
        for (allModal of allModals) {
          allModal.classList.remove('open');  
        }
      });
    }
  }

  let mobilePhoneIcon = document.querySelector('.mobile_phone_icon');
  let mobilePhoneCallback = document.querySelector('.mobile_phone_callback');
  if (mobilePhoneIcon) {
    mobilePhoneIcon.addEventListener('click', function(){
      this.classList.toggle('show');
      mobilePhoneCallback.classList.toggle('show');
    });
  }

  //Swipers
  //Clients swiper
  var clientsDesktopSwiper = new Swiper ('.desktop .swiper-container-clients', {
    loop: true,
    autoplay: true,
    slidesPerView: 6,
    spaceBetween: 30,

    // If we need pagination
    navigation: {
      nextEl: '.swiper-product-next',
      prevEl: '.swiper-product-prev',
    },
  });

  var clientsMobileSwiper = new Swiper ('.mobile .swiper-container-clients', {
    loop: true,
    autoplay: true,
    slidesPerView: 2,
    spaceBetween: 30,

    // If we need pagination
    navigation: {
      nextEl: '.swiper-product-next',
      prevEl: '.swiper-product-prev',
    },
  });

  //Slider swiper (main)
  var sliderSwiper = new Swiper ('.desktop .swiper-slider-container', {
    loop: true,
    autoplay: true,
    slidesPerView: 1,
    effect: 'fade',
    pagination: {
      el: '.swiper-pagination-hero',
    },
  });

  var sliderMobileSwiper = new Swiper ('.mobile .swiper-slider-container', {
    loop: true,
    autoplay: true,
    slidesPerView: 1,
    effect: 'fade',
    pagination: {
      el: '.swiper-pagination-hero',
    },
  });

  //Slider Products 
  var productSwiper = new Swiper ('.desktop .swiper-product-container', {
    loop: true,
    autoplay: true,
    slidesPerView: 4,
    spaceBetween: 30,
    
    navigation: {
      nextEl: '.swiper-product-next',
      prevEl: '.swiper-product-prev',
    },
  });

  var productMobileSwiper = new Swiper ('.mobile .swiper-product-container', {
    loop: true,
    autoplay: true,
    slidesPerView: 1,
    spaceBetween: 30,
    
    navigation: {
      nextEl: '.swiper-product-next',
      prevEl: '.swiper-product-prev',
    },
  });

  var singleProductSlider = new Swiper ('.desktop .swiper-single_product-container', {
    loop: true,
    autoplay: true,
    slidesPerView: 1,
    spaceBetween: 0,
    effect: 'fade',
    navigation: {
      nextEl: '.swiper-product-next',
      prevEl: '.swiper-product-prev',
    },
    pagination: {
      el: '.swiper-pagination-hero',
    },
  });

  var singleProductMobileSlider = new Swiper ('.mobile .swiper-single_product-container', {
    loop: true,
    autoplay: true,
    slidesPerView: 1,
    spaceBetween: 0,
    effect: 'fade',
    navigation: {
      nextEl: '.swiper-product-next',
      prevEl: '.swiper-product-prev',
    },
    pagination: {
      el: '.swiper-pagination-hero',
    },
  });

  var singleOtherProductSlider = new Swiper ('.desktop .swiper-other_products-container', {
    loop: true,
    autoplay: true,
    slidesPerView: 4,
    spaceBetween: 30,
    
    navigation: {
      nextEl: '.swiper-product-next',
      prevEl: '.swiper-product-prev',
    },
  });

  var singleOtherProductMobileSlider = new Swiper ('.mobile .swiper-other_products-container', {
    loop: true,
    autoplay: true,
    slidesPerView: 1,
    spaceBetween: 30,
    
    navigation: {
      nextEl: '.swiper-product-next',
      prevEl: '.swiper-product-prev',
    },
  });
}

function animateAddClass(animateElement){
  animateElement.classList.add('show');
}

function animateIt() {
  let animateElements = document.querySelectorAll('.animate_this');
  for (animateElement of animateElements) {
    setTimeout(animateAddClass.bind(null, animateElement), 1000);
  }
};

document.addEventListener("DOMContentLoaded", init);
document.addEventListener("DOMContentLoaded", animateIt);
document.addEventListener("DOMContentLoaded", function(){
  //Adv Height
  setTimeout(function(){
    let advs = document.querySelectorAll('.desktop .products .swiper-slide .slide_description');
    let advsHeightArray = [];
    if (advs) {
      for (adv of advs) {
        advHeight = adv.offsetHeight;
        console.log(advHeight);
        advsHeightArray.push(advHeight);
      }  
    }

    let maxHeightAds = Math.max.apply(null, advsHeightArray);
    function adsHeight() {
      for (adv of advs) {
        adv.style.minHeight = maxHeightAds + 'px';
      }
    }

    if (advs) {
      adsHeight();  
    }
  }, 100);
});