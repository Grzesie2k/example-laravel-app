<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <title>Quiz</title>
    </head>
    <body>
        <div class="container" id="app">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <app></app>
                </div>
                <footer class="small text-muted text-right col-md-6 col-md-offset-3">
                    <a href="https://github.com/Grzesie2k" target="_blank">
                    G. Kielak
                    </a>
                </footer>
            </div>
        </div>
        <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
        <script src="{{ URL::asset('js/vendor.js') }}"></script>
        <script src="{{ URL::asset('js/app.js') }}"></script>
    </body>
</html>
