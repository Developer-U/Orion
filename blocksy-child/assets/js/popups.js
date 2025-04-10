window.addEventListener('DOMContentLoaded', function(){
    jQuery(function($) {
    // Открытие / закрытие попапов
    
    const popup_open_btns = $('[data-popup-open]');   // Все кнопки открытия попапов    
    let posTop = 0; // Изначальное значение прокрутки от верхнгего края экрана
    popup_open_btns.each(function(){
        //----- OPEN
        $(this).on('click', function(e) {
            e.preventDefault();  
            e.stopPropagation();  
           
            posTop = $(window).scrollTop(); // Запоминаем текущую прокрутку 
            console.log(posTop);
            var targeted_popup_class = jQuery(this).attr('data-popup-open');        
            $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);             

            $('body').css({
                'overflow': 'hidden',
                'padding-right': window.innerWidth - document.documentElement.clientWidth + 'px' // Компенсация скроллбара
            });
        });
    });    

    //----- CLOSE
    $('[data-popup-close]').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        // let posTop = $(document).scrollTop();  
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

        $('body').css({
            'overflow': '',
            'padding-right': ''
        });

        $(window).scrollTop(posTop); // Восстанавливаем прокрутку             
    });

    // Закрытие при клике на фон попапа
    $('.popup__wrapper').on('click', function(event) {
        if( this == event.target) {
        $('.popup').fadeOut(350);
        $('body').css({
            'overflow': '',
            'padding-right': ''
        });

        $(window).scrollTop(posTop); // Восстанавливаем прокрутку  
        }
    });
  
    });
});