<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <?php if(session('success')) :?>
        <p>Review was successfully added.</p>
    <?php endif ?>

    <?php if(count($errors) > 0) : ?>

        <p style="color: red">ERROR</p>
        <ul>
            <?php foreach ($errors->all() as $error) :?>
                <li style="color: red">
                    <?php echo $error ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif ?>
    <div class="col-md-8">
        <?php foreach ($dvd as $movie) : ?>
        <h2>
            Details
        </h2>
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

        <?php endforeach;?>

        <h3>
            Reviews
        </h3>

        <?php foreach ($description as $description):?>
            <hr>
        <p>
            Review Title: <?php echo $description->title?>
        </p>
        <p>
            Rating: <?php echo $description->rating?>
        </p>
        <p>
            Description: <?php echo $description->description?>
        </p>
        <?php endforeach;?>
    </div>
    <div class="col-md-4">
        <form action="/dvds/review" method="post">
            <?php foreach ($dvd as $movie) : ?>
                <input type="hidden" name="id" value="<?php echo $movie->id?>">
            <?php endforeach; ?>
            <?php echo csrf_field()?>
            Rating:
                <select name="rating">
                    <option <?php if(old('rating') == 1) :?><?php echo ' selected'?><?php endif ?>>
                        1
                    </option>
                    <option <?php if(old('rating') == 2) :?><?php echo ' selected'?><?php endif ?>>
                        2
                    </option>
                    <option <?php if(old('rating') == 3) :?><?php echo ' selected'?><?php endif ?>>
                        3
                    </option>
                    <option <?php if(old('rating') == 4) :?><?php echo ' selected'?><?php endif ?>>
                        4
                    </option>
                    <option <?php if(old('rating') == 5) :?><?php echo ' selected'?><?php endif ?>>
                        5
                    </option>
                    <option <?php if(old('rating') == 6) :?><?php echo ' selected'?><?php endif ?>>
                        6
                    </option>
                    <option <?php if(old('rating') == 7) :?><?php echo ' selected'?><?php endif ?>>
                        7
                    </option>
                    <option <?php if(old('rating') == 8) :?><?php echo ' selected'?><?php endif ?>>
                        8
                    </option>
                    <option <?php if(old('rating') == 9) :?><?php echo ' selected'?><?php endif ?>>
                        9
                    </option>
                    <option <?php if(old('rating') == 10) :?><?php echo ' selected'?><?php endif ?>>
                        10
                    </option>
                </select>
            <br/>
            <br/>
            Title (at least five characters):
            <br/>
            <input type="text" name="title" value="<?php echo old ('title')?>">
            <br/>
            <br/>
            Description (at least ten characters):
            <br/>
            <textarea name="description" value="<?php echo old ('description')?>">
            </textarea>
            <br/>
            <br/>
            <input type="submit" value="Add">
        </form>
    </div>
    <hr>

</div>

</body>
</html>