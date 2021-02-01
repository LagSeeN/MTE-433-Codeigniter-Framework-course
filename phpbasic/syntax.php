<?php
echo "String 1<br>";
echo 'String 2<br>';

$x = 10;
$y = 20.5;
$z = "Lag";

echo "$x $y $z<br>";
echo '$x $y $z<br>';

//Commnet

/*
line 1
line 2
 */

$a = 10;
$b = 20.5;
echo "$a + $b = " . $a + $b . "<br>";
echo "$a - $b = " . $a - $b . "<br>";
echo "$a * $b = " . $a * $b . "<br>";
echo "$a / $b = " . $a / $b . "<br>";
echo "$a % $b = " . $a % $b . "<br>";

$bol = true;
if ($bol) {
    echo "Condition is true <br>";
}

$num = 15;
if (!($num >= 10 and $num < 20)) {
    echo "$num between 10 and 20 <br>";
}

for ($i = 0; $i < 10; $i++) {
    echo "$i <br>";
}

for ($i = 10; $i > 0; $i--) {
    echo "$i <br>";
}

for ($i = 20; $i > 0; $i--) {
    if ($i % 2 == 0) {
        echo "$i <br>";
    }

}

$cars = array("Volvo", "BMW", "Toyota");
echo $cars[0] . "<br>";

$cars2 = ["Volvo", "BMW", "Toyota"];
for ($i = 0; $i < sizeof($cars2); $i++) {
    echo $cars2[$i] . "<br>";
}

$color = array('red' => '#FF0000', 'green' => '#00FF00', 'blue' => '#0000FF');
echo $color['green'] . "<br>";

foreach ($color as $key => $value) {
    echo "<i style='color:{$value}'>$key = $value</i><br>";
}
