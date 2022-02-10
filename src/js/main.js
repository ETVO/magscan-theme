/** 
 * Theme JS
 */

import 'bootstrap';

(jQuery)(
    function ($) {

        /**
         * Invoke functions when document.body is ready 
         */
        $(document.body).ready(function () {
            showCookiePopup();
            setupFixedHeader();
        });

        function showCookiePopup() {

            let consent = localStorage.getItem('cookiesConsent');

            if (consent) {
                $('#cookiePopup').hide();

                consent = JSON.parse(consent);

                var datetime = new Date(Date.parse(consent.datetime));

                console.info('Consentimento a utilização de cookies fornecido em ' + datetime)
            }
            else {
                setTimeout(() => {
                    $('#cookiePopup').css('opacity', 1)
                }, 500)

                $('#cookieAccept').on('click', () => {

                    const cookiesConsent = {
                        consent: true,
                        datetime: new Date()
                    };

                    localStorage.setItem('cookiesConsent', JSON.stringify(cookiesConsent))

                    $('#cookiePopup').fadeOut()
                })
            }
        }

        function setupFixedHeader() {
            let headerTop = $('#top').outerHeight();
            console.log(headerTop);

            $('body.admin-bar header').css('top', $('#wpadminbar').outerHeight())
            
            $(window).on('scroll load', () => {
                if(window.scrollY >= headerTop) {
                    $('#header').addClass('fixed');
                } else {
                    $('#header').removeClass('fixed');
                }
            });
        }
    }
)