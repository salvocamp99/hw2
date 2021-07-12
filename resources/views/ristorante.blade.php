<html>
  <head>
    <meta charset="utf-8">
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='{{url("https://fonts.googleapis.com/css2?family=Inter:wght@100;200&display=swap")}}' rel="stylesheet">
    <link href='{{url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap")}}' rel="stylesheet">
    <link href='{{url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,900;1,100;1,700;1,900&display=swap")}}' rel="stylesheet">
    <link rel="stylesheet" href='{{url("css/restaurants.css") }}'>
    <script src='{{url("js/ristoranti.js") }}'defer="true"></script>
  </head>
  <body>    
    <input type="hidden" id="token" name="_token" value="{{ $csrf_token }}">                          
      <article>
    <header>
      <div id="overlay"></div>
      <nav>    
        <div id="flex-conteiner">
          <img src='logo.jpg'>
          <a href="{{route('homepage') }}">Home</a>
          <a href="{{route('ristoranti') }}">Ristoranti</a>
          <a href="{{route('ricette') }}">Ricette</a>
          <a href="{{route('abbandona_pagina') }}"class="button">Logout</a>
        
        </div>
        <div id="menu">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </nav>
      <h1>
<strong>Recensisci i nostri ristoranti:Il tuo parere conta per noi.</br>
</strong></h1></br></br>
    </header>
    <section>
    <h1>Scegli il ristorante che vuoi recensire</h1>
    <div id="Ristoranti">
    <h3 class=testo>Ristoranti che puoi recensire</h3>
    </div>
    <div id="scelta"class="ristoranti">
    </div>
    <div id="modale" class="hidden">
          </div>
    </section>
    </article>
    <footer>
      <div>
      <img src="logo.jpg"/>
      </div>
      <h1>Università degli studi di Catania</h1>
      <h2>Dieei</h2>
      <p> Created by Campione Salvatore O46002086</p>
     
    </footer>
  </body>
</html>
 