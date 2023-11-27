<?php
$ch = curl_init();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city = $_POST["city"];

    // Replace 'YOUR_API_KEY' with your OpenWeatherMap API key
    $apiKey = 'lat=44.34&lon=10.99&appid';
    $apiUrl = "api.openweathermap.org/data/2.5/forecast?lat=44.34&lon=10.99&appid=77911ecb48fc865383166533533de89b";

    // Fetch data from OpenWeatherMap API
    $weatherData = file_get_contents($apiUrl);
    $weatherJSON = json_decode($weatherData, true);

    // Display the forecast
    if ($weatherJSON && isset($weatherJSON['list'])) {
        echo '<div class="container">';

        echo '<div class="forecast">';

        foreach ($weatherJSON['list'] as $forecast) {
            $date = date('Y-m-d H:i:s', $forecast['dt']);
            $temperature = round($forecast['main']['temp'] - 273.15);
            $weatherDescription = ucfirst($forecast['weather'][0]['description']);
            $weatherIcon = $forecast['weather'][0]['icon'];

            echo '<div class="forecast-item">';
            echo '<p class="date">' . $date . '</p>';
            echo '<img class="weather-icon" src="http://openweathermap.org/img/w/' . $weatherIcon . '.png" alt="Weather Icon">';
            echo '<p class="temperature">' . $temperature . '°C</p>';
            echo '<p class="description">' . $weatherDescription . '</p>';
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
    } else {
        echo '<p class="error">Error fetching weather data. Please try again.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main-container">
        <div class="banner">
            <div class="w-[50vw] m-auto pt-44">
                <form>
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class='box-container grid grid-cols-5 gap-2 m-auto font-2xl '>
            <div class="box-1 card">
                day:1
                id: 804,
                main: "Clouds",
                description: "overcast clouds",
            </div>
            <div class="box-2 card">
                day:2
                id: 810,
                main: "Clouds",
                description: "overcast clouds",

            </div>
            <div class="box-3 card">
                day:3
                id: 805,
                main: "Clouds",
                description: "overcast clouds",
            </div>
            <div class="box-4 card">
                day:4
                id: 806,
                main: "Clouds",
                description: "clouds",
            </div>
            <div class="box-5 card">
                day:5
                id: 810,
                main: "Clouds",
                description: "overcast clouds",</div>
        </div>
    </div>
</body>

</html>