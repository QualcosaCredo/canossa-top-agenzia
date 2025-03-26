-- Inserimento dati nella tabella ACQUIRENTE
INSERT INTO ACQUIRENTE (nome, cognome, telefono) VALUES
('Mario', 'Rossi', '1234567890'),
('Luigi', 'Bianchi', '0987654321'),
('Anna', 'Verdi', '1122334455'),
('Giulia', 'Neri', '2233445566'),
('Marco', 'Gialli', '3344556677'),
('Sara', 'Ferri', '4455667788'),
('Francesco', 'Esposito', '5566778899'),
('Martina', 'Romano', '6677889900'),
('Alessandro', 'Conti', '7788990011'),
('Chiara', 'Marini', '8899001122');

-- Inserimento dati nella tabella PROPRIETARIO
INSERT INTO PROPRIETARIO (nome, cognome, telefono) VALUES
('Giovanni', 'Neri', '2233445566'),
('Francesca', 'Gialli', '3344556677'),
('Roberto', 'Bianchi', '5566778899'),
('Elena', 'Rossi', '6677889900'),
('Simone', 'Verdi', '7788990011'),
('Laura', 'Ferri', '8899001122');

-- Inserimento dati nella tabella VENDITORE
INSERT INTO VENDITORE (nome, cognome) VALUES
('Alberto', 'Ferri'),
('Sofia', 'Lombardi'),
('Franco', 'Verdi'),
('Claudia', 'Neri'),
('Giovanni', 'Ruggeri'),
('Martina', 'Gallo');

-- Inserimento dati nella tabella IMMOBILI
INSERT INTO IMMOBILI (tipologia, prezzorichiesto, superficie, quartiere, indirizzo, datadisponibilita, datainserimento, stato, codiceVenditore, codiceProprietario) VALUES
('Appartamento', 250000, 80, 'Centro', 'Via Roma 1', '2023-01-01', '2023-01-01', 'Disponibile', 1, 1),
('Villa', 500000, 200, 'Collina', 'Via delle Rose 10', '2023-02-01', '2023-02-01', 'Disponibile', 2, 2),
('Monolocale', 150000, 40, 'Centro', 'Piazza della Libertà 5', '2023-03-01', '2023-03-01', 'Disponibile', 1, 3),
('Appartamento', 300000, 90, 'Marina', 'Lungomare 20', '2023-04-01', '2023-04-01', 'Disponibile', 3, 4),
('Attico', 400000, 120, 'Centro', 'Corso Italia 15', '2023-05-01', '2023-05-01', 'Disponibile', 4, 1),
('Casa indipendente', 600000, 250, 'Campagna', 'Via del Campo 5', '2023-06-01', '2023-06-01', 'Disponibile', 5, 2),
('Appartamento', 200000, 70, 'Centro', 'Via Garibaldi 12', '2023-07-01', '2023-07-01', 'Disponibile', 6, 3),
('Monolocale', 180000, 45, 'Centro', 'Via Mazzini 8', '2023-08-01', '2023-08-01', 'Disponibile', 1, 4),
('Villa', 750000, 300, 'Collina', 'Via dei Pini 3', '2023-09-01', '2023-09-01', 'Disponibile', 2, 5),
('Appartamento', 320000, 95, 'Marina', 'Lungomare 25', '2023-10-01', '2023-10-01', 'Disponibile', 3, 6);

-- Inserimento dati nella tabella VISITE
INSERT INTO VISITE (datavisita, codiceacquirente, CodiceImmobile, codicevenditore) VALUES
('2023-01-15', 1, 1, 1),
('2023-01-20', 2, 2, 2),
('2023-02-10', 3, 3, 1),
('2023-02-15', 4, 4, 3),
('2023-03-05', 5, 5, 4),
('2023-03-10', 6, 6, 5),
('2023-04-12', 7, 7, 6),
('2023-04-20', 8, 8, 1),
('2023-05-15', 9, 9, 2),
('2023-05-25', 10, 10, 3);

-- Inserimento dati nella tabella VENDITE
INSERT INTO VENDITE (datavendita, codiceacquirente, CodiceImmobile, prezzovendita) VALUES
('2023-06-01', 1, 1, 240000),
('2023-06-15', 2, 2, 480000),
('2023-07-01', 3, 3, 140000),
('2023-07-10', 4, 4, 290000),
('2023-08-01', 5, 5, 380000),
('2023-08-15', 6, 6, 550000),
('2023-09-01', 7, 7, 190000),
('2023-09-10', 8, 8, 170000),
('2023-10-01', 9, 9, 720000),
('2023-10-15', 10, 10, 310000);

