CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `sarandford`@`localhost` 
    SQL SECURITY DEFINER
VIEW `foodNames` AS
    SELECT 
        `Food`.`name` AS `name`, `Cupboard`.`cook_id` AS `cook_id`
    FROM
        (`Food`
        JOIN `Cupboard` ON ((`Food`.`id` = `Cupboard`.`food_id`)))