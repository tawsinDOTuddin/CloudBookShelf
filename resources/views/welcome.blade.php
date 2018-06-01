<!DOCTYPE html>
<html>
<title>Cloud BookShelf</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('css/w3.css')}}"/>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">    
<!--link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card-2">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ABOUT</a>
    <a href="#books" class="w3-bar-item w3-button w3-padding-large w3-hide-small">BOOKS</a>
    @if(Auth::guest())<a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">LOGIN</a>@endif
    

    <div class="w3-right w3-padding-large">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <!--a class="w3-button" href="{{ route('login') }}">LOGIN</a-->
                            <a class="w3-right w3-bar-item w3-button w3-padding-large w3-hide-small" href="{{ route('register') }}">New?  Register Here</a>
                        @else
                        <a href="#" class="w3-bar-item"></a> 
                        <div class="w3-dropdown-hover" style="padding-right: 48px" >
    <button class="w3-button w3-black">{{ Auth::user()->name }}</button>
    <div class="w3-dropdown-content w3-bar-block w3-border">
                <div><a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                    class="w3-bar-item w3-button">
                    Logout
                      </a> 
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                </form>
                      </div>
                      <a href="/profile/{{ Auth::user()->username }}" class="w3-bar-item w3-button">My Profile</a>
                       <a href="/books/create" class="w3-bar-item w3-button">Upload Books</a>
                       <a href="/books" class="w3-bar-item w3-button">Browse Books</a>
                       <a href="/search" class="w3-bar-item w3-button">Search</a>
                </div>
              </div>
                            </div>
                                </div>

                        @endif
                    </div>  
                      
  </div>
</div>


<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- show Images -->
  <div class="w3-display-container w3-center">
    <img src="{{asset('images/library.jpg')}}" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Cloud BookShelf</h3>
      <p><b>Your very own online library</b></p>   
    </div>
  </div>

 
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="about">
    <h2 class="w3-wide">About Cloud BookShelf</h2>
    <p class="w3-opacity"><i>Books stored on the cloud</i></p>
    <p class="w3-justify">Upload your books, share them with others. Write reviews. Download the one's you want to read
    offline. Build your personal library and read your pdfs wherever you like. Everything's possible here in CloudBookShelf.</p>
    <div class="w3-row w3-padding-32">
      <div class="w3-third">
        <p></p>
        <img src="/w3images/bandmember.jpg" class="w3-round w3-margin-bottom" alt="" style="width:60%">
      </div>
      <div class="w3-third">
        <p></p>
        <img src="/w3images/bandmember.jpg" class="w3-round w3-margin-bottom" alt="" style="width:60%">
      </div>
      <div class="w3-third">
        <p></p>
        <img src="/w3images/bandmember.jpg" class="w3-round" alt="" style="width:60%">
      </div>
    </div>
  </div>

  <!-- The Book Section -->
  <div class="w3-black" id="books">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      <h2 class="w3-wide w3-center">BOOKS</h2>
      <p class="w3-opacity w3-center"><i>You may like:</i></p><br>

      <ul class="w3-ul w3-border w3-white w3-text-grey">
        <li class="w3-padding"><a href="http://www.planetpublish.com/wp-content/uploads/2011/11/Treasure_Island_NT.pdf">Treasure Island </a></li>
        <li class="w3-padding"><a href="http://www.planetpublish.com/wp-content/uploads/2011/11/The_Adventures_of_Tom_Sawyer_NT.pdf">The adventures of Tom Sawyer </a></li>
        <li class="w3-padding"><a href="http://www.pinocchio.it/pagine/traduzione_testo/Adventures_of_Pinocchio.pdf">Pinoccio </a></li>
        @if (Auth::user())
        <li class="w3-padding"><a href="\books">Browse more books </a></li>
         @endif
      </ul>
        </div>
      </div>
    </div>
  </div>

  
  @if (Auth::guest())
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide">LOGIN</h2>

    <div class="w3-row w3-padding-32">
      
      <div class="w3-container">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input placeholder="Email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
            </div>
            <div class="w3-row-padding form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
             @endif
            </div>
          </div>
           <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
          
          <button class="w3-button w3-black w3-section w3-center" type="submit">LOGIN</button>
        </form>
      </div>
      <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
    </div>
  </div>
  @endif

</div>

</body>
</html>
