<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a DVD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>
            Add a DVD
        </h2>

        <form action="/dvds" method="post">
            <?php echo csrf_field()?>
            Title:
            <input type="text" name="title">
            <br/>
            Label:
            <select name="label">
                <?php foreach ($labels as $label) : ?>
                    <option value="<?php echo $label->id ?>"><?php echo $label->label_name ?></option>
                <?php endforeach ?>
            </select>
            <br/>
            Sound:
            <select name="sound">
                <?php foreach ($sounds as $sound) : ?>
                    <option value="<?php echo $sound->id ?>"><?php echo $sound->sound_name ?></option>
                <?php endforeach ?>
            </select>
            <br/>
            Genre:
            <select name="genre">
                <?php foreach ($genres as $genre) : ?>
                <option value="<?php echo $genre->id ?>"><?php echo $genre->genre_name ?></option>
                <?php endforeach ?>
            </select>
            <br/>
            Rating:
            <select name="rating">
                <?php foreach ($ratings as $rating) : ?>
                    <option value="<?php echo $rating->id ?>"><?php echo $rating->rating_name ?></option>
                <?php endforeach ?>
            </select>
            <br/>
            Format:
            <select name="format">
                <?php foreach ($formats as $format) : ?>
                    <option value="<?php echo $format->id ?>"><?php echo $format->format_name ?></option>
                <?php endforeach ?>
            </select>
            <br/>
            <input type="submit" value="Insert">

        </form>





    </div>
</body>
</html>