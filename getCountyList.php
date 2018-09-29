<?php
    require_once("database.php");
    $response = '';

    if(!empty($_POST["country"])) {
        //If country from getItemList on country input is not empty
        $query = "SELECT co.* FROM `counties` AS co INNER JOIN `countries` AS c ON co.country_id=c.id "
                . "WHERE UPPER(c.country)=UPPER(:country) "
                . "AND UPPER(co.name) LIKE UPPER(:county) ORDER BY `name` ASC";
        
        $statement = $db->prepare($query);
        $statement->bindValue(":country", $_POST["country"]);
        $statement->bindValue(":county", $_POST["keyword"] . "%");
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        
        //Selects all from the counties table that joins the country table based on country id
        //Gets all the counties that equal the bind of country and are spelled like the keyword (in this case its blank)
        
        if(!empty($result)) {
            $response .= '<option name="county" id="county" >Select County</option>';
            //Adds the html to the response, the first filler option
            foreach($result as $county) {
                $response .= '<option name="county" id="county" value="' . $county["name"] . '">' . $county["name"] . '</option>';
                //Adds the html to the response, each county from the list of counties in $county into its own option
            }
        }
    }
    
    die($response);
    //Kills the page and returns the response back to the getItemList page
?>