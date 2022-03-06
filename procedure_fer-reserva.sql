DELIMITER //
CREATE PROCEDURE consultar_persones(IN _tipus VARCHAR(30), IN _data DATE, IN _hora TIME, IN _dni VARCHAR(9), IN _id_act INT)
 BEGIN
	 IF _tipus = 'colectives' 
		THEN 
			IF 
				(SELECT count(d.id) as num FROM client a, reserva_colectiva b, activitat c, activitat_colectiva d 
				WHERE a.dni = b.dni AND b.id = c.id AND c.id = d.id AND b.anulada is not null AND a.dni = _dni AND _data IN 
                (SELECT `data` FROM reserva_colectiva WHERE reserva_colectiva.dni = _dni)) > 0
			THEN
                SELECT "no pots";
			ELSE
				INSERT INTO reserva_colectiva (`data`,`hora`, dni, id_act) 
				VALUES (_data, _hora, _dni, _id_act);
                END IF;
     ELSE IF _tipus = 'lliures' 
		THEN 
			IF
				(SELECT count(d.id) as num FROM client a, reserva_lliure b, activitat c, activitat_lliure d 
				WHERE a.dni = b.dni AND b.id = c.id AND c.id = d.id AND b.anulada is not null AND a.dni = _dni AND _data IN 
                (SELECT `data` FROM reserva_lliure WHERE reserva_lliure.dni = _dni)) > 0
			THEN
				SELECT "no pots";
			ELSE
				INSERT INTO reserva_lliure (`data`,`hora`, dni, id_act) 
				VALUES (_data, _hora, _dni, _id_act);
			 END IF;
		 END IF;
     END IF;
 END;
//

CALL consultar_persones('colectives','2022-04-28', '16:30:00', '1234567L', 1);

/***************ANULAR RESERVA*****************/

DELIMITER //
CREATE PROCEDURE anular_reserva(IN _tipus VARCHAR(30), IN _data DATE, IN _hora TIME, IN _dni VARCHAR(9), IN _id_act INT)
 BEGIN
	 IF _tipus = 'colectives' 
		THEN 
			UPDATE reserva_colectiva SET anulada = 1 WHERE id_act = _id_act AND `data` = _data AND hora = _hora AND dni = _dni;
     ELSE IF _tipus = 'lliures' 
		THEN 
			UPDATE reserva_lliure SET anulada = 1 WHERE id_act = _id_act AND `data` = _data AND hora = _hora AND dni = _dni;
		END IF;
     END IF;
 END;
//

CALL anular_reserva('colectives','2022-04-28', '16:30:00', '1234567L', 1);


