<nav class="menu">
    
    <a href="index.php"><h1 id="tituloPag">Videoclub Comares</h1></a>
    <?php
    //Menu que solo aparecera si estas logeado
    if (isset($_SESSION['usuario'])){?>
        <div class="opcionesMenu">
            <ul>
                <li><a href="index.php">Juegos</a></li>
                <li><a href="#">Alquilados</a></li>
                <li><a href="#">Disponibles</a></li>
                <li><a href="#">Mis juegos alquilados</a></li>
                <li><a href="#">Salir</a></li>
            </ul>
        </div>
    <?php
    }
    //Boton login
    else{?>
        <div>
            <form action="login.php" method="post" class="formLogin">
                <input type="submit" name="loginMenu" value="LOGIN"/>
            </form>
        </div>
    <?php
    }?>
</nav>
