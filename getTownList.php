<?php
    require_once("database.php");
    $response = '';
   
    if(!empty($_POST["county"])) {
        $query = "SELECT t.* FROM `towns` AS t INNER JOIN `counties` AS c ON t.countyID=c.id"
                . " WHERE UPPER(c.name)=UPPER('" . $_POST["county"] . "') ORDER BY t.`townName` ASC";
       
        $statement = $db->prepare($query);
        $statement->bindValue(":county", $_POST["county"]);
        $statement->bindValue(":town", $_POST["keyword"] . "%");
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        
        //Selects all from the towns table that joins the county table based on county id
        //Gets all the towns that equal the bind of county and are spelled like the keyword(in this case its blank)
        
        if(!empty($result)) {
            $response .= '<option name="county" id="county" >Select Town</option>';
            //Adds the html to the response, the first filler option
            foreach($result as $town) {
                $response .= '<option name="town" id="town" value="' . $town["townName"] . '">' . $town["townName"] . '</option>';
                //Adds the html to the response, each town from the list of towns in $town into its own option
            }
        }
    }
    
    die($response);
    //Kills the page and returns the response back to the getItemList page
?>