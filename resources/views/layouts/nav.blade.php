<nav class="navbar navbar-expand-lg fixed-top bg-dark">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{route('frontend.landing')}}" rel="tooltip"  data-placement="bottom">
          DarkCode
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">

       <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Skills
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      @foreach($skills as $skill)
                            <a class="dropdown-item" 
                            href="{{ route('front.skill',['id' =>$skill->id]) }}">
                            {{ $skill->name }}
                            </a>
                      @endforeach  
                    </div>
                </li>

           <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      @foreach($categories as $category)
                            <a class="dropdown-item" 
                              href="{{ route('front.category',['id' =>$category->id]) }}">
                           {{ $category->name }}
                          </a>
                      @endforeach      
                    </div>
                </li>

             @guest   
            <li class="nav-item">
            <a href="{{url('/login')}}" class="nav-link">Login</a>
          </li>

          <li class="nav-item">
            <a href="{{url('/register')}}" class="nav-link">Register</a>
          </li>

            @else

             <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                       <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        <a class="dropdown-item" href="{{ route('front.profile',['id'=>auth()->user()->id]) }}">
                                        Profile
                                    </a>
                    </div>
                    
                </li>

            @endguest
            <form class="form-inline ml-auto" action="{{route('home')}}">
          <div class="form-group has-white">
            <input type="text" name="search" class="form-control" placeholder="Search">
          </div>
      </form>
        </ul>
      </div>
    </div>
  </nav>