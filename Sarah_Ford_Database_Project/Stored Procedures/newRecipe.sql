create procedure newRecipe(IN title varchar(255), IN instructions varchar(1000))
	begin
		insert into Recipe(title,instuctons) values (title, instructions);
	end
