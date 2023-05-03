<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="SamipMaharjan_2329533.css?v=<?php echo time(); ?>">
    <!-- <link rel="stylesheet" href="weatherHistory.css?v=<?php echo time(); ?>"> -->


</head>
<body>
    <?php include("server.php"); ?>
    
    <div class="App">
        <div class="top-section"> 

            <div class="date">
                <span id="display-date"></span>
            </div>
            <!-- date -->
            
            <!-- <div class="search-box"> -->
                    <form method="GET" action="server.php" class="search-box" id="search-form">
                        <input class="search-txt" type="text" placeholder="Search for a city." name="search-button">
                        <a class ="search-btn" href="#">
                            <i class="fas fa-search"></i>
                        </a>
                    </form>
                
            <!-- </div> -->
            <!-- Search bar -->

            <div class="nav-bar">
                <a href="" class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
            <!-- navbar  -->

        </div>
        <!-- top section -->

        <div class="mid-section">

            <div class="icon">
                <i id="weather-icon" class=""></i>
            </div>
            <!-- icon  -->

            <div class="weather-type">
                <?php echo $required_data["weather_description"] ?>
                <!-- Displays data fetched from API -->
            </div>
            <!-- weather-type  -->

        </div>
        <!-- mid-section -->

        <div class="bottom-section">
            <div class="city-name">
                <?php echo $required_data["cityName"] ?>
            </div>
            <!-- city name  -->
            
            <div class="for-flex">
                <div class="temperature-details">
                    <div class="temperature">
                        <h3><span>
                            <?php echo $required_data["temperature"] ?>
                        </span>°C</h3>
                    </div>
                    <!-- temperature  -->

                    <div class="feels-like">
                        <p>Feels like <span>
                        <?php echo $required_data["feels_like"] ?>
                        </span>°C </p>
                    </div>
                    <!-- feels like section  -->
                </div>

                <div class="history-button">
                    <a href="#">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <span> History</span>
                    </a>

                    
                </div>
            </div>
            <!-- For flex  -->
        </div>  
        <!-- bottom-section  -->    

        <div class="footer-section">
            <div class="pressure props">
                <p>Pressure: <span>
                <?php echo $required_data["pressure"] ?>
                </span> hPA</p>
            </div>
            <!-- Pressure  -->

            <div class="humidity props">
                <p>Humidity: <span>
                <?php echo $required_data["humidity"] ?>
                </span>%</p>
            </div>
            <!-- humidity  -->

            <div class="wind props">
                <p>Wind: <span>
                <?php echo $required_data["windSpeed"] ?>
                </span>km/h</p>
            </div>
            <!-- wind  -->
        </div>
        <!-- footer section  -->

    </div>
    <!-- App 1 section  -->

    <div class="App2">
        <div class = 'icon2'>
            <a href="#">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            
            <div class="history-text">
                <span>Weather History</span>
            </div>
            
        </div>

        
        <?php
        //Using the for each loop to display the weather history
            foreach( $stored_data as $row )
                { 
                    echo '<div class="history">'; 

                        echo "<div class = 'date2'>"; 
                            echo $row["date"]."<br>";
                        echo "</div>";

                        echo "<div class = 'weather_details'>";

                            echo "<div class = 'day'>";

                                $timestamp = strtotime( $row["date"] );
                                $day_of_week = date('l', $timestamp);
                                echo "<div>";
                                    echo $day_of_week."<br>";
                                echo "</div>";

                            echo "</div>";

                            echo "<div class = 'additional_details'>";

                                echo "<div class = 'upper_section'>"; 

                                    echo "<div class = 'max-temp'>"; 
                                        echo "<span style = 'font-size: 0.8rem';>Avg-temp:</span> ";
                                        echo "<span>".(($row["max_temp"]+$row["min_temp"])/2)."°C</span><br>";
                                    echo "</div>"; 
                                    
                                    echo "<div class = 'precipitation'>"; 
                                        echo "<span style = 'font-size: 0.8rem';>Precipitation: </span>".$row["precipitation"]." mm<br>";
                                    echo "</div>"; 

                                echo "</div>";

                                echo "<div class = 'lower_section'>";

                                    echo "<div class = 'humidity'>"; 
                                        echo "<span style = 'font-size: 0.8rem';>Humidity: </span>".$row["humidity"]." %<br>";
                                    echo "</div>"; 
                                    
                                    echo "<div class = 'wind'>"; 
                                        echo "<span style = 'font-size: 0.8rem';>Wind: </span>";
                                        echo "<span>".$row["wind"]." km/h</span><br>";
                                    echo "</div>"; 

                                echo "</div>    ";

                            echo "</div>"; 

                        echo "</div>";

                    echo '</div>';
                }
        ?>
            
    </div>
    <!-- App 2 section  -->

    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="https://kit.fontawesome.com/65ed642159.js" crossorigin="anonymous"></script>
    <script src="SamipMaharjan_2329533.js?v=<?php echo time(); ?>"></script>
</body>
</html>