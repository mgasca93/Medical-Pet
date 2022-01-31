<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="icon" href="data:,">
    <title><?= setTitle($title); ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top <?= ( auth() ) ? 'bg-light shadow navbar-light' : 'navbar-light'; ?>">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 <?= ( auth() ) ? ' ms-auto pe-5 me-5' : ' me-auto'; ?>">
                <?php if ( guest() ) :?>
                <li class="nav-item">
                    <a class="nav-link <?= isItemActive('login'); ?>" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= isItemActive('register'); ?>" href="/register">Registro</a>
                </li>
                <?php endif; ?>
                <?php if ( auth() ) :?>
                <li class="nav-item">
                    <a class="nav-link <?= isItemActive('dashboard'); ?>" href="/dashboard">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>
                            <i class="far fa-bell lead"></i>
                            <span class="position-absolute top-10 start-90 translate-middle badge rounded-pill bg-dark">
                                0
                            </span>
                        </span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/notify">Logout</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $_SESSION['username']; ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
