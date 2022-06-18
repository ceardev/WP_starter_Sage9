<!doctype html>
<html @php(language_attributes())>
    @include('core.head')
    <body @php(body_class())>
    @php(do_action('get_header'))
    @include('components.header')
        <div class="wrap" role="document">
            <div class="content">
                <main class="main">
                @yield('content')
                </main>
            </div>
        </div>
    @php(do_action('get_footer'))
    @include('components.footer')
    @php(wp_footer())
    @yield('after_scripts')
    </body>
</html>
