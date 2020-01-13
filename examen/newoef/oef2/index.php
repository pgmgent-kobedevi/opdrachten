<h1>Oefening 2</h1>
<p>Zorg ervoor dat de fouten opgelost worden en de output is zoals in de screenshot 'oplossing.png'. In sommige gevallen moet je extra lijnen code bijschrijven.</p>

<h2>Fout 1 & 2</h2>

<?php

echo 'Hi student, let\'s play a game&hellip;<br>';

echo 'Let ' . ' the ' . ' games ' . ' begin!';

?>

<h2>Fout 3</h2>

<?php

$podium = [
    'first' => 'France',
    'second' => 'Croatia',
    'third' => 'Belgium'
];

echo $podium["first"];

?>

<h2>Fout 4</h2>

<?php

echo implode(', ' , $podium);

?>

<h2>Fout 5</h2>

<ul>
<?php

$colors = ['red', 'blue', 'green', 'yellow', 'orange'];
$colors = array_reverse($colors);

foreach ($colors as $color){
    echo '<li>' . $color . '</li>';
}

?>
</ul>

<h2>Fout 6 & 7</h2>

<ul>
<?php

$artist = (object) [
    'firstname' => 'Michael', 
    'lastname' => 'Jackson'
];

echo $artist->lastname . ' ';
echo $artist->firstname;

?>
</ul>


<h2>Fout 8</h2>
<p>De foutmelding moet hieronder weg zonder dat je de regel verwijderd of in commentaar plaast.</p>
<?php

if(isset($_GET["test"])){
    $test = $_GET['test'];
}


?>




