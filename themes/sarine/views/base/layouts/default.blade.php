<!doctype html>
<html>
    <head>
        <title>Lightgear dummy title</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{ Asset::statics() }}
        {{ Asset::styles() }}

    </head>

    <body>

        <header>
            Header
        </header>

        <div class="main">
            @include ('base::partials.errors')

            @yield('main')
        </div>

        {{ Asset::scripts() }}
    </body>

</html>
