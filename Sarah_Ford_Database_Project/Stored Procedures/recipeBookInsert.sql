create procedure recipeBookInsert(IN cook_id int, IN reccipe_id int)
	begin
		insert into cooksRecipe(cook_id, reccipe_id) values (cook_id, reccipe_id)
	end
