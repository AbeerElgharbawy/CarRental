<!doctype html>
<html lang="en">

 @include('includes.head')

  <body>

    
    <div class="site-wrap" id="home-section">

    @include('includes.head')
    @include('includes.header')
    @include('includes.heroInner')
    @yield('contents')
    @include('includes.footer')
    </div>
    @include('includes.jsLib')
  </body>

</html>

