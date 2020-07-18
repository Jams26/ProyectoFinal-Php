<?php
function signo_zodiaco($fecha){ 
    $zodiaco = ''; 
            
    list ( $ano, $mes, $dia ) = explode ( "-", $fecha ); 
    
    if     ( ( $mes == 1 && $dia > 19 )  || ( $mes == 2 && $dia < 19 ) )  { $zodiaco = "Acuario"; }
    elseif ( ( $mes == 2 && $dia > 18 )  || ( $mes == 3 && $dia < 21 ) )  { $zodiaco = "Piscis"; } 
    elseif ( ( $mes == 3 && $dia > 20 )  || ( $mes == 4 && $dia < 20 ) )  { $zodiaco = "Aries"; } 
    elseif ( ( $mes == 4 && $dia > 19 )  || ( $mes == 5 && $dia < 21 ) )  { $zodiaco = "Tauro"; } 
    elseif ( ( $mes == 5 && $dia > 20 )  || ( $mes == 6 && $dia < 21 ) )  { $zodiaco = "Géminis"; } 
    elseif ( ( $mes == 6 && $dia > 20 )  || ( $mes == 7 && $dia < 23 ) )  { $zodiaco = "Cáncer"; } 
    elseif ( ( $mes == 7 && $dia > 22 )  || ( $mes == 8 && $dia < 23 ) )  { $zodiaco = "Leo"; } 
    elseif ( ( $mes == 8 && $dia > 22 )  || ( $mes == 9 && $dia < 23 ) )  { $zodiaco = "Virgo"; } 
    elseif ( ( $mes == 9 && $dia > 22 )  || ( $mes == 10 && $dia < 23 ) ) { $zodiaco = "Libra"; } 
    elseif ( ( $mes == 10 && $dia > 22 ) || ( $mes == 11 && $dia < 22 ) ) { $zodiaco = "Escorpio"; } 
    elseif ( ( $mes == 11 && $dia > 21 ) || ( $mes == 12 && $dia < 22 ) ) { $zodiaco = "Sagitario"; } 
    elseif ( ( $mes == 12 && $dia > 21 ) || ( $mes == 1 && $dia < 20 ) )  { $zodiaco = "Capricornio"; } 
    return $zodiaco; 
    }

