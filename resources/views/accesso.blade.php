<html>
    <head>
        <link rel='stylesheet' href='{{url("css/register.css")}}'>
        <link href='{{url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,900;1,100;1,700;1,900&display=swap")}}' rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src='{{url("js/validazione.js") }}'defer="true"></script>
        <title>FoodItaly</title>
    </head>
    <body>
        <article class="accesso">
        <section class="parte_sx">
        <div>
        <img src="immagine.jpg"/>
        </div>
        </section>
        <section class="parte_dx">
            <h1>Ciao fooder</h1>
            @if(isset($old_id))
            <div class='non_valido'>Nome utente o password sbagliati</div>
            @endif
            <form name='accesso' method='post' action="{{route('accesso') }}">
            <input type='hidden' name='_token' value='{{ $csrf_token }}'>
                <div class="id">
                    <div><label for='id'>Nome utente</label></div>
                    <div><input type='text' name='id'value='{{$old_id}}'></div>
                </div>
                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password'></div>
                </div>
                <div id ='errore' class = 'hidden'></div>
                <div>
                    <input type='submit' value="Accedi">
                </div>
            </form>
</br>

            <div class="registrazione">Non sei ancora un fooder? <a href="{{route('registrati') }}">Registrati</a>
</div>
        </section>
        </article>
    </body>
</html>