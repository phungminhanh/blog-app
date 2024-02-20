<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Responsive Navbar with Submenu</title>
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/media_query.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}"> 
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/zGJyfy9hLroC6BQbqnK+v38mx9QUZTV3SHvKX2g7s0x/FJwb4QjI065k" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcBA8rxcJNlsOi9R2b58api9+l93NVWD0+nk9DqLS6d40i9m1TVQCk" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style_1.css') }}"> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="{{ asset('js/modernizr-3.5.0.min.js') }}"></script>
    <style>
      .thumbnail-container {
    overflow: hidden;
    height: 200px; /* Đặt chiều cao mong muốn */
}

.thumbnail-img {
    width: 100%; /* Ảnh sẽ căn chỉnh tự động theo chiều rộng của container */
    height: auto;
    object-fit: cover; /* Ẩn bớt phần thừa và giữ nguyên tỷ lệ */
}

      body {
    padding-top: 56px;
}
.header-item{
  background-color:aqua;
  height: 30px;
  width: 30px;
  display: inline-block;
  margin-right: 40px; 
  
  
}
.div-header-left
{
  margin-left: 40px;
}
.top-header
{
  margin-left: 40px;
}
#datetime {
  font-size: 20px;
}
#weather-icon {
  width: 20px;  
  height: 20px;
  filter: invert(1); 
}
.weather{
  display: inline-block;
}
header
{
  background-color: #fcfcfc;
  color: rgb(200, 200, 200);
  padding: 20px;
  display: flex;
  align-items: center;
  
}

.div-header-left
{
 display: flex;
 align-items: center;
}
      .sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 60px;
}
nav.sticky {
  background-color: #f8f9fa;
  position: sticky;
  top: 0;
  z-index: 1000;
  margin-bottom: 20px; }
body {
  padding-top: 56px; }

header {
  background-color: #ffffff;
  color: rgb(16, 12, 12);
  text-align: center;
  padding: 10px;
}

nav {
  background-color: #f8f9fa;
  
}

.content-box {
  background-color: #e9ecef;
  padding: 20px;
  margin-bottom: 10px;
  border: 1px solid #ced4da;
}

.main-section {
  padding: 20px;
}

.side-section {
  background-color: #f8f9fa;
  padding: 20px;
  margin-bottom: 20px;
}

#citySelector {
          display: inline-block;
          position: relative;
      }

      #citySelector:hover #cityList {
          display: block;
      }

      #cityList {
          display: none;
          position: absolute;
          top: 100%;
          left: 0;
          background-color: #f1f1f1;
          box-shadow: 0 8px 16px rgba(0,0,0,0.2);
          z-index: 1;
          min-width: 160px;
      }

      #cityList a {
          color: #333;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
      }

      #cityList a:hover {
          background-color: #ddd;
      }

      #weatherInfo {
          text-align: center;
          margin-top: 20px;
      }

      #weatherInfo img {
          width: 50px;
          height: 50px;
      }
      header {
    background-color: #333;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
  }

  #searchBar {
    display: flex;
    align-items: center;
  }

  #searchInput {
    padding: 5px;
    margin-right: 10px;
  }

  

  #notificationIcon,
  #loginIcon {
    font-size: 20px;
    margin-right: 10px;
    color: white;
    cursor: pointer;
  }

  #weatherInfo {
    display: flex;
    align-items: center;
  }

  #citySelector {
    margin-right: 10px;
  }

  #selectedCity {
    padding: 5px;
  }

  #dateTime,
  #temperature,
  #temperature-icon img {
    margin-left: 10px;
  }
  .header-section
  {

      display: flex;
      align-items: center;
  }
  #notificationIcon
  {
    color: white;
  }
  #notificationIcon:hover
  {
    font-size: 150%;
  }
  #notificationIcon:active
  {
      color: red;
  }
  #loginIcon:hover
  {
     color: green;
  }
  #loginIcon:active
  {
      font-size: 150%;
  }
  
  #citySelector
  {
      display: flex;
      align-items: center;
  }
  .ma
  {
    font-size: 300%;  
  }
header {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px;
}

nav {
    background-color: #f8f9fa;
    
}

.content-box {
    background-color: #e9ecef;
    padding: 20px;
    margin-bottom: 10px;
    border: 1px solid #ced4da;
}

.main-section {
    padding: 20px;
}

.side-section {
    background-color: #f8f9fa;
    padding: 20px;
    margin-bottom: 20px;
}

footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px;
}
.sticky {
    position: fixed;
    top: 0;
    width: 100%;
  }
  
  .sticky + .content {
    padding-top: 60px;
  }
  nav.sticky {
    background-color: #f8f9fa;
    position: sticky;
    top: 0;
    z-index: 1000;
    margin-bottom: 20px; 
}
#popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    align-items: center;
    justify-content: center;
    z-index: 1000;
  }

  .popup-content {
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    text-align: center;
  }

  .close-btn {
    cursor: pointer;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  .toggle-btn {
    cursor: pointer;
    color: blue;
    text-decoration: underline;
  }

  /* Style for active form */
  .active-form {
    display: block;
  }

  .inactive-form {
    display: none;
  }
  #currentcity
  {
    display: none;
  }
  label
  {
    color: black;
  }
  /* CSS cho popup */
.popup-content {
  text-align: center;
  position: relative;
}

.close-btn {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 20px;
  cursor: pointer;
  color: #555;
}

.close-btn:hover {
  color: #000;
}

/* CSS cho form */
#login-form,
#register-form {
  margin-top: 20px;
}

form {
  margin-top: 10px;
}

label {
  display: block;
  margin-bottom: 5px;
  color: #333;
}

input {
  width: calc(100% - 20px);
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.button-form {
  background-color: #007BFF;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

/* CSS cho toggle button */
.toggle-btn {
  color: #007BFF;
  cursor: pointer;
  text-decoration: underline;
  margin-top: 10px;
  transition: color 0.3s;
}

.toggle-btn:hover {
  color: #0056b3;
}
#loginIcon
{
  font-size: 97%;
}
#searchBar {
  display: flex;
  align-items: center;
}

#searchInput {
  padding: 8px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 5px;
  outline: none;
  width: 200px; 
}

#searchButton {
  padding: 8px 12px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  background-color: #f1f1f1;
  outline: none;
}

#searchButton:hover {
  background-color: #ddd;
}

.notification {
        animation: fadeOut 3s forwards;
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
        }
    }

    .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
       
        .btn-secondary {
        background: none; /* hoặc background: transparent; */
    }
  
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1; 
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.dropdown-item {
  transition: all 0.2s ease-in-out;
}

.dropdown-item:hover {
  background-color: #f2f2f2;
  color: #000;
}

.dropdown-item:active {
  background-color: #ddd;
}

    </style>
</head>
<body>
    <header class="row ">
        <div class="col-lg-4 ma">
            <H1>TIMENEWROMANS</H1>
            
     
        </div>
     <div class=" right col-lg-6" >
        <div id="weatherInfo ">
            <div id="citySelector">
                <select id="selectedCity" class="selectedCity" onchange="changeCity(this.value)">
                    <option value="Ha Noi">Ha Noi</option>
                    <option value="Ho Chi Minh">Ho Chi Minh</option>
                    <option value="My location" >Current location</option>
                   
                </select>
                <span id="currentcity"></span>
                <span id="dateTime"></span>
                <span id="temperature"></span>
                <span id="temperature-icon"><img id="weatherIcon" alt="Weather Icon" title="Mô tả thời tiết"></span>
            </div>
        </div> 
        <script>
          function onoffFunction() {
              var button = document.getElementById("toggleButton1");z
              if (button.innerHTML === "Off") {
                  button.innerHTML = "On";
                  getWeatherByLocation();
              } else {
                  button.innerHTML = "Off";
                  
              }
          }
      </script>
        <div class="header-section ">
        <div id="searchBar">
            <input type="text" id="searchInput" placeholder="Tìm kiếm...">
            <button id="searchButton">Tìm kiếm</button>
          </div>
      
          
          <div>
          @if(Auth::check() && $userUnreadNotificationsCount > 0)
          <div style="background-color: white"><h6 style="color: red;">{{$userUnreadNotificationsCount}}</h6></div>
          <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="material-icons">notifications</span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="notificationDropdown">
        @foreach($notifications as $notification)
        <li><a class="dropdown-item" href="{{ route('article1', ['id1'=>$notification->id_post,'id2'=>$notification->id ]) }}">{{$notification->content}}</a></li>
       @endforeach
    </ul>
</div>
          
          @else
            <span  id="notificationIcon" class="material-icons">notifications</span>
            
            
            @endif
            </div>

     
</body>
</html>

