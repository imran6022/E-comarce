
<div class="menu mb-100">
	<nav class="navbar navbar-expand-lg bg-menu fixed-top">
	  <a class="navbar-brand text-center mr-7" href="{{ route('index') }}"><h1>EasyMarket</h1></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">Menu</span>
	    <span class="icon-bar"></span>
	  </button>

	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    	    <!-- <ul class="navbar-nav ml-auto">
    	      <li class="nav-item">
    	        <a class="nav-link active" href="{{ route('index') }}"><b>Home</b> </a>
    	      </li>
    	      <li class="nav-item">
    	        <a class="nav-link" href="{{ url('/products') }}"><b>Products</b></a>
    	      </li>
    	    </ul> -->

            <ul class="navbar-nav ml-auto">
                <li class="nav-item mt-1">
                    <a class="nav-link" href="{{ route('cart') }}">
                        <button class="btn btn-danger btn-sm">
                           <i class="fa fa-shopping-cart"></i>
                                {{ App\Cart::totalItems() }}
                        </button>
                    </a>  
                </li>
                <li class="nav-item">
                    <form class="form-inline mt-2" action="{{ route('search') }}" method="get">
                        <input class="form-control mr-sm-2" row="30" type="search" name="search" placeholder="Search" aria-label="Search">
                          <div class="input-group-append">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                          </div>
                    </form>
              </li>
                 
            </ul>
	    </div>
    </nav>
</div>