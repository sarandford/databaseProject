CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `sarah`@`153.9.0.105` 
    SQL SECURITY DEFINER
VIEW `cooksRecipeNames` AS
    SELECT DISTINCT
        `cooksRecipe`.`cook_id` AS `cook_id`,
        `Recipe`.`name` AS `recipe_name`
    FROM
        (`cooksRecipe`
        JOIN `Recipe` ON ((`Recipe`.`id` = `cooksRecipe`.`recipe_id`)))