<html>
    <head>
        <link rel='stylesheet' href='{{url("css/register.css") }}'>
        <script src='{{url("js/registrati.js") }}'defer></script>
        <link href='{{url("https://fonts.googleapis.com/css2?family=Inter:wght@100;200&display=swap")}}' rel="stylesheet">
        <link href='{{url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap")}}' rel="stylesheet">
        <link href='{{url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,900;1,100;1,700;1,900&display=swap")}}' rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <title>FoodItaly</title>
    </head>
    <body>
        <article>
        <section class="parte_sx">
            <div>
        <img src="immagine.jpg"/>
</div>
        </section>
        <section class="parte_dx">
            <h1>Diventa un fooder</h1>
            <form name='registrazione' method='post' action="{{route('registrati') }}">
            <input type='hidden' name='_token' value='{{ $csrf_token }}'>
                <div class="testo">
                    <div class="nome">
                        <div><label for='nome'>Nome</label></div>
                     
                        <div><input type='text' name='nome' ></div>
                        <span>Inserisci nome</span>
                    </div>
                    <div class="cognome">
                        <div><label for='cognome'>Cognome</label></div>
                        <div><input type='text' name='cognome'  ></div>
                        <span>Inserisci cognome</span>
                    </div>
                </div>
                <div class="id">
                    <div><label for='id'>Nome utente</label></div>
                    <div><input type='text' name='id' ></div>
                    <span>Nome utente non disponibile</span>
                </div>
                <div class="email">
                    <div><label for='email'>Email</label></div>
                    <div><input type='text' name='email' ></div>
                    <span>Indirizzo email non valido</span>
                </div>
                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' ></div>
                    <span>Password troppo corta</span>
                </div>
                <div class="conferma_password">
                    <div><label for='conferma_password'>Conferma Password</label></div>
                    <div><input type='password' name='conferma_password' ></div>
                    <span>Ops,controlla meglio la password</span>
                </div>
                <div class="submit">
                    <input type='submit' value="Registrati" id="submit"disabled>
                </div>
            </form>
            <div class="registrazione">Sei già un fooder? <a href="{{route('accesso') }}">Accedi</a>
        </section>
        </article>
    </body>
</html>