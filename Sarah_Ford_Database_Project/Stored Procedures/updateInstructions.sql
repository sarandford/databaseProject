create procedure updateInstructions(IN id int, IN newInstructions varchar(3000))
 UPDATE `Recipe` SET `instructions`=newInstructions WHERE id=id;