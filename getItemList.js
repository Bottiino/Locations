$(function(){
    $("div#addCounty").hide();    
    $("div#addTown").hide();
    //Hides the inputs for county and town.
    
    //Getting country input
    $(document).off("keyup", "input#country").on("keyup", "input#country", function(){
    //Removes the event handler previously on this input(if any). When you let go of a key it takes the input from the input country.
    //Off is used in case an event handler triggers twice
        var term = $(this).val().trim();
        //Gets the value of the input and trims any spaces from it and stores the result in term.
        
        if($(this).val() === ''){
        //If the value for country is empty
            $("div#addCounty").hide();    
            $("div#addTown").hide();
            $("#suggestion-box").hide();
            //Hid all other inputs / suggestions
        }
        else{
            $.ajax({
                type: "POST",
                url: "getCountryList.php",
                data: { keyword: term },
                //Gets the term and puts it into keyword: and posts it to the url
                success: function(data){
                    //If a response is returned
                    //data is response from the url
                    $("#suggestion-box").html(data);
                    $("#suggestion-box").show();
                    //The data is put into the suggestion box and the box is shown/ nolonger hidden
                }
            });
        }
    });
    
    $(document).off("click", "li.liCountry").on("click", "li.liCountry", function(){
    //Removes the event handler previously on this list(if any). When you click on a list item it takes the input from the list.
    //Off is used in case an event handler triggers twice
        var country = $(this).text();
        //Gets the value of the click and trims any spaces from it and stores the result in county.
        $("input#country").val(country);
        //the list item clicked is now stored as the country
        $("div#suggestion-box").html('');
        //The suggestion list is emptied
        $("div#addCounty").show();
        //The next select is shown
        getCounties();
        //Calls getCounties function
    });
    
    function getCounties(){
        var country = $('input#country').val().trim();
        //Gets the value of the input of country and trims any spaces from it and stores the result in country.
        
        $.ajax({
            type: "POST",
            url: "getCountyList.php",
            data: { country: country, keyword: '' },
            //Gets a empty String and puts it into keyword: and the var country gets put into country: and posts the data to the url
            success: function(data){
            //If a response is returned
            //data is response from the url
                $("select#county").html(data);
                //he data is placed into the select with id of county
            }
        });
    }
    
    //Getting town input
    $(document).off("change", "select#county").on("change", "select#county", function(){
    //Removes the event handler previously on this select(if any). When you change the select it takes the value from the option county.
    //Off is used in case an event handler triggers twice
        $("div#addTown").show();  
        //Show the town select
        getTowns();
        //Call the getTowns function
    });
    
    function getTowns(){
        var county = $('select#county').val().trim();
        //Gets the value of the select and trims any spaces from it and stores the result in county.

        $.ajax({
            type: "POST",
            url: "getTownList.php",
            data: { county: county, keyword: '' },
            //Gets a empty String and puts it into keyword: and the var county gets put into county: and posts the data to the url
            success: function(data){
            //If a response is returned
            //data is response from the url
                if(data == "")
                //If data response is empty
                {
                    $("select#town").html('<option name="town" id="town" value="No Town Available">No Town Available</option>');
                    //No town avaliable is inserted into towns
                }
                else{                
                $("select#town").html(data);
                //Else the list of towns from data is put into the select of town
                }
            }
        });
    }    
});