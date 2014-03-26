<!doctype html>
<html>
    <head>
        <title>{{ $title or '' }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @include ('partials.assets-top')

    </head>

    <body>


        <header>
            <h1>Your sitename</h1>
            @include ('partials.user')
        </header>

        <div class="wrapper">


            @include ('partials.errors')

            <h1 contenteditable="true">{{ $title }}</h1>

            @yield('main')

            <footer>
                Footer
            </footer>

        </div>

        @include ('partials.assets-bottom')

    </body>

</html>
