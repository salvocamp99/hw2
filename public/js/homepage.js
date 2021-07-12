        function onJsonRist(json){
        console.log(json);
 
        for(jsonElem of json){
        
        const mostraRistoranti=document.querySelector("#choice")
        const ristorantiSeguiti=document.querySelector("#ristoranti_seguiti");
        if(jsonElem.isFollowed){
        let c=document.createElement("div");
        c.classList.add("div");
        c.dataset.id=jsonElem.id_r ;
       
        let immagine=document.createElement('img');
        immagine.src=jsonElem.immagine;
        immagine.classList.add("img")
        c.appendChild(immagine);
        
        let nome=document.createElement('h1');
        nome.textContent=jsonElem.nome_ristorante;
        nome.classList.add("h1"); 
        c.appendChild(nome);
     
       

        
        let rimuovi=document.createElement('img');
        rimuovi.id="elimina";
        rimuovi.src="rimuovi segui.png";
        rimuovi.classList.add("delete");
        rimuovi.addEventListener("click",rimuoviSeguiti);
        c.appendChild(rimuovi);
    
        ristorantiSeguiti.appendChild(c);


        let contenitore=document.createElement('div'); 
        contenitore.dataset.id=jsonElem.id_r;

        let img=document.createElement('img');
        img.src=jsonElem.immagine;
        img.addEventListener('click',Modale);
        contenitore.appendChild(img);
        
        let nome1=document.createElement('h1');
        nome1.dataset.id=jsonElem.nome_ristorante
        nome1.textContent=jsonElem.nome_ristorante; 
        contenitore.appendChild(nome1);
        
        

       let descrizione=document.createElement("p");
        descrizione.textContent=jsonElem.dettagli;
        descrizione.classList.add('descrizione','hidden');
        contenitore.appendChild(descrizione);


        let dettagli=document.createElement('button');
        dettagli.textContent="mostra descrizione";
        dettagli.classList.add('dettagli');
        dettagli.addEventListener('click',MostraDescrizione)
        contenitore.appendChild(dettagli);
        
        mostraRistoranti.appendChild(contenitore);
        const testo1=document.querySelector("#testo1");
        testo1.classList.remove("hidden");

        }
        else{
            let contenitore=document.createElement('div');
            contenitore.dataset.id=jsonElem.id_r;
    
            let immagine=document.createElement('img');
            immagine.src=jsonElem.immagine;
            immagine.addEventListener('click',Modale);
            contenitore.appendChild(immagine);
            
            let nome=document.createElement('h1');
            nome.dataset.id=jsonElem.nome_ristorante
            nome.textContent=jsonElem.nome_ristorante; 
            contenitore.appendChild(nome);
            
            
            let aggiungi=document.createElement('img');
            aggiungi.id="aggiungi";
            aggiungi.src="aggiungi ai seguiti.png";
            aggiungi.addEventListener("click",aggiungiSeguiti);
            contenitore.id=(jsonElem.nome_ristorante);
            contenitore.appendChild(aggiungi);
    
         let descrizione=document.createElement("p");
            descrizione.textContent=jsonElem.dettagli;
            descrizione.classList.add('descrizione','hidden');
            contenitore.appendChild(descrizione);
    
           let dettagli=document.createElement('button');
           dettagli.textContent="mostra descrizione";
           dettagli.classList.add('dettagli');
           dettagli.addEventListener('click',MostraDescrizione);
           contenitore.appendChild(dettagli);
            
            mostraRistoranti.appendChild(contenitore);
        }
        
    }

    }
// gestico la barra di ricerca
barraRicerca=document.querySelector("#ricerca")
barraRicerca.addEventListener("keyup",ricerca_ristoranti)

function ricerca_ristoranti(event){
let contenutoS=document.querySelectorAll("#ristoranti_seguiti div")
let contenuto=document.querySelectorAll("#choice div h1")
let testo=event.currentTarget.value
for(ristorante of contenuto){
if(ristorante.dataset.id.search(testo)!==-1){
ristorante.parentNode.classList.remove("hidden")
for(let ristoranteP of contenutoS){
if(ristoranteP.dataset.nome_ristorante===ristorante.parentNode.id){
ristorante.parentNode.classList.add("hidden")
   }
  }
    }
else{
ristorante.parentNode.classList.add("hidden")
    }
}
if(testo===""){
for(ristorante of contenuto){
ristorante.parentNode.classList.remove("hidden")
for(ristoranteP of contenutoS){
if(ristoranteP.dataset.nome_ristorante===ristorante.parentNode.id){
ristorante.parentNode.classList.add("hidden")
 }
 }
}
 }
}


