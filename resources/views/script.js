
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
