
<?php

$bd = new PDO('mysql:host=localhost;dbname=testing', "root", "root");
$getActorsFilms = $bd->query("SELECT F.title, F.year, F.format, A.actors, AF.film_id FROM actors_films AF INNER JOIN films F ON AF.film_id = F.id INNER JOIN actors A ON AF.actor_id = A.id WHERE F.title = '{$_GET["film"]}'");
$getActorsFilms = $getActorsFilms->fetchAll(PDO::FETCH_ASSOC);

echo "<br><br><center>";
foreach ($getActorsFilms as $item) {

    if($item['film_id'] != $fix_problem_uniqueness){
        echo "Фильм: {$item['title']}<br>";
        echo "Год выпуска: <th>{$item['year']}<br>";
        echo "Формат: {$item['format']}<br>";
        echo "Актеры: {$item['actors']}";

    }else{
        echo ", " . $item['actors'];
    }


    $fix_problem_uniqueness = $item['film_id'];
}
echo "</center>";