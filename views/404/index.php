<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ASSETS?>/css/styles.css">
    <title><?=$title?></title>
</head>
<body>
    <div class="error">
        <h2 class="error__title"><?php echo $h2?></h2>
        <p class="error__message"><?php echo $message?></p>
       <a href="<?=BASE_URL?>" class="error__button">Come Back</a>
    </div>
</body>
</html>