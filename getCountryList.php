<?php
    require_once("database.php");
    $response = '';
    
    if(!empty($_POST["keyword"])) {
        //If the keyword from getItemList on country input is not empty
        $query = "SELECT * FROM countries"
                . " WHERE UPPER(country) LIKE UPPER(:keyword) ORDER BY country ASC LIMIT 0,6";                
        $statement = $db->prepare($query);
        $statement->bindValue(":keyword", $_POST["keyword"] . "%");
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        
        //Selects all from countries that are like the input on countries / from the ajax in getItemList and puts them in result
        //Gets first six in the list

        if(!empty($result)) {
            $response .= '<div id="country-list">';
            //Adds the html to the response, the start to a new div
            foreach($result as $country) {
                $response .= '<li class="liCountry">' . $country["country"] . '</li>';
                //Adds the html to the response, each country in the list of countries taken from above/ in result onto a list
            }
            
            $response .= '</div>';
            //Adds the html to the response for closing the div
        }
    }
    
    die($response);
    //Kills the page and returns the response back to the getItemList page
?>