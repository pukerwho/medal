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

  let headerClass = document.querySelector('.header');

  function fixedHeader(currentScroll) {
    if (currentScroll > 110) {
      headerClass.classList.add('header_fixed');
    } else {
      headerClass.classList.remove('header_fixed');
    }
  }

  window.addEventListener('scroll', function(){
    currentScroll = pageYOffset;
    fixedHeader(currentScroll);
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

  //Products Animate Hover
  let seeCatalogBtns = document.querySelectorAll('.desktop .catalog_animate_btn-js a');
  if (seeCatalogBtns) {
    for (seeCatalogBtn of seeCatalogBtns) {
      seeCatalogBtn.addEventListener('mouseenter', function(){
        let catalogItemIndex = this.dataset.catalogBtnAnimate;  
        let catalogItemPhoto = document.querySelector('.products_item_photo[data-catalog-photo-animate="'+ catalogItemIndex +'"] img');
        catalogItemPhoto.classList.add('hover');
        console.log(catalogItemPhoto);
      });
      seeCatalogBtn.addEventListener('mouseleave', function(){
        let catalogItemIndex = this.dataset.catalogBtnAnimate;  
        let catalogItemPhoto = document.querySelector('.products_item_photo[data-catalog-photo-animate="'+ catalogItemIndex +'"] img');
        catalogItemPhoto.classList.remove('hover');
        console.log(catalogItemPhoto);
      });
    }
  }

  //Swipers
  //Clients swiper
  var clientsDesktopSwiper = new Swiper ('.desktop .swiper-container-clients', {
    loop: true,
    autoplay: true,
    slidesPerView: 6,
    spaceBetween: 16,

    // If we need pagination
    pagination: {
      el: '.swiper-pagination-clients',
    },
  });

  var clientsMobileSwiper = new Swiper ('.mobile .swiper-container-clients', {
    loop: true,
    autoplay: true,
    slidesPerView: 2,
    spaceBetween: 8,

    // If we need pagination
    pagination: {
      el: '.swiper-pagination-clients',
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