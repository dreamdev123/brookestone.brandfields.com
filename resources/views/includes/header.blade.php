
<div class="headerSection fixed-header">
    <nav class="navbar navbar-expand-lg">
        <div class="container px-0" style="background-color: #214166; height: 75px;">
            <a class="navbar-brand pl-3" href="{{ route('landing.index') }}"><img src="{{ asset('images/logo/Brookestone1.svg') }}" class="img-fluid" alt="{{__('header.title')}}" title="{{__('header.title')}}" /></a>
            <div class="collapse navbar-collapse flex-grow-0 d-none d-lg-block" id="navbarNav">
                <ul class="nav navbar-nav">
                    <li class="nav-item" id="home-nav">
                        <a href="{{ route('landing.index') }}@if('landing.index' == Route::current()->getName())#home @endif" class="scroll @if('landing.index' != Route::current()->getName()) link @endif">HOME</a>
                    </li>
                    <li class="nav-item" id="about-nav">
                        <a href="{{ route('landing.index') }}#about" class="scroll @if('landing.index' != Route::current()->getName()) link @endif">ABOUT</a>
                    </li>
                    <li class="nav-item" id="approach-nav">
                        <a href="{{ route('landing.index') }}#approach" class="scroll @if('landing.index' != Route::current()->getName()) link @endif">APPROACH</a>
                    </li>
                    <li class="nav-item" id="strategy-nav">
                        <a href="{{ route('landing.index') }}#strategy" class="scroll @if('landing.index' != Route::current()->getName()) link @endif">STRATEGY</a>
                    </li>
                    <li class="nav-item" id="compound-nav">
                        <a href="{{ route('landing.index') }}#compound" class="scroll @if('landing.index' != Route::current()->getName()) link @endif">COMPOUND</a>
                    </li>
                    <li class="nav-item" id="participate-nav">
                        <a href="{{ route('landing.index') }}#participate" class="scroll @if('landing.index' != Route::current()->getName()) link @endif">PARTICIPATE</a>
                    </li>
                    @guest
                        <li class="nav-item contact-nav">
                            <a href="{{ route('login') }}">LOGIN</a>
                        </li>
                        <li class="nav-item contact-nav">
                            <a href="{{ route('register') }}">JOIN</a>
                        </li>
                    @else
                        <li class="nav-item contact-nav">
                            <a href="{{ route('home') }}">ACCOUNT</a>
                        </li>
                    @endguest
                </ul>
            </div>
            <div class="meanmenu-div d-block d-lg-none">
                <nav class="menamenu-nav">
                    <ul>
                        <li >
                            <a href="{{ route('landing.index') }}@if('landing.index' == Route::current()->getName())#home @endif" class="scroll @if('landing.index' != Route::current()->getName()) link @endif">HOME</a>
                        </li>
                        <li >
                            <a href="{{ route('landing.index') }}#about" class="scroll @if('landing.index' != Route::current()->getName()) link @endif">ABOUT</a>
                        </li>
                        <li >
                            <a href="{{ route('landing.index') }}#approach" class="scroll @if('landing.index' != Route::current()->getName()) link @endif">APPROACH</a>
                        </li>
                        <li >
                            <a href="{{ route('landing.index') }}#strategy" class="scroll @if('landing.index' != Route::current()->getName()) link @endif">STRATEGY</a>
                        </li>
                        <li >
                            <a href="{{ route('landing.index') }}#compound" class="scroll @if('landing.index' != Route::current()->getName()) link @endif">COMPOUND</a>
                        </li>
                        <li >
                            <a href="{{ route('landing.index') }}#participate" class="scroll @if('landing.index' != Route::current()->getName()) link @endif">PARTICIPATE</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}">LOGIN</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">JOIN</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </nav>
</div>

<script type="text/javascript">
    $(document).bind('scroll',function(e){
      $('section').each(function(){
          if ($(this).offset().top < window.pageYOffset + 100 && $(this).offset().top + $(this).height() > window.pageYOffset + 5){
            if($(this).attr('id') == "home"){
              $('li.nav-item').removeClass('active');
              $("#home-nav").toggleClass('active');
            } else if($(this).attr('id') == "about"){
              $('li.nav-item').removeClass('active');
              $("#about-nav").toggleClass('active');
            } else if($(this).attr('id') == "approach"){
              $('li.nav-item').removeClass('active');
              $("#approach-nav").toggleClass('active');
            } else if($(this).attr('id') == "strategy"){
              $('li.nav-item').removeClass('active');
              $("#strategy-nav").toggleClass('active');
            } else if($(this).attr('id') == "compound"){
              $('li.nav-item').removeClass('active');
              $("#compound-nav").toggleClass('active');
            } else if($(this).attr('id') == "participate"){
              $('li.nav-item').removeClass('active');
              $("#participate-nav").toggleClass('active');
            }
          }
      });
  });
</script>