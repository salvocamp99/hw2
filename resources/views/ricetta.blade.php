<html>
  <head>
    <meta charset="utf-8">
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name='csrf-token' content="{{csrf_token()}}">
  <link href='{{url("https://fonts.googleapis.com/css2?family=Inter:wght@100;200&display=swap")}}' rel="stylesheet">
    <link href='{{url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap")}}' rel="stylesheet">
    <link href='{{url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,900;1,100;1,700;1,900&display=swap")}}' rel="stylesheet">
    <link rel="stylesheet" href='{{url("css/ricetta.css") }}'>
    <script src='{{url("js/ricetta.js") }}'defer="true"></script>

  </head>
  <body>                                     
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
      <h1>vieni a scoprire la sezione dedicata alle nostre ricette</h1>
    </header>
    <section>
      <h1>Quale ricetta vuoi cercare?</h1>
      <form method="post" name="cerca">
      <input type='hidden'name='_token' value='{{ $csrf_token }}'>
        <label><input type='radio' name='type'value="Birre">Birre</label>
        <label><input type='radio' name='type'value="Cibo">Cibo</label>
        <br><input type="text"name="cerca"id="barra_ricerca"placeholder="Cerca la tua ricetta">
        <input type='submit' value='Cerca'>
        </form>
        <div id="lista">
          </div>
          <div id="modale" class="hidden">
          </div>
    </section>
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
