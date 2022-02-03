<h1>Initial Setup </h1>

<p>    1. cp .env.example .env </p>
<p>    2. docker-compose up -d --build </p>
<p>    3. docker-compose exec app composer install </p>
<p>    2. docker-compose exec app php artisan migrate </p>


<h1>Usage </h1>

<h3>   For scrapping data from URL:</h3>
<h4>    docker-compose exec app php artisan scrapper:run --url=https://news.ycombinator.com/</h4>

<span style="color: red">NOTE: </span>  For Default url will be 'https://news.ycombinator.com/'. If you select different url for selecting, it will not work, because scrapping for that website should be applied to the project. The only scrapping for now is for this site: https://news.ycombinator.com/

<h6>   You can enter url: http://localhost:82 for watch articles which you scrapped from website</h6>
<h6>You can update only POINTS there</h6>

