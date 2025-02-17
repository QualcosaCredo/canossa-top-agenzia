CREATE TABLE VENDITE (
    id integer unsigned auto_increment,
    prezzovendita varchar(20) not null,
    datavendita varchar(20) not null,
    prezzo varchar(20) not null,
    provvigione varchar(20) not null,
    foreign key (codiceAcquirente),
    foreign key (codiceImmobile),
    primary key(codiceVendita)
)ENGINE=InnoDB;

CREATE TABLE IMMOBILI (
    id integer unsigned auto_increment,
    tipologia varchar(20) not null,
    prezzoRichiesto varchar(20) not null,
    superficie varchar(20) not null,
    dataDisponibilita varchar(20) not null,
    dataInserimento varchar(20) not null,
    stato varchar(20) not null,
    foreign key (codiceVenditore),
    foreign key (codiceProprietario),
    primary key(codiceImmobile)
)ENGINE=InnoDB;

CREATE TABLE VISITE (
    id integer unsigned auto_increment,
    datavisita varchar(20) not null,
    foreign key (codiceAcquirente),
    foreign key (codiceImmobile),
    primary key(codiceVisita)
)ENGINE=InnoDB;

CREATE TABLE VENDITORE (
    id integer unsigned auto_increment,
    nome varchar(20) not null,
    cognome varchar(20) not null,
    acquirente varchar(20) not null,
    primary key(codiceVenditore)
)ENGINE=InnoDB;

CREATE TABLE ACQUIRENTE (
    id integer unsigned auto_increment,
    nome varchar(20) not null,
    cognome varchar(20) not null,
    telefono varchar(20) not null,
    primary key(codiceAcquirente)
)ENGINE=InnoDB;

CREATE TABLE PROPRIETARIO (
    id integer unsigned auto_increment,
    nome varchar(20) not null,
    cognome varchar(20) not null,
    telefono varchar(20) not null,
    primary key(codiceProprietario)
)ENGINE=InnoDB;
