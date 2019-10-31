<nav class="navbar navbar-expand-lg  navbar-dark bg-dark ">

    <!--Logo-->
    <a class="navbar-brand" href="index.php"><span class="fas fa-home"/></a>

    <!--Icono para cuando se colapsa el menu de navegacion-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuColapsable" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!--Elementos del menu que se van a colapsar-->
    <div class="collapse navbar-collapse d-flex justify-content-center" id="menuColapsable">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            
            <!--Comics-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="menuComics" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cómics</a>
                <div class="dropdown-menu" aria-labelledby="menuComics">
                    <a class="dropdown-item" href="#">Marvel</a>
                    <a class="dropdown-item" href="#">DC Comics</a>
                    <a class="dropdown-item" href="#">Dark Horse</a>
                    <a class="dropdown-item" href="#">Otros</a>
                </div>
            </li>

            <!--Peliculas-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="menuPeliculas" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Películas</a>
                <div class="dropdown-menu" aria-labelledby="menuPeliculas">
                    <a class="dropdown-item" href="#">MCU</a>
                    <a class="dropdown-item" href="#">DCEU</a>
                </div>
            </li>
            
            <!--Videojuegos-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="menuVideojuegos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Videojuegos</a>
                <div class="dropdown-menu" aria-labelledby="menuVideojuegos">
                    <a class="dropdown-item" href="#">Arkham</a>
                    <a class="dropdown-item" href="#">Injustice</a>
                    <a class="dropdown-item" href="#">Marvel vs Capcom</a>
                    <a class="dropdown-item" href="#">Marvel Ultimate Alliance</a>
                    <a class="dropdown-item" href="#">Lego Marvel Superheroes</a>
                </div>
            </li>
            
            <!--Personajes-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="menuPersonajes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Personajes</a>
                <div class="dropdown-menu" aria-labelledby="menuPersonajes">
                    <a class="dropdown-item" href="#">Spiderman</a>
                    <a class="dropdown-item" href="#">Iron Man</a>
                    <a class="dropdown-item" href="#">Superman</a>
                    <a class="dropdown-item" href="#">Flash</a>
                    <a class="dropdown-item" href="#">Wonder Woman</a>
                </div>
            </li>
            
        </ul>

    </div>
</nav>
