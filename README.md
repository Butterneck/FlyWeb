# FlyWeb

Progetto di Tecnologie Web A.A. 2020/2021


# Idee

- redigere itinerari per piu' giorni per varie citta'
- integrazioni tra cui poter scegliere i.e. trasporto, esperienze 
  - ogni integrazione e' carat. da durata (variabile) e costo
- Itinerari certificati per disabili (controllare se c'e' un ente che certifica)
- possibilita di registrarsi
- utente - acquirente
  - carrello 
  - recensioni - !solo se hai fatto il viaggio!
  - preferiti
- amministrazione
  - gestire gli utenti (ban)
  - gestire gli itinerari e le integrazioni (aggiungere, eliminare, modificare)
- tagging itinerari e integrazioni


# Interfaccia
- ricerca filtrabile in prima pagina in primo piano
- menu sopra per [altre pagine](<#altre-pagine>)
- icona utente per signin e signup
- pagina per contatti (about)
- newsletter in fondo alla pagina
- 50X da backend in determinate pagine che compromettono il funzionamento totale -> visualizza pagina di errore
- pagina per prenotazione + pagamento (wizard)
- pagina risultati ricerca
- pagina dettagli elemento dinamica 
- pagina amministratore

Colori: 
Blue Nile – #0A3150
Brick Red – #C52F21
Golden Syrup – #E39D45
Ash Gray – #BABCB7
Jungle Green – #628D34


# Setup DB

## Tabelle

### Utenti
- nome: varchar
- cognome: varchar
- eta: number
- tipo: admin/user

### attivita
- id
- nome

### viaggio-attivita

### Viaggio
- nome
- attivita
- 
  
### Integrazioni
- nome
- costo
- durata

### Viaggio-integrazioni


### Tags
- id
- nome

### Tags integrazioni/viaggi
- id
- integrazioni/viaggi

### Ordine
- id

### ordine-integrazione
