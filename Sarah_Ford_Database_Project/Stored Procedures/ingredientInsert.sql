create procedure ingredientInsert(In recipe_id int, IN foodName vachar(255), IN qty int, IN unit vachar(255))
begin
select @x:=id from Food where foodName = Food.name;
if @x is null then
select @y:=id from Food order by id DESC limit 1;
insert into Food(Food.name) values(foodName);
insert into Ingredients(recipe_id,food_id,quantity,unit) values (recipe_id,@y+1,qty,unit);
else
insert into Ingredients(recipe_id,food_id,quantity,unit) values (recipe_id,@x,qty,unit);
end if;
end//