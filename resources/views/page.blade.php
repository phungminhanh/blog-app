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
    <style>
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




    </style>
</head>
<body>
    <header class="row ">
        <div class="col-lg-4 ma">
            <H1>TiMENEWROMANS</H1>
     
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
              var button = document.getElementById("toggleButton1");
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
      
          
          
            <span  id="notificationIcon" class="material-icons">notifications</span>
          
      
            @if(Auth::check())
   
    
        @csrf
        <a href="{{ route('logout') }}"> <button type="submit" class="btn btn-danger">Logout</button></a>
    </form>
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
<div class="container main-section">
    <div class="row">
        
        <div class="col-md-8">
            
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="content-box">
                            <h2>Top News</h2>
                            <p>Content for Top News</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="content-box">
                            <h2>Featured Story 1</h2>
                            <p>Content for Featured Story 1</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="content-box">
                            <h2>Featured Story 2</h2>
                            <p>Content for Featured Story 2</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="row">
            @foreach($posts as $index => $post)
                <div class="col-md-6">
                    <div class="content-box">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->teaser }}</p>
                        <a href="{{ route('article', $post->id) }}" class="btn btn-primary"><button class="btn btn-primary">Read More</button></a> </div>
                     @can('deletePost')
                        <a onclick="return confirm('Are you sure?')" href="{{ route('delete', $post->id) }}" class="btn btn-danger">Delete</a>
                       @endcan
                     @can('updatePost')
                       <a href="{{ route('edit', $post->id) }}" class="btn btn-primary">Update</a>
                     @endcan
                </div>
            @endforeach
                
            </div>
            {{ $posts->appends(request()->query()) }}
            <div class="content-box">Latest News</div>
           </div>
           <div class="col-md-4">
            <div class="side-section">
                <h2>Opinions</h2>
                <div class="content-box">Opinion 1</div>
                <div class="content-box">Opinion 2</div>
            </div>
        
        </div>
       
                    
                    <!-- Carousel Slide 2 -->
                    <div id="myCarousel2" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="content-box">
                                    <h2>Another Slide</h2>
                                    <p>Content for another slide</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="content-box">
                                    <h2>Slide 2</h2>
                                    <p>Content for Slide 2</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="content-box">
                                    <h2>Slide 3</h2>
                                    <p>Content for Slide 3</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel2" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel2" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
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
