<?
    //echo "<h1>Hello wold</h1?";
    for($x=0 ; $x <10 ; $x++){
        //echo "num $x \n";
    }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodMe</title>
</head>
<body>

    <nav>
        <a href="#">AI Resturant Finder</a>
        <a href="#">Resturant Lucky Draw</a>
    </nav>

    <h1>AI Resturnat Finder</h1>
    <form method="POST">
        <input name="message" type="text"/>   
        <input type="submit"/> 
    </form>

    <?php
        // text generator
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            echo ($_POST["message"]);
        }
    ?>
        <p id="resturantList"></p>
    <h1>Resturant Lucky Draw</h1>
    <form onsubmit="generateList()">
        <input id="drawResturant" type="text"/>
        <input type="submit"/>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $resturant = array();    
        }
    ?>

</body>
</html>
<script>
    const resturants =[] ;
    getLocation();
    function generateList(){
        event.preventDefault();
        ///console.log("test");
        var tmp = $("#drawResturant").val();
        //console.log(tmp)
        resturants.push(tmp);
        console.log(resturants)
        var list = "";
        for(var i = 0 ; i < resturants.length ; i++){
            list += " ";
            list +=resturants[i];
            console.log(list);
        }
        $("#resturantList").html(list);
    }

    function getLocation(){
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(showLocation)
            }else{

            }
    }
    function showLocation(pos){
        const crd = pos.coords;
        console.log("Your current position is:");
        console.log(`Latitude : ${crd.latitude}`);
        console.log(`Longitude: ${crd.longitude}`);
        console.log(`More or less ${crd.accuracy} meters.`);
    }

</script>