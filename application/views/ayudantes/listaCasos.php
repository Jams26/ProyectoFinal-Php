

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayudante: COVID-19</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?php echo base_url().'media/menu.js'?>"></script>
    <link rel="stylesheet" href="<?php echo base_url().'media/menu.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'media/table.css'?>">
    <link rel="icon" href="<?php echo base_url().'media/panic.jpg'?>">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="bg_shadow"></div>
                <div class="sidebar__inner">
                    <div class="close">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="profile_info">
                        <div class="profile_img">
                            <img src="<?php echo base_url().'media/sars-cov-19.jpg'?>" alt="profile_img">
                        </div>
                        <div class="profile_data">
                            <p class="name">Ayudante</p>  
                            <p class="role"></p>
                            
                        </div>
                    </div>
                <ul class="siderbar_menu">
                    <li><a href="<?php echo base_url().'index.php/ayudante/index'?>">
                        <div class="icon"><i class="fas fa-file-alt"></i></div>
                        <div class="title">Casos</div>
                    </a></li>  
                    <li><a href="<?php echo base_url().'index.php/ayudante/listaNoticias'?>" class="">
                        <div class="icon"><i class="fas fa-newspaper"></i></div>
                        <div class="title"> Noticias</div>
                    </a></li>  
                    
                </ul>
            </div>
        </div>
        <div class="main_container">
            <div class="top_navbar">
                <div class="hamburger">
                    <div class="hamburger__inner">
                    <i class="fas fa-bars"></i>  
                </div>  
            </div>
            <ul class="menu">
               
            </ul>
            <ul class="right_bar">
                
                <li><a href="<?php echo site_url('login/cerrarsesion')?>">Cerrar sesion </a><i class="fas fa-sign-out-alt"></i></li>
                 
            </ul>
        </div>
        

        <div class="container">
            <?php 
            $success = $this->session->userdata('correcto');
            $titulo = $this->session->userdata('titulo');
            if($success != "" && $titulo != "") {
            ?>
            <div class="modal" id="ventanaModel" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 id="tituloVentana"><?php echo $titulo; ?></h5>
                            <button onclick="closeModel()" class="close" data-dissmis="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-sucess">
                                <h6><strong><?php echo $success;?></strong></h6>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="closeModel();" class="btn btn-danger" data-dissmis="modal">
                                Cerrar
                            </button>
                            <button onclick="closeModel();" class="btn btn-primary">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
            <div class="item overflow-y" >
                
            <!--Div formulario-->

            <!-- div tabla casos -->
           
            <div id="tablaCasos" class="col-md-12">
                <table role="table" class="table table-bordered table-striped table-responsive overflow-y" style="height: 500px "   id="tableOne">
                    <thead role="rowgroup">
                        <tr role="row">
                            <th role="row">Cedula</th>
                            <th role="columnheader">Nombre</th>
                            <th role="columnheader">Apellido</th>
                            <th role="columnheader">Pais</th>
                            <th role="columnheader">Ciudad</th>
                            <th role="columnheader">Longitud</th>
                            <th role="columnheader">Latitud</th>
                            <th role="columnheader">Fecha de contagio</th>
                            <th role="columnheader">Fecha de nacimiento</th>
                            <th role="columnheader">Comentario</th>
                            <th role="columnheader">Editar </th>
                        </tr>
                    </thead>
                    <tbody role="rowgroup">
                        <?php if(!empty($casos)){  foreach($casos as $caso) {?>
                        <tr role="row">
                            <td role="cell"><?php echo $caso['cedula']?></td>
                            <td role="cell"><?php echo $caso['nombre']?></td>
                            <td role="cell"><?php echo $caso['apellido']?></td>
                            <td role="cell"><?php echo $caso['pais']?></td>
                            <td role="cell"><?php echo $caso['ciudad']?></td>
                            <td role="cell"><?php echo $caso['lon']?></td>
                            <td role="cell"><?php echo $caso['lat']?></td>
                            <td role="cell"><?php echo $caso['fecha_contagio']?></td>
                            <td role="cell"><?php echo $caso['fecha_nacimiento']?></td>
                            <td role="cell"><?php echo $caso['comentario']?></td>
                            <td role="cell"><p>
                                <a class="btn btn-warning" href="<?php echo base_url().'index.php/ayudante/editar/'.$caso['id']?>">Editar</a>
                                
                            </p></td>
                        </tr>
                        <?php } } else {?>
                            <tr>
                                <td role="cell" colspan="11">La tabla no tiene datos</td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <!-- termina div tabla casos -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="<?php echo base_url().'media/menu.js'?>"></script>    
   
<script>

    $("#ventanaModel").modal("show");
    function closeModel(){
        $("#ventanaModel").modal("hide");
    }


</script>
    
</body>
</html>