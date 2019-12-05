<nav class="menu">
    
    <a href="index.php"><h1 id="tituloPag">Videoclub Comares</h1></a>
    <?php
    //Menu que solo aparecera si estas logeado
    if (isset($_SESSION['usuario'])){?>
        <div class="opcionesMenu">
            <h3> <?php echo "Bienvenido $_SESSION[nombreUsuario]"; ?> </h3>
            <ul>
                <li><a href="index.php">Lista de juegos</a></li>
                <li><a href="juegosAlquilados.php">Juegos alquilados</a></li>
                <li><a href="juegosDisponibles.php">Juegos disponibles</a></li>
                <li><a href="#">Mis juegos alquilados</a></li>
                <li><a href="logout.php">Salir</a></li>
            </ul>
        </div>
    <?php
    }
    //Boton login
    else{?>
        <div>
            <form action="login.php" method="post" class="formLogin">
                <input class="boton" type="submit" name="loginMenu" value="Login"/>
            </form>
        </div>
    <?php
    }?>
</nav>
