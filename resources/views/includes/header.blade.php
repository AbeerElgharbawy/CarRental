<header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3">
              <div class="site-logo">
                <a href="{{route('index')}}"><strong>CarRental</strong></a>
              </div>
            </div>

            <div class="col-9  text-right">
              
              <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li><a href="{{route('index')}}" class="nav-link">Home</a></li>
                  <li><a href="{{route('listing')}}" class="nav-link">Listing</a></li>
                  <li><a href="{{route('testimonials')}}" class="nav-link">Testimonials</a></li>
                  <li><a href="{{route('blog')}}" class="nav-link">Blog</a></li>
                  <li class="active"><a href="{{route('about')}}" class="nav-link">About</a></li>
                  <li><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>