CREATE DEFINER=`sarandford`@`localhost` trigger validateUser before insert on Cooks for each row
begin
IF exists(select username from Cooks where username=NEW.username) THEN
		SIGNAL SQLSTATE VALUE '45000'
			SET MESSAGE_TEXT = '[table:Cooks] - `username` column is not valid';
elseif exists(select password from Cooks where password=NEW.password) THEN
	SIGNAL SQLSTATE VALUE '45000'
		SET MESSAGE_TEXT = '[table:Cooks] - `password` column is not valid';
	END IF;
    end