function OnJson2(json){
    console.log(json);
    const p=document.querySelector("#ristoranti_seguiti");
    let c=document.createElement("div");
    c.classList.add("div");
    c.dataset.id=json.id_r;
   
    let immagine=document.createElement('img');
    immagine.src=json.immagine;
    immagine.classList.add("img")
    c.appendChild(immagine);
    
    let nome=document.createElement('h1');
    nome.textContent=json.nome_ristorante;
    nome.classList.add("h1"); 
    c.appendChild(nome);


    
    let rimuovi=document.createElement('img');
    rimuovi.id="elimina";
    rimuovi.src="rimuovi segui.png";
    rimuovi.classList.add("delete");
    rimuovi.addEventListener("click",rimuoviSeguiti);
    c.appendChild(rimuovi);


     p.appendChild(c);
    }

//aggiungo alla sezione seguiti
function aggiungiSeguiti(event){
    const p=document.querySelector("#ristoranti_seguiti");
    p.classList.remove("hidden");
    const testo=document.querySelector("#testo1");
    testo.classList.remove("hidden");
    const ristorante_id=event.currentTarget.parentNode.dataset.id;
    event.currentTarget.remove();
    fetch("homepage/caricaSeguiti/"+ encodeURIComponent(ristorante_id)).then(onResponse).then(OnJson2);
    }
 //rimuovo dalla sezione seguiti
function rimuoviSeguiti(event){
const ristorante_id=event.currentTarget.parentNode.dataset.id;
const div=document.querySelectorAll("#choice div");
    for(divElement of div){
    if(divElement.dataset.id===ristorante_id){
    const img=document.createElement('img');
    img.id="aggiungi";
    img.src="aggiungi ai seguiti.png";
    img.addEventListener("click",aggiungiSeguiti);
    divElement.appendChild(img);

    }
    }
fetch("homepage/rimuoviSeguiti/"+ encodeURIComponent(ristorante_id)).then(onResponse).then(onDeleteJson);
event.currentTarget.parentNode.remove();
const p=document.querySelector("#ristoranti_seguiti");
const pre=document.querySelector("#ristoranti_seguiti div");
const testo=document.querySelector("#testo1");
if(pre==null){
p.classList.add("hidden");
testo.classList.add("hidden");
}

 
}

 function onDeleteJson(json){
     console.log(json);
     const div=document.querySelectorAll("#choice div");
     for(divElement of div){
    if(divElement.dataset.id=== json.id_r){
    const aggiungi=div.querySelector('img');
    aggiungi.addEventListener("click",aggiungiSeguiti); 
     }
 }
}
//modale
const modale=document.querySelector('#modale');
function MostraDescrizione(event){
    const descrizione=document.createElement('p');
    descrizione.classList.add('descrizione');
    descrizione.textContent=event.currentTarget.parentNode.querySelector('.descrizione').textContent;
     modale.appendChild(descrizione);
     modale.classList.remove('hidden');
    document.body.classList.add('no-scroll');
    modale.addEventListener('click',chiudiModale)

}
 
   
   function chiudiModale(event){
   modale.classList.add('hidden');
   document.body.classList.remove('no-scroll');
   modale.innerHTML="";
   
    }





function onResponse(response){
return response.json();
}
function Modale(event){
    const immagine=document.createElement('img');
    immagine.src=event.currentTarget.src;
    const modale=document.querySelector('#modale');
    modale.appendChild(immagine);
    modale.classList.remove('hidden');
    document.body.classList.add('no-scroll');
   }
   const mod=document.querySelector('#modale');
   mod.addEventListener('click',RimuoviModale);
   
   function RimuoviModale(event){
   document.body.classList.remove('no-scroll');
   mod.classList.add('hidden');
   mod.innerHTML="";
    }


fetch("homepage/carica").then(onResponse).then(onJsonRist);

