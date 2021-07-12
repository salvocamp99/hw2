<html>
  <head>
    <meta charset="utf-8">
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='{{url("https://fonts.googleapis.com/css2?family=Inter:wght@100;200&display=swap")}}' rel="stylesheet">
    <link href='{{url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap")}}' rel="stylesheet">
    <link href='{{url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,900;1,100;1,700;1,900&display=swap")}}' rel="stylesheet">
    <link rel="stylesheet" href='{{url("css/homepage.css") }}'>
    <script src='{{url("js/homepage.js") }}'defer="true"></script>
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
      <h3> Benvenuto, {{ $id }}!</h3>
      <h1>
<strong>Italian food : Il gusto di mangiare cibo italiano.</br>
  Vieni a scoprire i migliori ristoranti di tutt'Italia,che aspetti!
</strong></h1></br></br>
    </header>
    <section>
    <h1>Segui il tuo ristorante</h1>
    <h3 id="testo1"class="hidden">Ristoranti seguiti</h3>
    <div id="ristoranti_seguiti" class="hidden">
    </div>
    <div id="listaRistoranti">
    <h3 class=testo>Tutti i ristoranti</h3>
    <label>cerca</label><input type='text'id="ricerca">
    </div>
    <div id="choice"class="ristoranti">
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
 