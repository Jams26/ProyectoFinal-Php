<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - COVID19</title>
    <link rel="stylesheet" href="<?php echo base_url().'media/css/estilos.css'?>">
    <link rel="icon" href="<?php echo base_url().'media/panic.jpg'?>">

    <meta name="viewport" content="width=device-width, user-scalable=no, 
    initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
</head>
<body>
    <!-- Contenedor principal -->
    <div class="container-all">

        <!-- Contenedor del formulario -->

        <div class="ctn-form">
            <img src="<?php echo base_url().'media/imagenes/lock.png'?>" alt="" class="lock">
            <h1 class="title"> <strong> Iniciar Sesión </strong></h1>
            <form action="<?php echo site_url('login/revision')?>" method="post">
                <label class="label" for="">Usuario</label>
                <input type="text" name="usuario">
                <span class="msg-error" ></span>
                <label class="label" for="">Contraseña</label>
                <input type="password" name="password">
                <span class="msg-error" ></span>
                <input type="submit" value="Ingresar"> 
            </form>
            <span class="text-bottom">¿No eres administrador? <a href="<?php echo base_url()?>"> Volver a la vista de usuario</a></span>
        </div>
        <!-- Contenedor del texto -->
        <div class="ctn-text"> 
        <div class="capa"></div>
        <h1 class="title-description"> When you love what you do, you will never work!</h1>
        </div>
    </div>

    
</body>
</html>