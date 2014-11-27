delimiter //
create function totalItems(id int)
returns int
begin
declare x int;
select count(*) into x from Cupboard where cook_id=id group by cook_id;
return x;
end//
