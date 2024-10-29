
<div class="headerSection fixed-header">
    <nav class="navbar navbar-expand-sm">
        <div class="container" style="background-color: #214166; height: 75px;">
            <a class="navbar-brand pl-3" href="{{ route('home') }}"><img src="{{ asset('images/logo/Brookestone1.svg') }}" class="img-fluid" alt="{{__('header.title')}}" title="{{__('header.title')}}" /></a>
            <div class="collapse navbar-collapse flex-grow-0 d-none d-sm-block" id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item contact-nav">
                        <a href="{{ route('home') }}" class="scroll">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 15 15"><path fill="currentColor" fill-rule="evenodd" d="M1.5 3a.5.5 0 0 0 0 1h12a.5.5 0 0 0 0-1h-12ZM1 7.5a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 0 1h-12a.5.5 0 0 1-.5-.5Zm0 4a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 0 1h-12a.5.5 0 0 1-.5-.5Z" clip-rule="evenodd"/></svg>
                        </a>
                    </li>
                    <li class="nav-item contact-nav">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('SIGN OUT') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <div class="meanmenu-div d-block d-sm-none">
                <nav class="menamenu-nav">
                    <ul>
                        <li >
                            <a href="{{ route('home') }}" class="scroll">Dashboard</a>
                        </li>
                        <li >
                            <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('SIGN OUT') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </nav>
</div>
