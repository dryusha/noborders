
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

        const responsiveTable = (isMob) => {
            let table1 = $('.table1')
            let table2 = $('.table2')
            let table3 = $('.table3')
            let mobileTable = $('.mobile.table')

            if (!table1.length) return false

            table1.toggle(!isMob)
            table2.toggle(!isMob)
            table3.toggle(!isMob)
            mobileTable.toggle(isMob)

            if (mobileTable.length) return false

            const tableData = $('tr:nth-child(1) td', table1)
            const tableText = $('tr:nth-child(2) td', table1)
            const tablePrice = $('tr:nth-child(2) td', table3)
            const l = tableData.length;
            let content = ''

            for (let i = 0; i < l; i++) {
                if ($(tableData[i]).text()) {
                    content += `<div class="block">
                        <div class="table-title">${$(tableData[i]).text()}</div>
                        <div class="table-text">${$(tableText[i]).text()}</div>
                        <div class="table-price">${$(tablePrice[i]).text()}</div>
                    </div>`
                }
            }

            table3.after(`<div class="mobile table">${content}</div>`);
        }

        const changeElementsForMobile = () => {
            const mailElement = $('#footer .title span')

            if (window.screen.width <= 640) {
                const mailArray = mailElement.text().split('@')
                mailElement.html(`${mailArray[0]}<br>@${mailArray[1]}`)
                responsiveTable(true)
            } else {
                mailElement.text(mailElement.text().trim())
                responsiveTable(false)
            }
        }

        changeElementsForMobile()

        window.onresize = () => {
            changeElementsForMobile()
        }

    })





})( jQuery );