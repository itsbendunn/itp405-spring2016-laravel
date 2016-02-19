<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
</head>
<body>

<div class="container">
    <h2>
        You searched for: <?php echo $title?>
    </h2>
    <?php foreach ($dvd as $movie) : ?>
        <h3>
            <?php echo $movie->title?>
        </h3>
        <p>
            Genre: <?php echo $movie->genre_name ?>
        </p>
        <p>
            Format: <?php echo $movie->format_name?>
        </p>
        <p>
            Rating:<?php echo $movie->rating_name?>
        </p>
        <p>
            Sound:<?php echo $movie->sound_name?>
        </p>
        <p>
            <a href="/dvds/<?php echo $movie->id?>" name="url">Review</a>
        </p>
        <hr>

    <?php endforeach;?>
</div>




</body>
</html>