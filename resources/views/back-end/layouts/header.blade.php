 <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">{{ $nav_title }}</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" style="margin-right: 20px">
         
                <span class="text-warning" style="margin-right: 20px" >Welcome {{auth()->user()->name}}</span> 
                
                <div class="text-right">
                  
                
                <a href="{{ route('logout') }}" title="Logout" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <!-- {{ __('Logout') }} -->
                  <i class="material-icons">logout</i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </div>
          </div>
        </div>
      </nav>