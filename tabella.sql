create table users(
id varchar(50)primary key,
nome varchar(30)not null,
cognome varchar(30)not null,
email varchar(50)not null unique,
password varchar(255)not null)
Engine=InnoDB;

create table restaurants(
id integer primary key auto_increment,
nome_ristorante varchar(30) not null,
immagine varchar(30),
descrizione varchar(500),
dettagli varchar(5000)
)Engine=InnoDB;


create table reviews(
id integer primary key auto_increment,
restaurant_id integer ,
user_id varchar(50),
content json,
num_likes integer default 0,
num_commenti integer default 0,
index idr(restaurant_id),
index nu(user_id),
foreign key(restaurant_id)references restaurants(id),
foreign key(user_id)references users(id)) 
Engine=InnoDB;


create table restaurant_user(
user_id varchar(50),
restaurant_id integer,
index id_nu(user_id),
index id_rist(restaurant_id),
foreign key(user_id)references users(id),
foreign key(restaurant_id)references restaurants(id),
primary key(user_id,restaurant_id))
Engine=InnoDB;
 
create table review_user(
user_id varchar(50),
review_id integer,
index idnu(user_id),
index idr(review_id),
foreign key(user_id)references users(id),
foreign key(review_id)references reviews(id),
primary key(user_id,review_id))
Engine=InnoDB;


create table comments(
id integer primary key auto_increment,
user_id varchar(50),
testo varchar(300),
review_id integer,
created_at timestamp not null default current_timestamp,
updated_at timestamp not null default current_timestamp,
index id_recensione(review_id),
index id_nome_utente(user_id),
foreign key(review_id)references reviews(id),
foreign key(user_id)references users(id))
Engine=InnoDB; 


DELIMITER //
CREATE TRIGGER aggiungi_like
AFTER INSERT ON review_user
FOR EACH ROW
BEGIN
UPDATE reviews 
SET num_likes = num_likes + 1
WHERE id = new.review_id;
END //
DELIMITER ;


DELIMITER //
CREATE TRIGGER rimuovi
AFTER DELETE ON review_user
FOR EACH ROW
BEGIN
UPDATE reviews 
SET num_likes = num_likes - 1
WHERE id = old.review_id;
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER aggiungi_commento
AFTER INSERT ON comments
FOR EACH ROW
BEGIN
UPDATE reviews
SET num_commenti = num_commenti + 1
WHERE id = new.review_id;
END //
DELIMITER ;







