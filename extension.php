<?php
namespace PhpNwSykes;
require_once __DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";
?>

<form action="extension.php" method="POST">
    Enter Roman Numeral:<br>
    <input type="text" name="romanNumeral">
    <input type="submit" value="Submit">
    <br>
</form>

<?php
if (isset($_POST["romanNumeral"])) {
    //Split into comma separated list
    $listOfRomanNumerals = explode(',', $_POST["romanNumeral"]);

    //Iterate over each one
    foreach ($listOfRomanNumerals as $numeral) {
        //Echo what was entered
        echo $numeral . " : ";

        //Get and echo result
        try {    
            echo (new RomanNumeral($numeral))->toInt();
        } catch (\Exception $e) {
            echo "Invalid Numeral";
        }

        //Echo a line break
        echo "<br>";
    }
}
?>