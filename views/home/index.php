<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= ASSETS ?>/fullcalendar/lib/main.css">
    <link rel="stylesheet" href="<?= ASSETS ?>/css/styles.css">
    <title><?= $title ?></title>
</head>

<body>
    <div class="container">
        <?php require_once("views/modal/index.php") ?>
        <h2 class="color_red">Welcome Calendar</h2>
        <div id="calendar">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="<?= ASSETS ?>/fullcalendar/lib/main.js"></script>
    <script src="<?= ASSETS ?>/js/functions.js" type="module"></script>
</body>

</html>