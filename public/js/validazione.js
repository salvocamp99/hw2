function validazione(event)
{
    const div = document.querySelector('#errore');
    // Verifico se tutti i campi sono riempiti
    if(form.id.value.length == 0 ||
       form.password.value.length == 0)
    {
  

        div.textContent = "Inserisci nome utente e password";
        div.classList.add('non_valido');
        div.classList.remove('hidden');
        // Blocca l'invio del form
        event.preventDefault();
    }else{
        div.classList.add('hidden');
    }
        
}

const form = document.forms['accesso'];

form.addEventListener('submit', validazione);