?>
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

    <br>
    <h1 style="color: white"> <center> Cantidad de casos por su signo del Zodiaco:</center></h1>
    <hr>

    <div class="container">
    <section class='statis text-center'>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="box danger">
              <img style="width:85px; height:70px" src="<?php echo base_url().'media/signos/aries.png'?>"></i>
              <h3><?php
                    $query = $this->db->get('casos');
                    $x=0;
                    foreach ($query->result() as $row)
                    {
                        $y = signo_zodiaco($row->fecha_nacimiento);
                        if($y=="Aries"){
                            $x++;
                        }
                    }

                    echo "$x";
                ?></h3>
              <p class="lead">Aries</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="box warning">
              <img style="width:85px; height:70px"
               src="<?php echo base_url().'media/signos/tauro.png'?>"></i>
              <h3><?php
                    $query = $this->db->get('casos');
                    $x=0;
                    foreach ($query->result() as $row)
                    {
                        $y = signo_zodiaco($row->fecha_nacimiento);
                        if($y=="Tauro"){
                            $x++;
                        }
                    }
                    echo "$x";
                ?></h3>
              <p class="lead">Tauro</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="box cinco">
              <img style="width:85px; height:70px" 
              src="<?php echo base_url().'media/signos/geminis.png'?>"></i>
              <h3><?php
                    $query = $this->db->get('casos');
                    $x=0;
                    foreach ($query->result() as $row)
                    {
                        $y = signo_zodiaco($row->fecha_nacimiento);
                        if($y=="Geminis"){
                            $x++;
                        }
                    }

                    echo "$x";
                ?></h3>
              <p class="lead">Geminis</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="box inf">
              <img style="width:85px; height:70px"
               src="<?php echo base_url().'media/signos/Cancer.png'?>"></i>
              <h3><?php
                    $query = $this->db->get('casos');
                    $x=0;
                    foreach ($query->result() as $row)
                    {
                        $y = signo_zodiaco($row->fecha_nacimiento);
                        if($y=="Cancer"){
                            $x++;
                        }
                    }

                    echo "$x";
                ?></h3>
              <p class="lead">Cancer</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="box danger">
              <img style="width:85px; height:70px" src="<?php echo base_url().'media/signos/Leo.png'?>"></i>
              <h3><?php
                    $query = $this->db->get('casos');
                    $x=0;
                    foreach ($query->result() as $row)
                    {
                        $y = signo_zodiaco($row->fecha_nacimiento);
                        if($y=="Leo"){
                            $x++;
                        }
                    }

                    echo "$x";
                ?></h3>
              <p class="lead">Leo</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="box warning">
              <img style="width:85px; height:70px" src="<?php echo base_url().'media/signos/Virgo.png'?>"></i>
              <h3><?php
                    $query = $this->db->get('casos');
                    $x=0;
                    foreach ($query->result() as $row)
                    {
                        $y = signo_zodiaco($row->fecha_nacimiento);
                        if($y=="Virgo"){
                            $x++;
                        }
                    }

                    echo "$x";
                ?></h3>
              <p class="lead">Virgo</p>
            </div>
          </div>
          
        </div>
      </div>
    </section>
    
  <canvas id="myChart"></canvas>
    </div>
  <div class="container">
    <section class='statis text-center'>
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="box cinco">
              <img style="width:85px; height:70px" src="<?php echo base_url().'media/signos/Libra.png'?>"></i>
              <h3><?php
                    $query = $this->db->get('casos');
                    $x=0;
                    foreach ($query->result() as $row)
                    {
                        $y = signo_zodiaco($row->fecha_nacimiento);
                        if($y=="Libra"){
                            $x++;
                        }
                    }

                    echo "$x";
                ?></h3>
              <p class="lead">Libra</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="box inf">
              <img style="width:85px; height:70px" src="<?php echo base_url().'media/signos/Escorpio.png'?>"></i>
              <h3><?php
                    $query = $this->db->get('casos');
                    $x=0;
                    foreach ($query->result() as $row)
                    {
                        $y = signo_zodiaco($row->fecha_nacimiento);
                        if($y=="Escorpio"){
                            $x++;
                        }
                    }

                    echo "$x";
                ?></h3>
              <p class="lead">Escorpio</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="box danger">
              <img style="width:85px; height:70px" src="<?php echo base_url().'media/signos/Sagitario.png'?>"></i>
              <h3><?php
                    $query = $this->db->get('casos');
                    $x=0;
                    foreach ($query->result() as $row)
                    {
                        $y = signo_zodiaco($row->fecha_nacimiento);
                        if($y=="Sagitario"){
                            $x++;
                        }
                    }

                    echo "$x";
                ?></h3>
              <p class="lead">Sagitario</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="box warning">
              <img style="width:85px; height:70px" src="<?php echo base_url().'media/signos/Capricornio.png'?>"></i>
              <h3><?php
                    $query = $this->db->get('casos');
                    $x=0;
                    foreach ($query->result() as $row)
                    {
                        $y = signo_zodiaco($row->fecha_nacimiento);
                        if($y=="Capricornio"){
                            $x++;
                        }
                    }

                    echo "$x";
                ?></h3>
              <p class="lead">Capricornio</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="box cinco">
              <img style="width:85px; height:70px" src="<?php echo base_url().'media/signos/Acuario.png'?>"></i>
              <h3><?php
                    $query = $this->db->get('casos');
                    $x=0;
                    foreach ($query->result() as $row)
                    {
                        $y = signo_zodiaco($row->fecha_nacimiento);
                        if($y=="Acuario"){
                            $x++;
                        }
                    }

                    echo "$x";
                ?></h3>
              <p class="lead">Acuario</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="box inf">
              <img style="width:85px; height:70px" src="<?php echo base_url().'media/signos/Piscis.png'?>"></i>
              <h3><?php
                    $query = $this->db->get('casos');
                    $x=0;
                    foreach ($query->result() as $row)
                    {
                        $y = signo_zodiaco($row->fecha_nacimiento);
                        if($y=="Piscis"){
                            $x++;
                        }
                    }

                    echo "$x";
                ?></h3>
              <p class="lead">Piscis</p>
            </div>
          </div>
        </div>
      </div>
    </section>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script>

      var signos_conteo = [<?php
            $query = $this->db->get('casos');
            $x=0;
            foreach ($query->result() as $row)
            {
                $y = signo_zodiaco($row->fecha_nacimiento);
                if($y=="Aries"){
                    $x++;
                }
            }
            
            echo "$x";
        ?>,<?php
            $query = $this->db->get('casos');
            $x=0;
            foreach ($query->result() as $row)
            {
                $y = signo_zodiaco($row->fecha_nacimiento);
                if($y=="Tauro"){
                    $x++;
                }
            }
            echo "$x";
        ?>,<?php
        $query = $this->db->get('casos');
        $x=0;
        foreach ($query->result() as $row)
        {
            $y = signo_zodiaco($row->fecha_nacimiento);
            if($y=="Geminis"){
                $x++;
            }
        }
        echo "$x";
    ?>,<?php
    $query = $this->db->get('casos');
    $x=0;
    foreach ($query->result() as $row)
    {
        $y = signo_zodiaco($row->fecha_nacimiento);
        if($y=="Cancer"){
            $x++;
        }
    }
    echo "$x";
?>,<?php
$query = $this->db->get('casos');
$x=0;
foreach ($query->result() as $row)
{
    $y = signo_zodiaco($row->fecha_nacimiento);
    if($y=="Leo"){
        $x++;
    }
}
echo "$x";
?>,<?php
$query = $this->db->get('casos');
$x=0;
foreach ($query->result() as $row)
{
    $y = signo_zodiaco($row->fecha_nacimiento);
    if($y=="Virgo"){
        $x++;
    }
}
echo "$x";
?>,<?php
$query = $this->db->get('casos');
$x=0;
foreach ($query->result() as $row)
{
    $y = signo_zodiaco($row->fecha_nacimiento);
    if($y=="Libra"){
        $x++;
    }
}
echo "$x";
?>,<?php
$query = $this->db->get('casos');
$x=0;
foreach ($query->result() as $row)
{
    $y = signo_zodiaco($row->fecha_nacimiento);
    if($y=="Escorpio"){
        $x++;
    }
}
echo "$x";
?>,<?php
$query = $this->db->get('casos');
$x=0;
foreach ($query->result() as $row)
{
    $y = signo_zodiaco($row->fecha_nacimiento);
    if($y=="Sagitario"){
        $x++;
    }
}
echo "$x";
?>,<?php
$query = $this->db->get('casos');
$x=0;
foreach ($query->result() as $row)
{
    $y = signo_zodiaco($row->fecha_nacimiento);
    if($y=="Capricornio"){
        $x++;
    }
}
echo "$x";
?>,<?php
$query = $this->db->get('casos');
$x=0;
foreach ($query->result() as $row)
{
    $y = signo_zodiaco($row->fecha_nacimiento);
    if($y=="Acuario"){
        $x++;
    }
}
echo "$x";
?>,<?php
$query = $this->db->get('casos');
$x=0;
foreach ($query->result() as $row)
{
    $y = signo_zodiaco($row->fecha_nacimiento);
    if($y=="Piscis"){
        $x++;
    }
}
echo "$x";
?>];
      var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['Aries', 'Tauro', 'Geminis', 'Cancer', 'Leo', 'Virgo', 'Libra', 'Escorpio', 'Sagitario', 'Capricornio', 'Acuario', 'Piscis'],
        datasets: [{
            label: '',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: signos_conteo
        }]
    },

    // Configuration options go here
    options: {}
});
  </script>
</body>
</html>