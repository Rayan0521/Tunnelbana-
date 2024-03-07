<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tunnelbanstationer</title>
    <link rel="stylesheet" href="./css/tunnelbana.css">
</head>
<body>
<div class="container">
    <h3>Tunnelbanstationer</h3>
  <form method="post">
    <label for="frånStationer">Från:</label>
    <br>
    <br>
    <select id="frånStationer" name="från_Stationer">
        <?php
        $linje19 = ['','Hagsätra', 'Rågsved', 'Högdalen', 'Bandhagen', 'Stureby', 'Svedmyra', 'Sockenplan', 'Enskede Gård', 'Globen', 'Gullmarsplan', 'Skanstull', 'Medborgarplatsen', 'Slussen', 'Gamla Stan', 'T-Centralen', 'Hötorget', 'Rådmansgatan', 'Odenplan', 'S:T Eriksplan', 'Fridhemsplan', 'Thorildsplan', 'Kristineberg', 'Alvik', 'Stora Mossen', 'Abrahamsberg', 'Brommaplan', 'Åkeshov', 'Ängbyplan', 'Islandstorget', 'Blackeberg', 'Råcksta', 'Vällingby', 'Johannelund', 'Hässelby Gård', 'Hässelby Strand'];
        //Använder foreach-statement för att det är en array. De funkar inte med en if-statement
        foreach ($linje19 as $stationer) {
            echo "<option value='$stationer'>$stationer</option>";
        }
        ?>
    </select>
    <br>
    <br>
 
    <label for="tillStationer">Till:</label>
    <br>
    <br>
    <select id="tillStationer" name="till_Stationer">
        <?php
        foreach ($linje19 as $stationer) {
            echo "<option value='$stationer'>$stationer</option>";
        }
        ?>
    </select>
    <br>
    <br>
 
    <button type="submit">Skicka</button>
  </form>


    <?php
    // Kontrollera om formuläret har skickats med POST-metoden
    //Källa som hjälpte: https://www.w3schools.com/php/func_var_empty.asp
    // if not empty använd $_POST
    if (!empty($_POST)) {

        // Hämta värdet för "från_Stationer" från form
        $från_Stationer = $_POST['från_Stationer'];
        // Hämta värdet för "till_Stationer" från form
        $till_Stationer = $_POST['till_Stationer'];

        // Sök efter indexet för $från_Stationer i $linje19-arrayen
        $från_index = array_search($från_Stationer, $linje19);
        // Sök efter indexet för $till_Stationer i $linje19-arrayen
        $till_index = array_search($till_Stationer, $linje19);


        // Kontrollera om båda stationerna är giltiga (finns i $linje19-arrayen)
        //Källa som hjälpte:https://www.w3schools.com/php/func_math_abs.asp
        if ($från_index !== false && $till_index !== false) {
            // Beräkna antalet stationer mellan $from_station och $to_station
            $Stationer_mellan = abs($från_index - $till_index);
            

            // Beräkna restiden baserat på antalet stationer (3 minuter per station)
            // Källa som hjälpte:https://www.w3schools.com/php/func_date_time.asp
            $åk_tid = $Stationer_mellan * 3;
            // Hämtar tid i sekunder
            $nu_tid = strtotime(date("Y-m-d H:i:s"));
            // Beräkna förväntad ankomsttid baserat på restiden från tid
            $anländ_tid = date("H:i", $nu_tid + ($åk_tid * 60));


            // Skriv ut resultatet om båda stationerna är giltiga
            //Källa som hjälpte:https://www.w3schools.com/php/php_echo_print.asp
            echo "<div class='result'>";
            echo "<p>Antal stationer mellan: $från_Stationer och $till_Stationer: $Stationer_mellan</p>";
            echo "<p>Beräknad restid: $åk_tid minuter</p>";
            echo "<p>Förväntad ankomsttid till: $till_Stationer: $anländ_tid</p>";
            echo "</div>";
        } 
    }
    ?>

</div>


</body>
</html>