<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('mainView')}}"><img src="{{asset('details/'. $detail->website_logo)}}" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @foreach($ecomcategories as $item)
          <li class="nav-item dropdown">
            
            <a class="nav-link ecom_cat" data-value="{{$item->id}}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{$item->category_name}}
            </a>
            <ul class="dropdown-menu subcatEcom" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="#"></a>
              </li>
            </ul>
          </li>
            @endforeach
        </ul>
        <form class="d-flex">
          <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
          <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
          <div class="relative">
              @if (Route::has('login'))
                  <div class="hidden  top-0 right-0 px-6 py-4 sm:block">
                      @auth
                          <a href="{{route('dashboard.view') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                      @else
                          <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                          @if (Route::has('register'))
                              <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                          @endif
                      @endauth
                  </div>
              @endif
          </div>
        </form>
      </div>
    </div>
  </nav>
</div>

