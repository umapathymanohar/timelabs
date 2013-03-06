<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Time-Labs</title>
        {{ Asset::styles() }}
        {{ Asset::scripts() }}
    </head>

    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="home">TimeSheet</a>
  
                </div>
            </div>
        </div>

        <div class="container">
            @include('plugins.status')
            @yield('content')
            <hr>
            <footer>
            <p>&copy; Icelabs 2012</p>    
            </footer>
        </div> <!-- /container -->
 
        @yield_section
    </body>
</html>