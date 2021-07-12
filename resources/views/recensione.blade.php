<html>
<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>FoodItaly</title>
	    <link rel="stylesheet" href='{{url("css/Recensioni.css")}}'>
         
        <link href='{{url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,900;1,100;1,700;1,900&display=swap")}}' rel="stylesheet">
	    <script src='{{url("js/recensione.js")}}' defer></script>
	</head>

    <body>
        <nav>
            <div id ="title">FoodItaly - Recensioni -{{ $ristorante->nome_ristorante }} ! </div>
            <div id="barra">
                <a href="{{route('homepage') }}">Home</a> 
                <a href="{{route('ristoranti') }}">Tutti i ristoranti</a>
                <a href="{{route('abbandona_pagina') }}">Logout</a>
                <a class = "nuova_recensione">Aggiungi recensione</a>
            </div>
            <div id="menumobile">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
        </nav>
        <section>
            <h1>
                Ciao {{ $utente->nome }}!         
                            </h1>
    <div id="principale">
</div> 

        </section>
        <div id="modale" class="hidden">
            <div id="aggiungi_rec">
            <div class="recensione">
            <div>Scrivi una recensione</div>
            <div id="annulla_recensione">Annulla</div>

</div>
                <form name='invia'method='post'> 
                <input type='hidden' id='token' name='_token' value='{{ $csrf_token }}'>
                    <textarea id="intestazione" name="intestazione"cols="80"rows="3"maxlenght="5"placeholder="inserisci intestazione"></textarea>
                    <textarea id="testo" name="testo"cols="80"rows="3"maxlenght="5"placeholder="inserisci testo"></textarea>
                    <div class="recensione">
                    <input type="file" id="file" name ="file" accept=" .jpg,.png"> 
                    <input type="submit" id ="sumbit" value ="Carica recensione">
</div>
<div id="errore"class="hidden">Scrivi qualcosa</div>
                </form>
            </div>
        </div>
        
    </body>




</html>