document.addEventListener(`DOMContentLoaded`, () => {
    // Displaying date 
    (function displayDate(){
        var currentDate = new Date(); 
        document.getElementById("display-date").innerHTML = currentDate.toDateString();
    })();

    const application = document.querySelector(".App"); 
    const history_page = document.querySelector(".App2"); 

    //Navigating between weather history and homescreen
    var history_button = document.querySelector('.history-button a');
    var back_button = document.querySelector('.icon2 a'); 

    history_button.addEventListener('mouseup', function(event){
        application.style.display = 'none';
        history_page.style.display = 'flex';
    })
    back_button.addEventListener('mouseup', function(event){
        application.style.display = 'block';
        history_page.style.display = 'none';
    })

    const searchBtn = document.querySelector('.search-btn');
    console.log(searchBtn);

    searchBtn.addEventListener( 'mousedown', () => {
        const cityName = document.querySelector('.search-txt').value;
        console.log(cityName);
        getGeographicalLocationAPI( cityName );
    })
    document.querySelector('.search-txt').addEventListener('keyup', function (event){
        if (event.key == "Enter" ){
            const cityName = document.querySelector('.search-txt').value;
            console.log(cityName);
            getGeographicalLocationAPI( cityName );
        }
    })

    function getGeographicalLocationAPI( cityName = 'Windsor' ){
        fetch(`http://api.openweathermap.org/geo/1.0/direct?q=${cityName}&appid=9964006f86896128a73526b1d2b01786`)
        .then(response => response.json())
        .then(geoData => {

            let latitude = geoData[0]['lat'];
            let longitude = geoData[0]['lon'];

            weatherAPI( latitude, longitude, cityName );

        })
        .catch(err => alert("Wrong city name."))
    }
    getGeographicalLocationAPI();
    //Calling API to get latitude and longiude of a particular city 

    function weatherAPI(latitude, longitude, cityName){
        fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=9964006f86896128a73526b1d2b01786`)
        .then(response => response.json())
        .then(weatherData => {
            
            const weatherDescription = `${weatherData['weather'][0]['description']}`;
            const temperature = (weatherData['main']['temp'])-273.15;
            const feels_like = (weatherData['main']['feels_like'])-273.15;
            const pressure = weatherData['main']['pressure'];
            const humidity = weatherData['main']['humidity'];
            const windSpeed = weatherData['wind']['speed'];
            const weatherState = `${weatherData['weather'][0]['main']}`;
            // const weatherState = `Haze`;
            


            //Inserting the fetched values to their respective classes in HTML
            // document.querySelector(".weather-type").innerHTML = weatherDescription.toUpperCase();
            // document.querySelector(".city-name").innerHTML = cityName;
            // document.querySelector(".temperature span").innerHTML = parseInt(temperature);
            // document.querySelector(".feels-like span").innerHTML = parseInt(feels_like);
            // document.querySelector(".pressure span").innerHTML = parseInt(pressure);
            // document.querySelector(".humidity span").innerHTML = parseInt(humidity);
            // document.querySelector(".wind span").innerHTML = parseInt(windSpeed);
            const application = document.querySelector(".App"); 
  

     if ( weatherState == "Clouds" ) //
            {
                document.querySelector("#weather-icon").className = "fa-solid fa-cloud";

                application.style.backgroundImage = "url('https://i.ibb.co/L5CqXbS/Clouds.png')";

            }
            else if ( weatherState == "Haze" || weatherState == "Mist" ) //
            {
                document.querySelector("#weather-icon").className = "fa-sharp fa-solid fa-smog";

                application.style.backgroundImage = "url('https://i.ibb.co/L5CqXbS/Clouds.png')";

            }
            else if ( weatherState == "Rain" ) //
            {
                document.querySelector("#weather-icon").className = "fa-solid fa-cloud-rain";

                application.style.backgroundImage = "url('https://i.ibb.co/S6q9Xb2/Rain-background.png')";

            }
            else if ( weatherState == "Thunderstorm" )//
            {
                document.querySelector("#weather-icon").className = "fa-solid fa-cloud-bolt";

                application.style.backgroundImage = "url('https://i.ibb.co/S6q9Xb2/Rain-background.png')";

            }
            else if ( weatherState == "Snow" )//
            {
                document.querySelector("#weather-icon").className = "fa-solid fa-snowflake";

                application.style.backgroundImage = "url('https://i.ibb.co/THTGTvf/Snow.png')";

            }
            else if ( weatherState == "Clear" )
            {
                document.querySelector("#weather-icon").className = "fa-solid fa-sun";

                application.style.backgroundImage = "url('https://i.ibb.co/5W9DYnG/clear-sky.png')";

            }
            else if ( weatherState == "Drizzle" )
            {
                document.querySelector("#weather-icon").className = "fa-solid fa-cloud-sun-rain";

                application.style.backgroundImage = "url('https://i.ibb.co/S6q9Xb2/Rain-background.png')";

            }

           


            (function weatherDesc(){
                console.log("Weather Description::");
                console.log(weatherDescription);
                console.log(temperature);
                console.log(feels_like);
                console.log(pressure);
                console.log(humidity);
                console.log(windSpeed);
                console.log(cityName);
                console.log('latitude: '+ weatherData['coord']['lat']);
                console.log('longitude '+ weatherData['coord']['lon']);
                console.log("state " + weatherState);
            })();   
        })
        .catch(err => alert("Wrong name."))
    }
})  
        

