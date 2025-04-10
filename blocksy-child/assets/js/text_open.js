jQuery(function($) {
    const text_wraps = $('.js-item');    
    

    text_wraps.each(function() {
        let btn_open = $(this).find('.js-item-open');
        let btn_close = $(this).find('.js-item-close');
        let item_content = $(this).find('.js-item-content');

        let action_more = $(this).find('.action-more');

        btn_open.on('click', function(event){
            
            item_content.slideToggle('slow');

            if(btn_open.text() == 'Заказать') {
                btn_open.text('скрыть');
                btn_open.addClass('opened');
                if(action_more !== null) {
                    action_more.css('display', 'none');
                }
            } else {
                btn_open.text('Заказать');
                btn_open.removeClass('opened');
                if(action_more !== null) {
                    setTimeout(function(){
                        action_more.css('display', '');
                    }, 800);                    
                }
            }
            
        })
    });

    // const all_types_buttons = $('.js-item-content input.button');

    // all_types_buttons.each(function(){
    //     $(this).on('click', function(e) {  
    //         let tariff_wrapper = $(this).closest('.route-item');    
    //         let tariff_title = tariff_wrapper.attr('data-name');
    //         console.log(tariff_title); 
    //         $('.hide-title').val(tariff_title);
    //     });
    // });

   
});