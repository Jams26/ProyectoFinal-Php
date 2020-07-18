<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url().'media/css/styleNews.css'?>">
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />
    <link rel="icon" href="<?php echo base_url().'media/panic.jpg'?>">
    <title>Usuario: COVID-19</title>
</head>
<body>
    
    <div id="menu">
        <ul>
            <li><a href="<?php echo base_url().'index.php/usuario/index'?>">Casos</a></li>
            <li><a href="<?php echo base_url().'index.php/usuario/noticias'?>">Noticias</a></li>
            <li><a href="<?php echo base_url().'index.php/usuario/estadistica'?>">Estadisticas</a></li>
            <li class="right"><a href="<?php echo base_url().'index.php/login/'?>">Admin</a></li>
            <li class="right"><a href="https://t.me/SarsCovid19JR">Subcribete al canal</a></li>
        </ul>
    </div>
    <br >

    <div class="container">
    
    <div class="row" id='destino'>
        
        
    </div>
    <textarea style="display: none;" id="txtArea" cols="30" rows="10">
   
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">{titulo}</h4>
            </div>
            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="<?php echo base_url().'{foto}'?>"></img>
            <div class="card-body">
              <p class="card-text">{resumen}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                </div>
                <small class="text-muted">{fecha}</small>
              </div>
            </div>
          </div>
        
    </textarea>

    </div>
    
<script>
    var titulo = [<?php foreach ($usuario as $noticia){?><?php echo "{titulo: '{$noticia['titulo']}'}," ?><?php }?>];
    var resumen = [<?php foreach ($usuario as $noticia){?><?php echo "{resumen: '{$noticia['resumen']}'}," ?><?php }?>];
    var foto = [<?php foreach ($usuario as $noticia){?><?php echo "{foto: '{$noticia['foto']}'}," ?><?php }?>];;

    var fecha = [<?php foreach ($usuario as $noticia){?><?php echo "{fecha: '{$noticia['fecha']}'}," ?><?php }?>];



    mostrarNoticias();
    function mostrarNoticias(){
    divDestino=document.getElementById('destino');
    divDestino.innerHTML = "";
    txtModel = document.getElementById('txtArea').value;
    for(x=0; x < titulo.length; x++){
      titulos= titulo[x];    
      resumens = resumen[x];
      fotos = foto[x];
      fechas = fecha[x];
     
      div= document.createElement('div');
      div.setAttribute("class", 'col-md-4');
      txt=txtModel;
        txt = txt.replace("{titulo}", titulos['titulo']);
        txt = txt.replace("{resumen}", resumens['resumen']);
        txt = txt.replace("{foto}", fotos['foto']);
        txt = txt.replace("{fecha}", fechas['fecha']);
      div.innerHTML=txt;
      divDestino.appendChild(div);
      
    }
    }

</script>
</body>
</html>