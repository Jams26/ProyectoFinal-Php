
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: COVID-19</title>
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
                            <p class="name">Admin</p>  
                            <p class="role"></p>
                            <a href="<?php echo base_url().'index.php/covid/addworkers'?>" class="btn">Workers</a>
                        </div>
                    </div>
                <ul class="siderbar_menu">
                    <li><a href="<?php echo base_url().'index.php/covid/index'?>">
                        <div class="icon"><i class="fas fa-file-alt"></i></div>
                        <div class="title">Casos</div>
                    </a></li>  
                    <li><a href="<?php echo base_url().'index.php/covid/addnoticias'?>" class="">
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
                <li></li>
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
                <div id="insertarbox" >                 
                    <form id="loginform" class="form-horizontal" method="post" action="<?php base_url().'index.php/covid/index'?>">
                    <div class="card card-info" >
                        <div class="card-header">
                            <div class="text-center">Editar trabajadores</div>
                        </div>     
                        <div class="card-body">
                            <div class="row">
                                <div class="input-group col-md-6 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Usuario:</span>
                                    </div>
                                    <input id="usuario" maxlength="11" value="<?php echo set_value('usuario', $worker['usuario']);?>" type="text" class="form-control" name="usuario" required>                                        
                                </div>
                                <div  class="input-group col-md-6 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Password:</span>
                                    </div>
                                    <input id="Apellido" type="password" class="form-control"  value="<?php echo set_value('password',$worker['clave']);?>" name="clave" required>                                        
                                </div>
                            </div>  
                            <div class="row">
                                <div  class="input-group col-md-6 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Email:</span>
                                    </div>
                                    <input id="Email" type="text" class="form-control"  value="<?php echo set_value('email', $worker['email']);?>" name="email" required>                                        
                                </div>
                                <div class="input-group col-md-6 mb-3">
                                    <select required class="custom-select" name="level">
                                        <option value="<?php echo set_value('level', $worker['level']);?>"><?php if ($worker['level']=='1'){ $puesto = "Administrador";}else{$puesto="Ayudante";} echo $puesto?></option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Ayudante</option>
                                    </select>                                       
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            
                            <div class="col-sm-12 text-center">
                                <input id="btnRegistrar"  type="submit" value="Registrar" class="btn btn-success"/>
                            </div>
                        </div>                   
                    </div>  
                </form>     
            </div>
            <!--Div formulario-->

            

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="<?php echo base_url().'media/menu.js'?>"></script>    
   
<script>

    $("#ventanaModel").modal("show");
    function closeModel(){
        $("#ventanaModel").modal("hide");
    }

    $('#tablaCasos,  #add').hide();
    
    function Table(){
        
        $('#tablaCasos, #add').show('slow');
        $('#insertarbox, #list').hide('slow');

    }
    function Add(){
        $('#tablaCasos, #add').hide('slow');
        $('#insertarbox, #list').show('slow');
    }

</script>
    
</body>
</html>