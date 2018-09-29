<?php 
    $name = filter_input(INPUT_POST, 'name');
    $surname = filter_input(INPUT_POST, 'surname');
    $line1 = filter_input(INPUT_POST, 'line1');
    $line2 = filter_input(INPUT_POST, 'line2');
    $country = filter_input(INPUT_POST, 'country');
    $county = filter_input(INPUT_POST, 'county');
    $town = filter_input(INPUT_POST, 'town');
    //Getting all imputs from the form and storing intto variables
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="css/common.css" rel="stylesheet" type="text/css"/>
        
        <title>Your Data</title>
    </head>
    <body>
        <main id="pageContent">
            <div id="title">
                <h1>Your Data</h1>            
            </div>
            <table id="table">
            <tr>
              <th>Name:</th>
              <td><?php echo $name ?></td>
            </tr>
            <tr>
              <th>Surname:</th>
              <td><?php echo $surname ?></td>
            </tr>
            <tr>
              <th>Street Line 1:</th>
              <td><?php echo $line1 ?></td>
            </tr>
            <tr>
              <th>Street Line 2:</th>
              <td><?php echo $line2 ?></td>
            </tr>
            <tr>
              <th>Country:</th>
              <td><?php echo $country ?></td>
            </tr>
            <tr>
              <th>County:</th>
              <td><?php echo $county ?></td>
            </tr>
            <tr>
              <th>Town:</th>
              <td><?php echo $town ?></td>
            </tr>
            </table>
        </main>
    </body>
</html>