<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'kgb' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="css/style.css">    
</head>
<body class="d-flex flex-column h-100">
    <header class="container-fluid header">
        <a href="../../assets/img/logo.jpg" target="index.php" class="col header-logo">
            <img src="../../assets/img/logo.jpg" alt="Logo du site" id="logo">
        </a>
        <nav class="row  row-cols-2-lg header-nav">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Acceuil</a>
                <a class="navbar-brand" href="mission">Missions</a>
                <a class="navbar-brand" href="admin.php">Administration</a>

            </div>
        </nav>

    </header>

    <div class="container mt-4">
        <?= $content ?>
    </div>

</body>
</html>