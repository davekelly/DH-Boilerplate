<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>
            {{ Config::get('docs.title', 'Documentation') }}
            @if(!empty($title))
                : {{ $title }}
            @endif
        </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="{{ url('css/style.css') }}">
        <link rel="stylesheet" href="{{ url('css/docs.css') }}">

        <script src="{{ url('bower_components/modernizr/modernizr.js') }}"></script>
    </head>
    <body>
        <!--[if lte IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">
            <header>
                <nav>
                    <a class="pull-right" href="/">Home</a>
                </nav>

                <h1>
                    <a href="{{Config::get('docs.basehref')}}">
                        {{ Config::get('docs.title', 'Documentation') }}
                    </a>
                </h1>
            </header>
            <aside class="sidebar">
                @yield('sidebar')
            </aside>
            <section class="content">
                @yield('content')
                <nav>
                @if($prev)
                    <a href="{{ $prev['URI'] }}" title="Previous: {{ $prev['title'] }}">← {{ $prev['title'] }}</a> |
                @endif
                @if($next)
                    <a href="{{ $next['URI'] }}" title="Next: {{ $next['title'] }}">{{ $next['title'] }} →</a>
                @endif
                </nav>
                <footer>
                    <p>Documentation by <a href="http://github.com/daylerees/docs-reader" title="Documentation reader by Dayle Rees.">Docs reader</a>.</p>
                </footer>
            </section>
            <div class="clearfix"></div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{ url('bower_components/jquery-1.8.2.min.js') }}"><\/script>')</script>
        <script src="{{ url('/bower_components/google-code-prettify/js-modules/prettify.js') }}"></script>
        <script src="{{ url('js/plugins.js') }}"></script>
        <script src="{{ url('js/main.js') }}"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
