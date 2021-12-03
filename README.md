# weatherApp

Weather app is a small service which gives you products recomendation by most recurring weather of each day for three days in your selected Lithuania city.

Service is created with PHP framework - Laravel and it used MySQL database.

Tools used in project: Faker - creates sample data HTTP Client - helps to send request and get response to/from API PHP unit test - creates automatic test for service

To run project:

    Open folder where docker-compose.yml file is. (from project root folder: /cd/weatherApp)
    Launch application by typing in terminal: ./vendor/bin/sail up
    Access service via browser by http://localhost

API:

For weather information there was used https://api.meteo.lt/ LHMT API.

To test app you can go to this link: http://localhost/api/products/recommended/:city - where :city is any Lithuania city. Cities need to be written in Latin alphabet (e.g. vilnius, kaunas).

For example trying to get products for three upcoming days you need to make request like this: http://localhost/api/products/recommended/vilnius After successful request, response should be like this:

{ "city": "vilnius", "recommendations": [ { "weather_forecast": "moderate-rain", "date": "2021-09-23", "products": [ { "sku": "48", "name": "Candace Gibson Sr.", "price": 25.3 }, { "sku": "39", "name": "Louie Cartwright", "price": 17.31 } ] }, { "weather_forecast": "light-rain", "date": "2021-09-24", "products": [ { "sku": "59", "name": "Nina Reilly", "price": 39 }, { "sku": "0", "name": "Vada Legros PhD", "price": 36.31 } ] }, { "weather_forecast": "light-rain", "date": "2021-09-25", "products": [ { "sku": "0", "name": "Vada Legros PhD", "price": 36.31 }, { "sku": "25", "name": "Mabel Huel", "price": 28.89 } ] } ] }
W
