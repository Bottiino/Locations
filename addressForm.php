<?php 
    include 'database.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/common.css" rel="stylesheet" type="text/css"/>
        
        <title>Register</title>
    </head>
    <body>
        <main class='formMain'>
            <header>
                <div>
                    <h1>FIND YOUR WAY</h1>
                </div>
            </header>
            <div id="formBgRight">
                <div class='formRight'>
                    
                    <form action="info.php" method="post">

                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" required><br>

                        <label for="Surname">Surname:</label><br>
                        <input type="text" name="surname" id="surname" required><br>

                        <label for="line1">Street Line 1:</label><br>
                        <input type="text" name="line1" id="line1" required><br>

                        <label for="line2">Street Line 2:</label><br>
                        <input type="text" name="line2" id="line2" required><br>

                        <label for="country">Country:</label><br>
                        <input type="text" name="country" id="country" required autocomplete="off"><br>

                        <div id="addCounty">
                            <label for="county">County:</label><br>
                            <select name="county" id="county" required></select><br>
                        </div>

                        <div id="addTown">
                            <label for="town">Town:</label><br>
                            <select name="town" id="town" required></select>
                        </div>
                        
                        <div id="suggestion-box"></div>

                        <button class="formSub" type="submit" name="submit">Register</button>
                    </form>
                 </div>
            </div>
        </main>
    </body>
</html>
<script src="jquery.min.js" type="text/javascript"></script>
<script src="getItemList.js" type="text/javascript"></script>