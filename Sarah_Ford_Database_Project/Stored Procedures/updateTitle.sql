create procedure updateTitle(IN id int, IN newTitle varchar(255))
begin UPDATE `Recipe` SET `name`=newTitle WHERE Recipe.id=id; 
end