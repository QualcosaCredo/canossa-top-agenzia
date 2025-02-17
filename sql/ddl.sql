CREATE TABLE VENDITE (
    id integer unsigned auto_increment,
    prezzovendita varchar(20) not null,
    datavendita varchar(20) not null,
    prezzo varchar(20) not null,
    provvigione varchar(20) not null,
    foreign key (CodiceAcquirente),
    foreign key (CodiceImmobile),
    primary key(CodiceVendita)
)ENGINE=InnoDB;

CREATE TABLE IMMOBILI (
    id integer unsigned auto_increment,
    tipologia varchar(20) not null,
    prezzorichiesto varchar(20) not null,
    superficie varchar(20) not null,
    quartiere varchar(20) not null,
    indirizzo varchar(20) not null,
    datadisponibilita varchar(20) not null,
    datainserimento varchar(20) not null,
    stato varchar(20) not null,
    foreign key (CodiceVenditore),
    foreign key (CodiceProprietario),
    primary key(CodiceImmobile)
)ENGINE=InnoDB;

CREATE TABLE VISITE (
    id integer unsigned auto_increment,
    datavisita varchar(20) not null,
    foreign key (CodiceAcquirente),
    foreign key (CodiceImmobile),
    primary key(CodiceVisita)
)ENGINE=InnoDB;

CREATE TABLE VENDITORE (
    id integer unsigned auto_increment,
    nome varchar(20) not null,
    cognome varchar(20) not null,
    acquirente varchar(20) not null,
    primary key(CodiceVenditore)
)ENGINE=InnoDB;

CREATE TABLE ACQUIRENTE (
    id integer unsigned auto_increment,
    nome varchar(20) not null,
    cognome varchar(20) not null,
    telefono varchar(20) not null,
    primary key(CodiceAcquirente)
)ENGINE=InnoDB;

CREATE TABLE PROPRIETARIO (
    id integer unsigned auto_increment,
    nome varchar(20) not null,
    cognome varchar(20) not null,
    telefono varchar(20) not null,
    primary key(CodiceProprietario)
)ENGINE=InnoDB;