<link rel="stylesheet" href="{{ asset('my_css/sidebar.css') }}">
<div class="sidebar" style="float: left;">
            <div class="sidebar_1">
                <a class="aplication_name" href="{{ url('/') }}">
                    Park Maszyn V 0.2.1
                    
                    
                </a>
            </div>
            <!-- Tutaj umieść kod dla menu bocznego -->
            <div class="sidebar_menu">
                <a class="sidebar_menu_item_link" href="{{ route('employees.index') }}">
                    <div class="sidebar_menu_item"  role="button"> 
                        <li >Pracownicy</li> 
                    </div>
                </a>
                <a class="sidebar_menu_item_link" href="{{ route('machines.index') }}">
                    <div class="sidebar_menu_item"  role="button"> 
                        <li >Maszyny</li> 
                    </div>
                </a>

                <a class="sidebar_menu_item_link" href="{{ route('inspections.index') }}">
                    <div class="sidebar_menu_item"> 
                        <li>Przeglądy</li> 
                    </div>
                </a>

                <a class="sidebar_menu_item_link" href="{{ route('inspections.index') }}">
                    <div class="sidebar_menu_item"> 
                        <li>Raporty</li> 
                    </div>
                </a>
                @if (auth()->check() && auth()->user()->position && auth()->user()->position->permissions == 1)
                <a class="sidebar_menu_item_link" href="{{ route('companies.index') }}">
                    <div class="sidebar_menu_item"  role="button"> 
                        <li >Firmy</li> 
                    </div>
                </a>
                @endif
           
            <!-- Right Side Of Navbar -->
            </div>
            <ul class="sidebar_user">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
        </div>
