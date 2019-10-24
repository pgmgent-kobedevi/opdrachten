<style>
p{
    margin:0;
}

body{
    display:flex;
    flex-wrap:wrap;
}

</style>

<?php

include_once "data.php";

//kleuren

for($i = 1; $i<=50; $i++){
    echo "<div style='background-color:hsl(0,0%,$i%)'>$i</div>";
}

for($j = 1; $j<=360; $j++){
    echo "<div style='background-color:hsl($j,100%,50%)'>$j</div>";

}

for($k = 1; $k<=360; $k++){
    for($l = 1; $l<=100; $l++){
        echo "<div style='background-color:hsl($k,100%,$l%)'>$k</div>";
    }
}

// //kleuren
// foreach ($colors as $color){
//     //simpele manier
//     echo '<div style="background-color:'.$color.';">'.$color.'</div>';
// }



// //numbers

// echo '<br>';

// for($i=1; $i<100; $i++){
//     echo $i;
// }



// //50 shades of grey

// for($j=0;$j<=50;$j++){
//     echo '<div style="background-color:hsl(0,0%,'.$j.'%);"><p style="color:white;">'.$j.'</p></div>';
//     $j++;
// }

// echo '<br>';


// //360 shades of gay
// echo '<section style="display:flex; flex-wrap:wrap;">';
// for($k=0;$k<=360;$k++){
//     echo '<div style="width:1vw; display:block; height:1vw; background-color:hsl('.$k.',100%,50%);"></div>';
// }
// echo  '</section>';



// //360 colors advanced
// echo '<section style="display:flex; flex-wrap:wrap;">';
// for($f=0;$f<=100;$f++){
//     for($l=0; $l<=360; $l++){
//         echo '<div style="width:1vw; display:block; height:1vw; background-color:hsl('.$l.',100%,'.$f.'%);"></div>';
//     }
// }
// echo  '</section>';