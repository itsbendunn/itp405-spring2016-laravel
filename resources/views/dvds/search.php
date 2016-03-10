<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DVD Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<?php

$host = 'itp460.usc.edu';
$dbname = 'dvd';
$user = 'student';
$pw = 'ttrojan';

$pdo = new PDO("mysql:host=$host; dbname=$dbname", $user, $pw);

$sql = "
    SELECT *
    FROM genres
";

$statement  = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_OBJ);


$sql2 = "
    SELECT *
    FROM ratings
";

$statement2  = $pdo->prepare($sql2);
$statement2->execute();
$results2 = $statement2->fetchAll(PDO::FETCH_OBJ);

?>

<body>
    <div class="container">
        <div class="col-md-8">
            <h2>
                DVD Search
            </h2>
            <form action="/dvds/results" method="get">
                Movie: <input type="text" name="movie">
                <br/>
                Genre:
                <select name="genre">
                    <option>
                        All
                    </option>
                    <?php foreach ($results as $result) : ?>
                        <option value="<?php echo $result->genre_name?>">
                            <?php echo $result->genre_name?>
                        </option>
                    <?php endforeach;?>
                </select>
                <br/>
                Rating:
                <select name="rating">
                    <option>
                        All
                    </option>
                    <?php foreach ($results2 as $ratings) : ?>
                        <option value="<?php echo $ratings->rating_name?>">
                            <?php echo $ratings->rating_name?>
                        </option>
                    <?php endforeach;?>
                </select>
                <br/>
                <input type="submit" value="Search">
            </form>
        </div>
        <div class="col-md-4">
            <h2>
                Genres
            </h2>
                <?php foreach ($genres as $genre) : ?>
                    <p>
                        <a href="/genres/<?php echo $genre->id?>/dvds"> <?php echo $genre->genre_name?></a>
                    </p>
                <?php endforeach; ?>

        </div>

    </div>
</body>
</html>