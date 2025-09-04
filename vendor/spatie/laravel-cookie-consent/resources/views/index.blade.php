@if ($cookieConsentConfig['enabled'] && !$alreadyConsentedWithCookies)
    @include('cookie-consent::dialogContents')

    <script>
        window.laravelCookieConsent = (function() {

            const COOKIE_VALUE = 1;
            const COOKIE_DOMAIN = '{{ config('session.domain') ?? request()->getHost() }}';

            function consentWithCookies() {
                setCookie('{{ $cookieConsentConfig['cookie_name'] }}', COOKIE_VALUE,
                    {{ $cookieConsentConfig['cookie_lifetime'] }});
                hideCookieDialog();
            }

            function cookieExists(name) {
                return (document.cookie.split('; ').indexOf(name + '=' + COOKIE_VALUE) !== -1);
            }

            function hideCookieDialog() {
                const dialogs = document.getElementsByClassName('js-cookie-consent');

                for (let i = 0; i < dialogs.length; ++i) {
                    dialogs[i].style.display = 'none';
                }
            }

            document.querySelector('.js-cookie-consent-deny').addEventListener('click', function() {
                // Call setCookie() function to set the cookie with days in 1 day
                // window.laravelCookieConsent.consentWithCookies();

                // Call setCookie() function to set the cookie with days in 1 day and set value to 0
                setCookie('{{ $cookieConsentConfig['cookie_name'] }}', 0,
                    {{ $cookieConsentConfig['cookie_lifetime'] }});

                // Add your deny logic here, like disabling tracking scripts or reloading without setting cookies
                hideCookieDialog();
            });

            document.querySelector('.mobilejs-cookie-consent-deny').addEventListener('click', function() {
                // Call setCookie() function to set the cookie with days in 1 day
                // window.laravelCookieConsent.consentWithCookies();

                // Call setCookie() function to set the cookie with days in 1 day and set value to 0
                setCookie('{{ $cookieConsentConfig['cookie_name'] }}', 0,
                    {{ $cookieConsentConfig['cookie_lifetime'] }});

                // Add your deny logic here, like disabling tracking scripts or reloading without setting cookies
                hideCookieDialog();
            });

            function setCookie(name, value, expirationInDays) {
                const date = new Date();
                date.setTime(date.getTime() + (expirationInDays * 24 * 60 * 60 * 1000));
                document.cookie = name + '=' + value +
                    ';expires=' + date.toUTCString() +
                    ';domain=' + COOKIE_DOMAIN +
                    ';path=/{{ config('session.secure') ? ';secure' : null }}' +
                    '{{ config('session.same_site') ? ';samesite=' . config('session.same_site') : null }}';
            }

            if (cookieExists('{{ $cookieConsentConfig['cookie_name'] }}')) {
                hideCookieDialog();
            }

            const buttons = document.getElementsByClassName('js-cookie-consent-agree');

            for (let i = 0; i < buttons.length; ++i) {
                buttons[i].addEventListener('click', consentWithCookies);
            }

            return {
                consentWithCookies: consentWithCookies,
                hideCookieDialog: hideCookieDialog
            };
        })();
    </script>
@endif