@if($errors->any())
        <div class="popup alert alert-danger" id="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="popup alert alert-success" id="success1-message">
            {{ session('success') }}
        </div>
    @endif 
    @if(session('error'))
        <div class="popup alert alert-success" id="success-message">
            {{ session('error') }}
        </div>
    @endif 

    <!-- Include jQuery or any other JavaScript library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Your custom JavaScript code -->
    <script>
        // Display pop-up on page load
        $(document).ready(function(){
            $("#error-message, #success-message, #success1-message").fadeIn().delay(3000).fadeOut();
        });
    </script>

@if(Auth::check())
<div class="dropdown">
  <button class="dropdown-button">Account Options</button>
  <div class="dropdown-content">
  <a class="dropdown-item" href="{{ route('logout') }}">
  <span class="nav-link-text">Logout</span>
</a>
<a class="dropdown-item" href="{{ route('user.profile') }}">
  <span class="nav-link-text">Profile</span>
</a>

  </div>
</div>


@else
   
            <span id="loginIcon" onclick="togglePopup()" ><i class="fas fa-user"></i></span>
         
          <div id="popup">
            <div class="popup-content">
              <span class="close-btn" onclick="togglePopupX()">&times;</span>
        
              <!-- Login Form -->
              <div id="login-form" class="active-form">
                <h2>Login</h2>
                <form method="POST" action="{{ url('/login') }}">
                 @csrf
                  <label for="user_name">Username:</label>
                  <input type="text" id="user_name" name="user_name"  required>
                  <br>
                  <label for="password">Password:</label>
                  <input type="password" id="password" name="password" required>
                  <br>
                  
                  <button class="button-form" type="submit">Login</button>
                </form>
                <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                <div class="toggle-btn" onclick="toggleForms()">Don't have an account? Register here.</div>
              </div>
        
              <!-- Register Form -->
              <div id="register-form" class="inactive-form">
                <h2>Register</h2>
                <form method="POST" action="{{ url('/register')}}">
                @csrf
                  <label for="username">Username:</label>
                  <input type="text" id="username" name="username"  required>
                  <br>
                  <label for="password">Password:</label>
                  <input type="password" id="password" name="password"   required>
                  <br>
                  <label for="email">Email:</label>
                  <input type="email" id="email" name="email" required>
                  <button class="button-form" submit">Register</button>
                </form>
                <div class="toggle-btn" onclick="toggleForms()">Already have an account? Login here.</div>
              </div>
        
            </div>
          </div>
            
          <script>
            function togglePopup() {
               document.getElementById("popup").style.display='flex';
              
            }
            function togglePopupX() {
               document.getElementById("popup").style.display='none';
              
            }
        
            function toggleForms() {
              var loginForm = document.getElementById("login-form");
              var registerForm = document.getElementById("register-form");
        
              
              loginForm.classList.toggle("active-form");
              loginForm.classList.toggle("inactive-form");
        
              registerForm.classList.toggle("active-form");
              registerForm.classList.toggle("inactive-form");
            }
          </script>
          @endif
          
          
        </div>
        </div>
        
    </header>
    
