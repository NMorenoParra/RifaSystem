CREATE DATABASE Rifa;
USE Rifa;

CREATE TABLE Numero(
Numero TINYINT UNSIGNED PRIMARY KEY,
Estado ENUM('Disponible','No Disponible') DEFAULT 'Disponible'
);

CREATE TABLE Monto(
ID TINYINT UNSIGNED PRIMARY KEY,
MontoTotal INT UNSIGNED NOT NULL
);

CREATE TABLE Persona(
Id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
Nombre VARCHAR(255),
EstadoPago ENUM('Pagado','Debe'),
NumeroPersona TINYINT UNSIGNED UNIQUE NOT NULL,
FOREIGN KEY (NumeroPersona) REFERENCES Numero(Numero)
);

DELIMITER //
CREATE PROCEDURE RegistrarPersona(
    IN p_Numero TINYINT UNSIGNED,
    IN p_Nombre VARCHAR(255),
    IN p_EstadoPago ENUM('Pagado','Debe'),
    IN p_suma SMALLINT UNSIGNED
)
BEGIN
    DECLARE numEstado ENUM('Disponible', 'No Disponible');
    
    -- Cambiar el estado del número a No Disponible
    UPDATE Numero SET Estado = 'No Disponible' WHERE Numero = p_Numero;
    
    -- Insertar la nueva persona
    INSERT INTO Persona(Nombre,EstadoPago,NumeroPersona) VALUES (p_Nombre, p_EstadoPago,p_Numero);
    
    UPDATE Monto SET MontoTotal = MontoTotal+p_suma WHERE ID=1;
END//

DELIMITER ;

INSERT INTO Numero (Numero)
VALUES 
(0), (1), (2), (3), (4), (5), (6), (7), (8), (9),
(10), (11), (12), (13), (14), (15), (16), (17), (18), (19),
(20), (21), (22), (23), (24), (25), (26), (27), (28), (29),
(30), (31), (32), (33), (34), (35), (36), (37), (38), (39),
(40), (41), (42), (43), (44), (45), (46), (47), (48), (49),
(50), (51), (52), (53), (54), (55), (56), (57), (58), (59),
(60), (61), (62), (63), (64), (65), (66), (67), (68), (69),
(70), (71), (72), (73), (74), (75), (76), (77), (78), (79),
(80), (81), (82), (83), (84), (85), (86), (87), (88), (89),
(90), (91), (92), (93), (94), (95), (96), (97), (98), (99);

INSERT INTO Monto(ID,MontoTotal) VALUES(1,0);

select*from numero;
select*from persona;

CREATE PROCEDURE ConsultaNumeros()
	SELECT*FROM Numero;
    
    
CREATE PROCEDURE ConsultaPersonas()
SELECT*FROM Numero LEFT JOIN Persona ON Numero.Numero=Persona.NumeroPersona ORDER BY Numero ASC;

CREATE PROCEDURE ConsultaMonto()
	SELECT*FROM Monto WHERE ID=1;
    
    
DELIMITER //
CREATE PROCEDURE ActualizarEstado(
IN p_numero TINYINT UNSIGNED
)
BEGIN
UPDATE Persona SET EstadoPago=1 WHERE NumeroPersona=p_numero;

UPDATE Monto SET MontoTotal=MontoTotal+20000;

END //

DELIMITER ;

CREATE PROCEDURE ConsultaNumerosDeshabilitados()
SELECT*FROM Numero WHERE Estado = 1;