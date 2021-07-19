
(function( $ ) {

    $(document).ready(function() {
        $('.js_menu_toggle').prependTo('body')

        $( ".js_menu_btn" ).click(function() {
            const height = $(".js_menu_toggle").height()
            if (height > 0) {
                $(".js_menu_toggle").css("height", "0")
                $(".js_menu_toggle").addClass("out").removeClass('in')
            } else {
                $(".js_menu_toggle").addClass("in").removeClass('out')

                $('.js_menu_toggle').clone()
                    .css({'position':'absolute','visibility':'hidden','height':'auto'})
                    .addClass('slideClone')
                    .appendTo('body');

                var newHeight = $(".slideClone").height();
                $(".slideClone").remove();
                $('.js_menu_toggle').css('height',newHeight + 'px');
            }
        })
    })





})( jQuery );