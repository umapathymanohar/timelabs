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
                @section('post_navigation')
                    @if (Auth::check())
                        @include('plugins.loggedin_postnav')
                    @endif
                    @yield_section
                </div>
            </div>
        </div>

        <div  style="padding-top:60px"  class="container">
            @include('plugins.status')
            @yield('content')
 
        </div> <!-- /container -->
 
        @yield_section


            <footer>

            <div class="container">
                <p>&copy; Icelabs 2012</p>    
            </div>

            </footer>
    </body>
</html>


<script>
    $(function(){
    $('#retroclockbox1').xdretroclock();
})
</script>