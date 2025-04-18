window.addEventListener('DOMContentLoaded', function(){
    const photo_swiper = new Swiper(".photo-gallery-slider", {
        slidesPerView: 'auto', 
        spaceBetween: 10,  
        loop: true, 
        speed: 700,    
        keyboard: {
            enabled: true,
            pageUpDown: true,
        },  
        autoplay: {
            delay: 3000,            
            waitForTransition: true,
        },      
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          breakpoints: {              
            768: {
                slidesPerView: 'auto',   
                spaceBetween: 10,             
            },
            992: {
                slidesPerView: 3,   
                spaceBetween: 13,               
            },
            1300: {
                slidesPerView: 4,   
                spaceBetween: 13,               
            }              
          } 
    });
});