-----insert
insert into restaurants(id,nome_ristorante,immagine,descrizione,dettagli)values("1","Il Cigno","./immagini/Il Cigno.jpg","Location magnifica e atmosfera da favola che si intensificano soprattutto di sera con giochi di luci e le bellissime fontane tutte illuminate.","È il 1969 quando, a Mantova, Tano Martini e sua moglie Alessandra aprono, in un nobile palazzo del XVI secolo affacciato su Piazza d’Arco, quello che presto sarebbe diventato il primo grande ristorante mantovano, e uno dei più celebri del Nord Italia: Il Cigno. L’idea di questi due allora giovanissimi ristoratori - in anni nei quali la stragrande maggioranza delle insegne aveva in carta maccheroncini panna e prosciutto e scaloppine al vino bianco - è quella di proporre, in un ambiente elegante (fra soffitti affrescati, mobili d’alto antiquariato e tele d’artisti contemporanei), i grandi piatti della tradizione mantovana (‘di terra e di acqua’), preparati con materie prime d’eccellenza.
Negli anni successivi, insieme ai Santini del Pescatore di Canneto sull’Oglio e ai Ferrari del Bersagliere di Goito (le altre due celebri ‘famiglie’ della ristorazione mantovana), Tano e Alessandra iniziano a viaggiare in Francia, traendo spunti di riflessioni per il loro lavoro e riportando nuove idee e suggestioni per la loro cucina. Di pari passo giungono premi e riconoscimenti, e la fama del Cigno presto oltrepassa i laghi che circondano la città, raccontandone, fra storia e tradizione, gusto ed eleganza, quell’atmosfera gonzaghesca che Gabriele d’Annunzio, nel suo Forse che sì, forse che no, definì «sogno senza tempo».");

insert into restaurants(id,nome_ristorante,immagine,descrizione,dettagli)values("2","13 Giugno","./immagini/Giugno.jpg","Il locale appare molto accogliente grazie agli eleganti arredi degli anni 30,spicca sicuramente il pianoforte in sala e il fantastico giardino esterno.","A Milano i 13 Giugno una volta erano due (uno in via Goldoni, l’altro in piazza Mirabello), ora c’è invece il ristorante 13 Giugno ed il bistrot 13 Giugno, attigui e affacciati entrambi su via Goldoni, a pochi metri dal centro-città (Porta Venezia e San Babila), comunque e sempre battenti bandiera siciliana. Il bistrot, va da sé, si presenta come un ambiente più informale, con gastronomia siciliana di mare o di terra (anche da asporto, con consegne anche a domicilio) ed eccelsa pasticceria isolana (cassata siciliana, cannoli alla siciliana, semifreddi alle mandorle o ai pistacchi di Bronte, granite, croccanti di mandorle, tegoline e scorzette d’arancia candite, panettone tradizionale siciliano), mentre il ristorante di vera cucina naturale marinara siciliana è un locale più classico, con sale raccolte, specchiere, ceramiche di Caltagirone, giardino d’inverno ed un’atmosfera quasi d’antan (luci soffuse, ma anche luci naturali di candela e sottofondo live al pianoforte), attualmente accentuata dai tradizionali addobbi per le festività di fine anno, che culmineranno il 31 dicembre nel fantasmagorico Gran gala di Capodanno ‘à la mode sicilienne’.Dunque cucina siciliana altamente verace, con profumi d’arancia, d’origano, di cappero e di cannella che si mixano armoniosamente con quello del mare, producendo piatti accuratamente amalgamati, d’antica tradizione siculo-mediterranea, come: arancine, panelle, crochette ed antipasti freschi di pesce (tonno, spada, spigola, ricciola, gamberi, scampi, frutti di mare, ostriche); primi quali pasta con le sarde o coi ricci di mare, tortiglioni spada melanzane e mentuccia, maccheroncini alla Norma, risotto con capesante e champagne, linguine all’astice, zuppa di cozze e vongole o ai frutti di mare e crostacei; secondi quali involtini di pesce spada, sarde a beccafico, straccetti d’orata, cous-cous di pesce alla trapanese, fritto misto di paranza, falsomagro di vitello ripieno, involtini di melanzane al forno, caponata di melanzane. Sono tutti firmati dal collaudato tandem (25 anni) dei due storici chef del locale, Damiano Sorgiovanni e Virgilio Zacarias, coadiuvati in sala da Edoardo Dolcimascolo (scuola alberghiera di Glion, in Svizzera, e varie esperienze nella ristorazione europea), figlio del fondatore e oggi supervisore del ristorante Saverio Dolcimascolo, ristoratore dal lontano 1977 e appassionato di musica, al punto che, quando si sente in vena, intona persino dei motivi evergreen sulle note del pianoforte.");

insert into restaurants(id,nome_ristorante,immagine,descrizione,dettagli)values("3","La Cascina","./immagini/La Cascina.jpg","Locale elegante che offre una spettacolare vista ,favorita dalla presenza di un ampio e ben curato giardino esterno.","L’azienda nasce il 20 Ottobre 1966 con l’organizzazione di una struttura composta da una sola sala. La professionalità e la passione della famiglia Leonetti permette al Ristorante La Cascina di contraddistinguersi per le specialità gastronomiche. Tra i primi clienti ad aver degustato le specialità del locale si possono ricordare i grandi attori di Hollywood come Burt Lancaster, Liz Taylor, Tyron Power, Sergio Leone, Federico Fellini e tanti altri rimasti nella storia del cinema internazionale.
In pochi anni l’attività si sviluppa in maniera esponenziale e per far fronte alla richiesta dei clienti la famiglia decide di ampliare la struttura composta ad oggi da quattro sale adibite per cerimonie di ogni tipologia e da uno spazio esterno situato all’interno di un parco dove si possono ammirare i resti dell’Acquedotto Romano.
L'attività da 50 anni tra un Ciak e l'altro è l'oasi preferita da illustri nomi del cinema italiano.");

insert into restaurants(id,nome_ristorante,immagine,descrizione,dettagli)values("4","Nettuno","./immagini/Nettuno.jpg","La spiaggia e il mare a due passi sono la cornice di questo meraviglioso luogo.Per non parlare della zona bar dove è possibile gustare ottimi drink.","Aperto da quasi 35 anni il Ristorante Nettuno da Siciliano a Taormina si trova sul corso principale della città, vicino alla pizza principale e al teatro romano. La zona è pedonale e consente ai turisti e a tutti coloro che vogliono gustare uno dei piatti tipici del locale, di potersi immergere in questa atmosfera romantica. Nel restaurant a Taormina si viene subito accolti in un'atmosfera famigliare: il locale si trova all'interno di un giardino di agrumi, con una predominanza negli arredi del bianco e con stile moderno. All'interno i clienti si possono accomodare in una sala con 50 coperti, completamente climatizzata in estate e riscaldata in inverno. All'aperto sono presenti altri 50 posti immersi in un giardino e coperti da eleganti vetrate. Presso il restaurant a Taormina si possono provare i piatti tipici della cucina siciliana, per la quale vengono utilizzati prodotti tipici, con pietanze a base di pesce. I clienti possono anche assaggiare la pasta alla Norma o la pasta con le sarde. 
Durante tutto anno i clienti possono provare diversi menu che cambiano a seconda della stagione e della disponibilità degli ingredienti. Seguire la stagionalità dei prodotti significa avere prodotti di maggiore qualità e con un gusto superiore. Questi ingredienti primari vengono abbinati a prodotti di base come la pasta fresca, la pasta ripiena o pesce fresco. Il pesce viene rigorosamente acquistato dai pescatori locali ogni giorno e può essere scelto dal cliente sia alla carta, che dal bancone dove sono conservati nel ghiaccio tutti i pesci presenti. Il restaurant di Taormina accoglie ogni giorno decine di clienti fra turisti e abitanti di Taormina e delle zone limitrofe. Il Ristorante Nettuno da Siciliano a Taormina organizza banchetti e feste private come matrimoni: per prenotare un evento privato è sufficiente accordarsi con il personale che saprà consigliare piatti tipici e vini locali in perfetto abbinamento. Il locale è aperto tutti i giorni tranne il mercoledì dalle 12.30 alle 14.30 e dalle 19 alle 23. A luglio e agosto, quando moltissimi turisti visitano la città, il locale è sempre aperto fornendo ogni giorno i piatti della tradizione locale con il gusto e la passione che la famiglia Siciliano mette all'interno di ogni creazione.Chi vuole immergersi nei sapori tipici siciliani e nei suoi piatti lo può fare nel Ristorante Nettuno da Siciliano a Taormina che propone una cucina carica di sapori e di prodotti tipici della sua terra. Sono molti i menu da scegliere, adatti a tutti i gusti: menu stagionali con ingredienti scelti e verdure di stagione. Il cliente può anche scegliere fra le molte proposte del menu alla carta o tra i tre menu degustazione presenti. C'è il menu tour di Sicilia comprensivo di antipasto, primo, secondo, dessert o il menu a base di tonno: dall'antipasto al secondo queste pesce viene rivisitato in diversi piatti tutti freschi e gustosi. Una delle specialità del ristorante sono i crudi di pesce per i quali vengono utilizzati unicamente pesci freschi e garantiti sotto l'aspetto della qualità. Da assaggiare anche la pasta fresca fatta in casa come i ravioli ripieni di melanzane con tartare di gambero rosso o anche i ravioli della tradizione alla norma o con le sarde.Il locale è adatto a festeggiare particolari ricorrenze come matrimoni o feste private. Tour operator e agenzie scelgono il restaurant di Taormina per organizzare cene aziendali, meeting e piccoli congressi con un buffet fino a 200 persone. Agli ospiti si possono offrire piatti tipici o rivisitazioni a seconda delle esigenze. A questi si possono anche abbinare alcuni dei molti vini presenti all'interno della cantina del ristorante. I clienti possono partecipare ad un'esperienza unica come la cooking class: lo chef accompagna l’ospite dalla spesa al mercato comunale di Taormina, fino alla preparazione di un pasto completo: dall’antipasto alla pasta fresca fino al secondo con degustazione di vini e prodotti tipici, per imparare i segreti della cucina tradizionale siciliana.");

insert into restaurants(id,nome_ristorante,immagine,descrizione,dettagli)values("5","Dal Corsaro","./immagini/Dal Corsaro.jpg","Nel centro della città, questo ristorante stellato Michelin, con un arredamento unico,offre del cibo davvero fantastico accompagnato da ottimi vini e drink.","Dal Corsaro è un ristorante storico di Cagliari, la storia dell’alta cucina a Cagliari.E’ frutto dell’opera della famiglia Deidda, che li ha creati e lo gestisce da decenni. La nostra lista degli ospiti è straordinaria: dai papi ai capi di stato, dai campioni dello sport alle rockstar.Giancarlo Deidda fa gli onori di casa, un personaggio vulcanico, intraprendente e spesso irriverente, le cui radici partono dalla storia del sistema minerario di Montevecchio. Da qui la sua famiglia e la sua esperienza hanno origine ma è Cagliari a rispecchiare il suo modo di vedere la cucina: i suoi colori, il suo mare, i suoi sapori che sposano il mare e la terra e che rimangono ancorati a una tradizione culinaria secolare, gelosa, generosa, solenne.La nostra è una squadra giovane, che ha una vera passione per questo lavoro e per la cucina di qualità.Signore e signori questa è la storia del Corsaro di Cagliari.");

insert into restaurants(id,nome_ristorante,immagine,descrizione,dettagli)values("6","Valle Verde","./immagini/Valle Verde.jpg","Ristorante ben curato,le proposte di cibo veramente interessanti,soprattutto le pizze per il quale il locale è conosciuto a livello nazionale.","Valle Verde Ristorante dal 1982.Il Ristorante Valle Verde dal 1982, anno di apertura, è diventato ad oggi un riferimento importante nella gastronomia del territorio ascolano, costruendo attorno a sè una grande famiglia di clienti affezionati da tutta Italia e oltre. Rinomato per l'organizzazione di banchetti e cerimonie grazie, anche, alle due grandi sale attrezzate per poter accogliere fino a 500 invitati, ai ricchi buffet che accolgono gli ospiti, alle sculture di frutta, verdura e ghiaccio realizzate dallo chef Stefano Castelletti. Enorme importanza viene sempre riservata all'accoglienza dei propri clienti e alla qualità delle materie prime utilizzate nella preparazione dei prelibati piatti che ci hanno distinti in questi 30 anni di florida attività. Venite a trovarci, sarete i benvenuti.");

insert into restaurants(id,nome_ristorante,immagine,descrizione,dettagli)values("7","Colline Emiliane","./immagini/CollineEmiliane.jpg","Ristorante classico che attira gli amanti della cucina con il suo menù tradizionale emiliano.Il servizio ottimo e il personale cortese sono uno dei punti di forza del locale.","Colline Emiliane è un ristorante situato nel centro storico di Roma, (per la precisione ci troviamo in via degli Avignonesi, tra via del Tritone e piazza Barberini) che dal 1931 propone una cucina artigianale e regionale. Fondato da due bolognesi, Colline Emiliane è stato rilevato nel 1967 dalla famiglia Latini, che ancora oggi, con la terza generazione, continua a proporre una cucina autentica fatta di antiche ricette e tradizioni, come per esempio quella di tirare la pasta al mattarello ogni mattina.");

insert into restaurants(id,nome_ristorante,immagine,descrizione,dettagli)values("8","Amici Miei","./immagini/Amici Miei.jpg","Locale davvero rinomato e sorprendente,conosciuto per la sua buona cucina e soprattutto per la sua famosa carbonara,nonchè per gli ottimi distillati che offre.","Il ristorante Amici Miei è il punto focale della storia della famiglia Bruni, la nostra famiglia. Pietro Bruni e sua moglie Gabriella, infatti, realizzano il loro grande sogno dando vita nel 1938 alla Trattoria Toscana Fiaschetteria al Chianti.
La cucina che caratterizza il ristorante è nel più classico stile toscano ed è qui che per la prima volta a Roma, si beve il Chianti. Ma ciò che più ci importa sottolineare, è la cura, l’amore con cui il nostro ristorante è sempre stato gestito.Senza superbia ci sentiamo di affermare che la nostra passione ci ha reso grandi. Tutta la sua esperienza e le sue enormi capacità, Pietro Bruni le ha con amore tramandate alle sue due figlie, Carla e Paola, che hanno sempre lavorato al fianco del padre apprendendo da lui la raffinata arte della ristorazione. Gli anni passano e siamo ormai arrivati alla terza generazione di ristoratori e, Paola e Carla, hanno trasformato il locale in uno dei ristoranti più famosi, frequentatissimo dai vip e più brillanti della capitale.Diamo vita ogni giorno ad un nuovo pezzo della storia della ristorazione. Quello a cui teniamo di più è, comunque, restare fedeli alla tradizione che da sempre ci contraddistingue. Da noi, troverete un ristorante di gusto classico, grande ospitalità, un ambiente piacevole, caldo, accogliente; nostro personale orgoglio sarà mostrarvi la cucina ed il girarrosto aperto sulla sala. Qui da noi niente è stato lasciato al caso.Nella nostra storia non possiamo esimerci dal ricordare un carissimo amico che ogni giorno ci ha regalato un po’ della sua arte e ci ha reso parte della sua vita: Federico Fellini, nostro cliente da sempre, che è stato orgoglio in passato e sarà orgoglio in futuro per noi del Toscano e che ricorderemo seduto al suo tavolo sorridente e spensierato accompagnato dalla sua eterna compagna Giulietta. Vorremmo raccontarvi anche il gusto della nostra cucina, ma ci rimane impossibile.
Soltanto venendo a pranzo o a cena da noi, saremo lieti di regalarvi una straordinaria esperienza, che siamo sicuri sin da ora, vorrete ripetere più e più volte. Accogliervi, sarà il nostro piacere più grande, ogni volta con immensa gioia.");


insert into restaurants(id,nome_ristorante,immagine,descrizione,dettagli)values("9","La Bigoncia","./immagini/La Bigoncia.jpg","Ristorante stellato,che offre dei piatti tradizionali,accompagnati dagli ottimi vini e dall'ottima birra di produzione artigianale da gustare comodamente anche all'aperto.","In quest’angolo di storia, nel 1948 nasce nella città di Volterra il ristorante La Bigoncia,dalla volontà di Beppino Masi. Angelo Senes lo ha rilevato nel 1980 e da allora non si è mai fermato. Giuliana, la moglie, ha gestito e governato la cucina per oltre 25 anni introducendo costantemente nuovi piatti e passione nel lavoro quotidiano.La nostra squadra è qualificata, laboriosa e innovativa. I nostri piatti riflettono la passione per la cucina con un menu' vario e ispirato.Di pari passo al ristorante, c'é l'Azienda Agricola biologica, nella quale vengono allevate pregiate razze animali toscane che vengono esclusivamente adoperate per l'uso del ristorante. Vengono coltivati anche cereali e leguminose biologiche.Il ristorante da sempre è punto di riferimento per la clientela volterrana e amici da ogni parte del mondo. La cucina è tipica toscana, prodotti del territorio e produttori locali sono parte fondamentale del nostro lavoro. Questa è la filosofia della cucina del ristorante.Consideriamo la cucina e l’ospitalità parte integrante delle nostre vite, come modo di preservare e condividere le tradizioni locali che fanno parte della nostra storia. L’ambiente e l’atmosfera che proponiamo nel nostro ristorante non sono altro che la quotidianità delle nostre tradizioni, con la massima sincerità per i nostri ospiti e per quello che quotidianamente, facciamo da una vita: qui, in Toscana. Secondo questi principi e passione cerchiamo di proporre il meglio del cibo e dei piatti del territorio.");
 
 