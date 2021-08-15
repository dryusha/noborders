
(function( $ ) {

    $(document).ready(function() {
        $('.js_menu_toggle').prependTo('body')

        $( ".js_menu_btn" ).click(function() {
            const item = $(this).data("item")
            const height = $(".js_menu_toggle[data-item='"+ item +"']").height()

            $(".js_menu_toggle").css("height", "0")
            $(".js_menu_toggle").addClass("out").removeClass('in')


            if (height <= 0) {
                $(".js_menu_toggle[data-item='"+ item +"']").addClass("in").removeClass('out')

                $(".js_menu_toggle[data-item='"+ item +"']").clone()
                    .css({'position':'absolute','visibility':'hidden','height':'auto'})
                    .addClass('slideClone')
                    .appendTo('body');

                var newHeight = $(".slideClone").height();
                $(".slideClone").remove();
                $(".js_menu_toggle[data-item='"+ item +"']").css('height',newHeight + 'px');
            }
        })

        const changeElementsForMobile = () => {
            const mailElement = $('#footer .title span')

            if (window.screen.width <= 640) {
                const mailArray = mailElement.text().split('@')
                mailElement.html(`${mailArray[0]}<br>@${mailArray[1]}`)
            } else {
                mailElement.text(mailElement.text().trim())
            }
        }

        changeElementsForMobile()

        window.onresize = () => {
            changeElementsForMobile()
        }

    })





})( jQuery );