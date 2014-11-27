create procedure cupboardInsert(IN cook int, IN foodName varchar(255))
begin
select @x:=id from Food where foodName = Food.name;
if @x is null then
select @y:=id from Food order by id DESC limit 1;
insert into Food(Food.name) values(foodName);
insert into Cupboard (Cupboard.cook_id,Cupboard.food_id)values(cook,@y+1);
else
insert into Cupboard (Cupboard.cook_id,Cupboard.food_id)values(cook,@x);
end if;
end