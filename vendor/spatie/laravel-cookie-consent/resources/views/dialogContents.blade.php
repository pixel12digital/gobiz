@php
    use Illuminate\Support\Facades\DB;

    // Queries
    $config = DB::table('config')->get();
@endphp

{{-- Desktop cookie consent --}}
<div
    class="fixed bottom-4 left-1/2 transform -translate-x-1/2 w-full flex justify-center mx-4 z-50 js-cookie-consent cookie-consent hidden lg:flex xl:flex">
    <div
        class="bg-{{ $config[11]->config_value }}-600 text-white shadow-lg flex items-center justify-between space-x-4 max-w-4xl w-full px-4 py-2 rounded-lg">
        <!-- Left Content -->
        <div class="flex items-center space-x-4">
            <div class="text-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="h-8 w-8">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 13v.01" />
                    <path d="M12 17v.01" />
                    <path d="M12 12v.01" />
                    <path d="M16 14v.01" />
                    <path d="M11 8v.01" />
                    <path
                        d="M13.148 3.476l2.667 1.104a4 4 0 0 0 4.656 6.14l.053 .132a3 3 0 0 1 0 2.296q -.745 1.18 -1.024 1.852q -.283 .684 -.66 2.216a3 3 0 0 1 -1.624 1.623q -1.572 .394 -2.216 .661q -.712 .295 -1.852 1.024a3 3 0 0 1 -2.296 0q -1.203 -.754 -1.852 -1.024q -.707 -.292 -2.216 -.66a3 3 0 0 1 -1.623 -1.624q -.397 -1.577 -.661 -2.216q -.298 -.718 -1.024 -1.852a3 3 0 0 1 0 -2.296q .719 -1.116 1.024 -1.852q .257 -.62 .66 -2.216a3 3 0 0 1 1.624 -1.623q 1.547 -.384 2.216 -.661q .687 -.285 1.852 -1.024a3 3 0 0 1 2.296 0" />
                </svg>
            </div>
            <div>
                <p class="font-semibold text-lg mb-2">{{ __('We use cookies') }}</p>
                <p class="text-sm">{!! trans('cookie-consent::texts.message') !!}</p>
            </div>
        </div>
        <!-- Right Content -->
        <div class="flex space-x-2">
            <button
                class="bg-white text-gray-800 px-4 py-2 rounded shadow-md font-medium hover:bg-{{ $config[11]->config_value }}-800 hover:text-gray-50 transition js-cookie-consent-agree cookie-consent__agree">
                {{ __('Accept') }}
            </button>
            {{-- Deny Button --}}
            <button class="bg-gray-800 text-gray-50 px-4 py-2 rounded shadow-md font-medium hover:bg-gray-50 hover:text-gray-800 transition hover:text-gray-300 transition js-cookie-consent-deny cookie-consent__deny">
                {{ __('Deny') }}
            </button>
        </div>
    </div>
</div>

{{-- Mobile cookie consent --}}
<div
    class="fixed bottom-4 left-1/2 transform -translate-x-1/2 w-full flex justify-center z-50 lg:hidden xl:hidden js-cookie-consent cookie-consent">
    <div class="bg-{{ $config[11]->config_value }}-50 text-center shadow-lg rounded-lg p-6 mx-2 max-w-sm w-full">
        <!-- Icon -->
        <div class="flex justify-center items-center bg-{{ $config[11]->config_value }}-600 text-white w-16 h-16 rounded-full mx-auto mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-cookie h-8 w-8">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M8 13v.01" />
                <path d="M12 17v.01" />
                <path d="M12 12v.01" />
                <path d="M16 14v.01" />
                <path d="M11 8v.01" />
                <path
                    d="M13.148 3.476l2.667 1.104a4 4 0 0 0 4.656 6.14l.053 .132a3 3 0 0 1 0 2.296q -.745 1.18 -1.024 1.852q -.283 .684 -.66 2.216a3 3 0 0 1 -1.624 1.623q -1.572 .394 -2.216 .661q -.712 .295 -1.852 1.024a3 3 0 0 1 -2.296 0q -1.203 -.754 -1.852 -1.024q -.707 -.292 -2.216 -.66a3 3 0 0 1 -1.623 -1.624q -.397 -1.577 -.661 -2.216q -.298 -.718 -1.024 -1.852a3 3 0 0 1 0 -2.296q .719 -1.116 1.024 -1.852q .257 -.62 .66 -2.216a3 3 0 0 1 1.624 -1.623q 1.547 -.384 2.216 -.661q .687 -.285 1.852 -1.024a3 3 0 0 1 2.296 0" />
            </svg>
        </div>

        <!-- Text -->
        <h2 class="text-xl font-semibold mb-2">{{ __('We use cookies') }}</h2>
        <p class="text-sm text-gray-600 mb-6">
            {!! trans('cookie-consent::texts.message') !!}
        </p>

        <!-- Buttons -->
        <div class="flex justify-center space-x-4">
            <button
                class="bg-{{ $config[11]->config_value }}-600 text-white px-4 py-2 rounded font-medium hover:bg-{{ $config[11]->config_value }}-700 js-cookie-consent-agree cookie-consent__agree">
                {{ __('Accept') }}
            </button>
            <button
                class="bg-gray-800 text-gray-50 px-4 py-2 rounded font-medium hover:bg-gray-50 mobilejs-cookie-consent-deny cookie-consent__deny">
                {{ __('Deny') }}
            </button>
        </div>
    </div>
</div>
