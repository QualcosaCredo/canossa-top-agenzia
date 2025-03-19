CREATE TABLE VENDITORE (
    CodiceVenditore integer unsigned auto_increment,
    nome varchar(20) DEFAULT '' not null,
    cognome varchar(20) DEFAULT '' not null,
    acquirente varchar(20) DEFAULT ''not null,
    primary key(CodiceVenditore)
)ENGINE=InnoDB;

CREATE TABLE ACQUIRENTE (
    CodiceAcquirente integer unsigned auto_increment,
    nome varchar(20) DEFAULT ''not null,
    cognome varchar(20) DEFAULT '' not null,
    telefono varchar(20) DEFAULT '' not null,
    primary key(CodiceAcquirente)
)ENGINE=InnoDB;
CREATE TABLE PROPRIETARIO (
    codiceProprietario integer unsigned auto_increment,
    nome varchar(20) DEFAULT '' not null,
    cognome varchar(20) DEFAULT ''not null,
    telefono varchar(20) DEFAULT '' not null,
    primary key(codiceProprietario)
)ENGINE=InnoDB;
CREATE TABLE IMMOBILI (
    CodiceImmobile integer unsigned auto_increment,
    tipologia varchar(20) DEFAULT '' not null,
    prezzorichiesto integer unsigned not null,
    superficie varchar(20) DEFAULT '' not null,
    quartiere varchar(20) DEFAULT '' not null,
    indirizzo varchar(64) DEFAULT '' not null,
    datadisponibilita varchar(20) DEFAULT '' not null,
    datainserimento varchar(20) DEFAULT '' not null,
    CodiceVenditore integer unsigned not null,
    CodiceProprietario integer unsigned not null,
    stato varchar(20)DEFAULT '' not null,
    foreign key (CodiceVenditore)REFERENCES VENDITORE(CodiceVenditore),
    foreign key (CodiceProprietario)REFERENCES PROPRIETARIO(CodiceProprietario),
    primary key(CodiceImmobile)
)ENGINE=InnoDB;

CREATE TABLE VENDITE (
    CodiceVendita integer unsigned auto_increment,
    prezzovendita integer unsigned not null,
    datavendita varchar(20)DEFAULT '' not null,
    prezzo varchar(20)DEFAULT '' not null,
    provvigione varchar(20)DEFAULT '' not null,
    CodiceAcquirente integer unsigned not null,
    CodiceImmobile integer unsigned not null,
    foreign key (CodiceAcquirente) REFERENCES acquirente(CodiceAcquirente),
    foreign key (CodiceImmobile) REFERENCES immobili(CodiceImmobile),
    primary key(CodiceVendita)
)ENGINE=InnoDB;

CREATE TABLE VISITE (
    CodiceVisita integer unsigned auto_increment,
    datavisita varchar(20)DEFAULT '' not null,
    CodiceAcquirente integer unsigned not null,
    CodiceImmobile integer unsigned not null,
    CodiceVenditore integer unsigned not null,
    foreign key (CodiceAcquirente)REFERENCES ACQUIRENTE(CodiceAcquirente),
    foreign key (CodiceImmobile)REFERENCES IMMOBILI(CodiceImmobile),
    foreign key (CodiceVenditore)REFERENCES VENDITORE(CodiceVenditore),
    primary key(CodiceVisita)
)ENGINE=InnoDB;
