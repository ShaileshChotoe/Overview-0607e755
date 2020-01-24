<?php

$localhost = 'localhost';
$db = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = ('mysql:host='.$localhost.';dbname='.$db.';charset='.$charset);

try 
{
$pdo = new PDO($dsn, $user, $pass);
}
catch (\PDOException $e) 
{
    echo 'error connecting to database';
}


$stmt = $pdo->prepare('SELECT * FROM series');
$stmt->execute();

$stmt2 = $pdo->prepare('SELECT * FROM movies');
$stmt2->execute();


function echoSeries($stmt)
{
    while ($row = $stmt->fetch(PDO::FETCH_OBJ))
    {
        echo 
        '<tr> ' . 
            '<td>' . $row->title . '</td>' . 
            '<td>' . $row->rating . '</td>' . 
        '</tr>';
    }
}

function echoMovies($stmt2)
{
    while ($row = $stmt2->fetch(PDO::FETCH_OBJ))
    {
        echo 
        '<tr>' . 
            '<td>' . $row->title . '</td>' .
            '<td>' . $row->duur . '</td>' .
        '</tr>';
    }
}


?>
<h2>Welkom op Netland</h2>
<table> 
<h3>Series</h3>
    <tr>
        <th>Titel</th>
        <th>Rating</th>
    </tr>
<?php echoSeries($stmt);?>
</table>

<br>
<br>

<table> 
<h3>Movies</h3>
    <tr>
        <th>Titel</th>
        <th>Duur</th>
    </tr>
<?php echoMovies($stmt2);?>
</table>