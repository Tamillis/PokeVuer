<h1>PokeVuer</h1>
<h2> A PokemonAPI viewer using Vue JS </h2>

This is the Post-Challenge branch, for improvements made to the proejct since the first one day crack at it.

To run ensure PHP, Laravel, Composer and NPM are installed.
Naturally, you will need git too.

First Clone this repository into a directory of your choice using your prefered terminal.<br/>
<code>git clone https://github.com/Tamillis/PokeVuer.git</code><br/>
<code>git checkout post-challenge</code><br/>
In the same directory run
<code>composer install</code><br/>

I used MySQL in XAMPP for local developement, but please create the .env file by changing the name of .env.example to .env and configure it to use your database of choice.

Run the following commands<br/>
<code>npm install</code><br/>
<code>npm run dev</code><br/>
<code>php artisan key:generate</code><br/>
<code>php artisan migrate</code><br/>
<code>php artisan db:seed</code> (note this will take a short while as pokeapi.co needs to respond to requsts)<br/>
<code>php artisan serve</code><br/>

Click on the link provided and view the local server to see the project.

Main view<br/>
<img src="https://i.imgur.com/1juTbft.png" width=600>

Update and Delete form<br/>
<img src="https://i.imgur.com/1Lv0UaI.png" width=600>

Tony the Pokemon<br/>
<img src="https://i.imgur.com/V98bOKJ.png">

Delete query<br/>
<img src="https://i.imgur.com/qGWcegB.png" width=600>

No more Metapod<br/>
<img src="https://i.imgur.com/03uu8tU.png" width=600>

Pagination<br/>
<img src="https://i.imgur.com/Z10weHs.png" width=600>

Mobile friendly<br/>
<img src="https://i.imgur.com/uBlGAK9.png">

<a href="https://imgur.com/a/xVc8YJG" width=600>Imgur album</a>
