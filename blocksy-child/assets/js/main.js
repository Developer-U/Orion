window.addEventListener('DOMContentLoaded', function(){

    /*Fancybox Gallery*/
    Fancybox.bind("[data-fancybox]", {
        hideScrollbar: false,
    });

    /*Inputmask*/

    var selectors = document.querySelectorAll('input[type="tel"].input-form');

    selectors.forEach(function(selector){
    var im = new Inputmask("+7(999)-999-9999");
    im.mask(selector);
    });

    /*Load more button*/
    const Wrappers = document.querySelectorAll('.js-targetTabs'); // Родитель постов   

    Wrappers.forEach(function(Wrapper){
        var all_posts_wrapper = Wrapper.querySelector('.gallery-tab-list');  
       
        const allnewsPosts = all_posts_wrapper.querySelectorAll('.gallery-tab-list__item'); // Все фото

        const allVideoPosts = all_posts_wrapper.querySelectorAll('.gallery-tab-list__video'); // Все видео
    
        // console.log(allnewsPosts);
    
        // console.log(allnewsPosts.length);

        // console.log(allVideoPosts.length);
    
        var newsMoreBtn = document.createElement('button'); // Создаём кнопку Добавить ещё          
    
        newsMoreBtn.classList.add('button', 'button', 'more-btn'); // Присваиваем её стили
    
        newsMoreBtn.innerText = 'показать ещё';
    
        if(allnewsPosts.length > 2 || allVideoPosts.length > 6) {  // Добавляем кнопку, если статей более 15
            Wrapper.append(newsMoreBtn);
        }
    
        for(let i=2; i<allnewsPosts.length; i++) {
            // console.log(allnewsPosts[i]);
            allnewsPosts[i].style.display = 'none';             
        }   

        for(let i=6; i<allVideoPosts.length; i++) {
            // console.log(allnewsPosts[i]);
            allVideoPosts[i].style.display = 'none';             
        } 
    
        var countD = 2; //Установим счётчик для фото

        var countT = 6; //Установим счётчик для видео
    
        newsMoreBtn.addEventListener('click', function(){
            countD += 1;

            countT += 1;
    
            if(countD <= allnewsPosts.length) { 
                for(let i=0; i<countD; i++) {
                    allnewsPosts[i].style.display = 'grid'; // При клике на кнопку добавляем дипломы
                }
            
                if(countD == allnewsPosts.length) {
                    newsMoreBtn.style.display = 'none';
                }          
            } else {              
                allnewsPosts.forEach(function(elsePost){
                    elsePost.style.display = 'grid'; // При клике на кнопку добавляем дипломы
    
                    newsMoreBtn.style.display = 'none';
                });
            }

            if(countT <= allVideoPosts.length) { 
                for(let i=0; i<countT; i++) {
                    allVideoPosts[i].style.display = 'flex'; // При клике на кнопку добавляем дипломы
                }
            
                if(countT == allVideoPosts.length) {
                    newsMoreBtn.style.display = 'none';
                }          
            } else {              
                allVideoPosts.forEach(function(elsePost){
                    elsePost.style.display = 'flex'; // При клике на кнопку добавляем дипломы
    
                    newsMoreBtn.style.display = 'none';
                });
            }
            
        });
    });
    
    /* Init AOS Animation */
    AOS.init();

    // jQuery(document).ready(function ($) {
    //     let sections = $('.js-action'); // Все секции услуг
    //     sections.each(function () { // Итерируем и далее код в цикле            
    //         let button = $(this).find('.js-item-open'); // добираемся до кнопки   
    //         let action_title = button.attr('data-name-action');              
    //         $(this).find('.action-hide-title').val(action_title); 
    //         // console.log(route_title); 
    //     });

    // });

    
    // /* Get Digit Count */
    // jQuery(function($) {
    //     $('.js-count').each(function() {
    //         $(this).prop('Counter', 0).animate({
    //         Counter: $(this).text()
    //         }, {
    //         duration: 8000,
    //         easing: 'swing',
    //         step: function(now) {
    //             $(this).text(Math.ceil(now));
    //         }
    //         });
    //     });
    // });
});