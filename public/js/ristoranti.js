function onJsonRist(json){
    console.log(json);

    for(jsonElem of json){
    
    const mostraRistoranti=document.querySelector("#scelta")
    
        const contenitore=document.createElement('div');
        contenitore.dataset.id=jsonElem.id_r;

        const immagine=document.createElement('img');
        immagine.src=jsonElem.immagine;
        immagine.addEventListener('click',apriModale)
        contenitore.appendChild(immagine);
        
        const nome=document.createElement('h1');
        nome.dataset.id=jsonElem.nome_ristorante
        nome.textContent=jsonElem.nome_ristorante; 
        contenitore.appendChild(nome);
        
        
        const descrizione=document.createElement("p");
        descrizione.textContent=jsonElem.descrizione;
        descrizione.classList.add('descrizione','hidden');
        contenitore.appendChild(descrizione);
        
        const bottone1 =document.createElement('button');
        bottone1.textContent='Mostra più';
        bottone1.classList.add('primo');
        contenitore.appendChild(bottone1);
        
        const bottone2=document.createElement('button');
        bottone2.textContent='Mostra meno';
        bottone2.classList.add('secondo','hidden');
        contenitore.appendChild(bottone2);

       
const MostraDiPiù=document.querySelectorAll('.primo');
const MostraMeno=document.querySelectorAll('.secondo');

for(let bottone of MostraDiPiù){
bottone.addEventListener('click',RimuoviMostraPiù);
}
for(let bottone of MostraMeno){
bottone.addEventListener('click',RimuoviMostraMeno)
}
  
    const form=document.createElement('form');
    form.name ="entra";
    form.method ="post";
    const input= document.createElement('input');
    input.classList.add("input");
    input.type ="submit";
    input.name="recensisci";
    input.value ='recensisci';
    const input1=document.createElement('input');
    input1.type="hidden";
    input1.name="_token";
    input1.value=token.value;
    
    const input2=document.createElement('input');
    input2.type="hidden";
    input2.name="ristorante";
    input2.value=jsonElem.id_r;
    form.appendChild(input2)
    form.appendChild(input1)
    form.appendChild(input);
    form.appendChild(token);

    contenitore.appendChild(form);

 mostraRistoranti.appendChild(contenitore);
    }
}

function RimuoviMostraPiù(event){
event.currentTarget.classList.add('hidden');
event.currentTarget.parentNode.querySelector('.descrizione').classList.remove('hidden');
event.currentTarget.parentNode.querySelector('.secondo').classList.remove('hidden');
}
function RimuoviMostraMeno(event){
event.currentTarget.parentNode.querySelector('.primo').classList.remove('hidden');
event.currentTarget.parentNode.querySelector('.descrizione').classList.add('hidden');
event.currentTarget.classList.add('hidden');
}


function onResponse(response){
return response.json();
}

function apriModale(event){
    const immagine=document.createElement('img');
    immagine.src=event.currentTarget.src;
    const modale=document.querySelector('#modale');
    modale.appendChild(immagine);
    modale.classList.remove('hidden');
    document.body.classList.add('no-scroll');
   }
   const mod=document.querySelector('#modale');
   mod.addEventListener('click',chiudiModale);
   
   function chiudiModale(event){
   document.body.classList.remove('no-scroll');
   mod.classList.add('hidden');
   mod.innerHTML="";
    }

fetch("ristoranti/carica").then(onResponse).then(onJsonRist);

