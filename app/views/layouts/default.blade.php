<!doctype html>
<html>
    <head>
        <title>{{ $title or '' }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @include ('partials.top-assets')

    </head>

    <body>

        @include ('partials.toolbar')

        <div class="wrapper">

            <header>
                Header
            </header>

            @include ('partials.errors')

            <h1>{{ $title }}</h1>

            @yield('main')

            <footer>
                Footer
            </footer>

        </div>

        @include ('partials.bottom-assets')

    </body>

</html>
