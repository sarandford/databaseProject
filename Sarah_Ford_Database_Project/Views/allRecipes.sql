CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `sarah`@`153.9.0.11` 
    SQL SECURITY DEFINER
VIEW `allRecipes` AS
    SELECT 
        `Recipe`.`id` AS `recipe_id`,
        `Recipe`.`name` AS `recipe_name`,
        `Food`.`name` AS `ingredientName`,
        `Ingredients`.`quantity` AS `ingredientQty`,
        `Ingredients`.`unit` AS `ingredientUnit`,
        `Recipe`.`instructions` AS `instructions`
    FROM
        ((`Recipe`
        LEFT JOIN `Ingredients` ON ((`Recipe`.`id` = `Ingredients`.`recipe_id`)))
        LEFT JOIN `Food` ON ((`Ingredients`.`food_id` = `Food`.`id`)))