<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">World</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Politics</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Business
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Submenu 1</a></li>
                            <li><a class="dropdown-item" href="#">Submenu 2</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Technology</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box fadeInLeft animated-fast" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                </div>
               
                
                @foreach($posts as $index => $post)
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="{{ asset('storage/' . $post->thumbnail) }}" style="max-width: 390px; max-height: 260px;" alt=""></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box fadeInUp animated-fast">
                        <a href="{{ route('article', $post->id) }}" class="fh5co_magna py-2">{{ $post->title }} </a> <a href="#" class="fh5co_mini_time py-3"> {{ $post->author->stagename }} -
                        {{ $post->created_at }} </a>
                        <div class="fh5co_consectetur"> {{ $post->teaser }}
                        </div>
                        @can('deletePost')
            <a onclick="return confirm('Are you sure?')" href="{{ route('delete', $post->id) }}" class="btn btn-danger">Delete</a>
        @endcan

        @can('updatePost')
            <a href="{{ route('edit', $post->id) }}" class="btn btn-warning">Update</a>
        @endcan

        @can('admin')
            @if($post->publish_at)
                <a href="{{ route('unpublish', $post->id) }}" class="btn btn-info">Unpublish</a>
            @else
                <a href="{{ route('publish', $post->id) }}" class="btn btn-success">Publish</a>
            @endif
        @endcan
                    </div>
                </div>
                @endforeach
               
                
                
                
            </div>
            <div class="col-md-3 animate-box fadeInRight animated-fast" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Lastest</div>
                </div>
                <div class="clearfix"></div>
               
                @foreach($latestPosts as $latestPost)
                <div class="row pb-3">
                @if( $latestPost->thumbnail)
                    <div class="col-5 align-self-center">
                    
                        <img  src="{{ asset('storage/' .  $latestPost->thumbnail) }}" style="max-width: 88.75px; max-height: 60px;" alt="img" class="fh5co_most_trading">
                    </div>
                    @endif
                    <div class="col-7 paddding">
                    <a href="{{ route('article',  $latestPost->id) }}">  <div class="most_fh5co_treding_font"> {{  $latestPost->title }}</div></a>
                        <div class="most_fh5co_treding_font_123"> {{  $latestPost->created_at }}</div>
                    </div>
                </div>
                @endforeach
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
               
                 @foreach($top3Posts as $top3Post)
                <div class="row pb-3">
                @if($top3Post->thumbnail)
                    <div class="col-5 align-self-center">
                    
                        <img  src="{{ asset('storage/' . $top3Post->thumbnail) }}" style="max-width: 88.75px; max-height: 60px;" alt="img" class="fh5co_most_trading">
                    </div>
                    @endif
                    <div class="col-7 paddding">
                    <a href="{{ route('article', $top3Post->id) }}">  <div class="most_fh5co_treding_font"> {{ $top3Post->title }}</div></a>
                        <div class="most_fh5co_treding_font_123"> {{ $top3Post->created_at }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12 text-center pb-4 pt-4">
            @if ($posts->lastPage() > 1)
                    <a href="{{ $posts->previousPageUrl() }}" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                    @for ($i = 1; $i <= $posts->lastPage(); $i++)
                        <a href="{{ $posts->url($i) }}" class="btn_pagging {{ $posts->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                    @endfor
                    <a href="{{ $posts->nextPageUrl() }}" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
                @endif
             </div>
        </div>
    </div>
</div>


                    
                   
                    
                
</div>
<script>
    window.onscroll = function() {myFunction()};
    
    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;
    
    function myFunction() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
      } else {
        navbar.classList.remove("sticky");
      }
    }
    </script>
    <script>async function getWeatherByLocation() {
        try {
          
          navigator.geolocation.getCurrentPosition(async (position) => {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
      
           
            const apiKey = '9ffbc24db6da404118e93cdc0a9db285'; 
            const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${apiKey}`);
            const data = await response.json();
      
            const cityName = data.name;
            const temperature = Math.round(data.main.temp - 273.15); 
      
            document.getElementById("city").innerHTML = ` ${cityName}`;
            document.getElementById("temperature").innerHTML = `${temperature}°C`;
            document.getElementById("weather-icon").src = `http://openweathermap.org/img/wn/${data.weather[0].icon}.png`;
      
         
            updateDateTime();
          });
        } catch (error) {
          console.error("Error fetching weather data:", error);
          document.getElementById("weather").innerHTML = "Unable to fetch weather data";
        }
      }
      
    
      function updateDateTime() {
        const currentDate = new Date();
        const formattedDate = currentDate.toLocaleDateString();
        document.getElementById("date").innerHTML = `${formattedDate}`;
      }
      
      
      getWeatherByLocation();</script>
      <script>
        document.getElementById('notificationIcon').onclick = function(){
	    swal("Good job!", "You clicked the button!", "success");
};
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="C:\laragon\www\blog-app\resources\views\script.js"></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>
<script >
    const apiKey = "9ffbc24db6da404118e93cdc0a9db285";

    const weatherDescriptionMapping = {
        'Clear': 'Trời quang đãng',
        'Clouds': 'Có mây',
        'Rain': 'Mưa',
        'Drizzle': 'Mưa phùn',
        'Thunderstorm': 'Bão giông',
        'Snow': 'Tuyết',
        'Mist': 'Sương mù',
        'Fog': 'Sương mù dày đặc'
        
    };

    const weatherIconDescriptionMapping = {
        '01d': 'Trời quang đãng',
        '01n': 'Trời quang đãng (đêm)',
        '02d': 'Có mây ít',
        '02n': 'Có mây ít (đêm)',
        '03d': 'Có mây',
        '03n': 'Có mây (đêm)',
        '04d': 'Nhiều mây',
        '04n': 'Nhiều mây (đêm)',
        '09d': 'Mưa nhỏ',
        '09n': 'Mưa nhỏ (đêm)',
        '10d': 'Mưa',
        '10n': 'Mưa (đêm)',
        '11d': 'Bão giông',
        '11n': 'Bão giông (đêm)',
        '13d': 'Tuyết',
        '13n': 'Tuyết (đêm)',
        '50d': 'Sương mù',
        '50n': 'Sương mù (đêm)'
    };

    function changeCity(city) {
        if (city==("My location"))
        {
            var x = document.getElementById("currentcity");
  
           x.style.display = "block";
        getWeatherByLocation();
        }else{
            var x = document.getElementById("currentcity");
  
           x.style.display = "none";
  
        getWeatherData(city);}
    }

    function toggleAutoDetect() {
        const autoDetectCheckbox = document.getElementById("autoDetect");
        if (autoDetectCheckbox.checked) {
            autoDetectWeather();
        }
    }

    function autoDetectWeather() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                position => {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;

                    fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${apiKey}&units=metric`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Không thể lấy dữ liệu thời tiết');
                            }
                            return response.json();
                        })
                        .then(data => {
                            const cityName = data.name ? data.name : "Unknown City";
                            const dateTime = new Date(data.dt * 1000);
                            const temperature = data.main.temp;
                            const iconCode = data.weather[0].icon;
                            const weatherDescription = data.weather[0].description;

                            const vietnameseDescription = weatherDescriptionMapping[weatherDescription] || weatherDescription;

                         
                            document.getElementById("dateTime").innerText = formatDateTime(dateTime);
                            document.getElementById("temperature").innerText = `Nhiệt độ: ${temperature}°C`;
                            document.getElementById("weatherIcon").src = `http://openweathermap.org/img/w/${iconCode}.png`;
                            document.getElementById("weatherIcon").title = weatherIconDescriptionMapping[iconCode] || vietnameseDescription;
                        })
                        .catch(error => {
                            console.error("Lỗi khi lấy dữ liệu thời tiết:", error.message);
                        });
                },
                error => {
                    console.error("Lỗi khi lấy tọa độ:", error);
                }
            );
        } else {
            console.error("Trình duyệt không hỗ trợ Geolocation.");
        }
    }

    function getWeatherData(city) {
        const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                const cityName = data.name ? data.name : "Unknown City";
                const dateTime = new Date(data.dt * 1000);
                const temperature = data.main.temp;
                const iconCode = data.weather[0].icon;
                const weatherDescription = data.weather[0].description;

                const vietnameseDescription = weatherDescriptionMapping[weatherDescription] || weatherDescription;

              
                document.getElementById("dateTime").innerText = formatDateTime(dateTime);
                document.getElementById("temperature").innerText = `Nhiệt độ: ${temperature}°C`;
                document.getElementById("weatherIcon").src = `http://openweathermap.org/img/w/${iconCode}.png`;
                document.getElementById("weatherIcon").title = weatherIconDescriptionMapping[iconCode] || vietnameseDescription;
            })
            .catch(error => console.error("Lỗi khi lấy dữ liệu thời tiết:", error));
    }

    function formatDateTime(dateTime) {
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', timeZone: 'Asia/Ho_Chi_Minh' };
        return dateTime.toLocaleString('vi-VN', options);
    }

   
    getWeatherData("Hà Nội");
async function getWeatherByLocation() {
        try {
          
          navigator.geolocation.getCurrentPosition(async (position) => {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
      
           
            const apiKey = '9ffbc24db6da404118e93cdc0a9db285'; 
            const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${apiKey}`);
            const data = await response.json();
      
            const cityName = data.name;
            const temperature = Math.round(data.main.temp - 273.15); 
      
            document.getElementById("currentcity").innerHTML = ` ${cityName}`;
            document.getElementById("temperature").innerHTML = `${temperature}°C`;
            document.getElementById("weather-icon").src = `http://openweathermap.org/img/wn/${data.weather[0].icon}.png`;
      
         
            updateDateTime();
          });
        } catch (error) {
          console.error("Error fetching weather data:", error);
          document.getElementById("weather").innerHTML = "Unable to fetch weather data";
        }
      }
      
    
      function updateDateTime() {
        const currentDate = new Date();
        const formattedDate = currentDate.toLocaleDateString();
        document.getElementById("date").innerHTML = `${formattedDate}`;
      }
      
      
      getWeatherByLocation();
</script>


</body>
</html>
