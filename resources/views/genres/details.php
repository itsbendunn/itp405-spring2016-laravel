<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Genres</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <h2>
            <?php echo $dvds[1]->genre->genre_name?> movies
        </h2>
        <?php foreach ($dvds as $dvd) :?>
            <h3>

                    <?php echo $dvd->title?>
            </h3>
                <p>
                    Rating: <?php echo $dvd->rating->rating_name?>
                </p>
                <p>
                    Genre: <?php echo $dvd->genre->genre_name?>
                </p>
                <p>
                    Label: <?php echo $dvd->label->label_name?>
                </p>
                <hr/>
        <?php endforeach; ?>


    </div>

</body>
</html>