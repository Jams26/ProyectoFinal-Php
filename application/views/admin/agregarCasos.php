

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
                <li id='list' ><a onclick="Table();">Lista de casos</a></li>
                <li id='add'><a onclick="Add();">Agregar casos</a></li>
            </ul>
            <ul class="right_bar">
                <li><i class=""></i></li>
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
                            <div class="text-center">Registrar casos del covid-19</div>
                        </div>     
                        <div class="card-body">
                            <div class="row">
                                <div class="input-group col-md-12 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Cedula:</span>
                                    </div>
                                    <input  value="<?php echo set_value('cedula');?>" type="number" class="form-control" name="cedula" required>                                        
                                </div>

                            </div>  
                            <div class="row">
                                <div  class="input-group col-md-6 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Nombre:</span>
                                    </div>
                                    <input id="nombre" type="text" class="form-control"  value="<?php echo set_value('nombre');?>" name="nombre" required>                                        
                                </div>
                                <div  class="input-group col-md-6 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Apellido:</span>
                                    </div>
                                    <input id="Apellido" type="text" class="form-control"  value="<?php echo set_value('apellido');?>" name="apellido" required>                                        
                                </div>
                            </div>
                            <div class="row">
                            <div class="input-group col-md-6 mb-3">
                                    <select required class="custom-select" name="pais">
                                        <option value="<?php echo set_value('pais');?>"><?php echo set_value('pais');?>Elija el pais</option>
                                        <option value="Afganistán ">Afganistán </option>
                                        <option value="Akrotiri ">Akrotiri </option>
                                        <option value="Albania ">Albania </option>
                                        <option value="Alemania ">Alemania </option>
                                        <option value="Andorra ">Andorra </option>
                                        <option value="Angola ">Angola </option>
                                        <option value="Anguila ">Anguila </option>
                                        <option value="Antártida ">Antártida </option>
                                        <option value="Antigua y Barbuda ">Antigua y Barbuda </option>
                                        <option value="Antillas Neerlandesas ">Antillas Neerlandesas </option>
                                        <option value="Arabia Saudí ">Arabia Saudí </option>
                                        <option value="Arctic Ocean ">Arctic Ocean </option>
                                        <option value="Argelia ">Argelia </option>
                                        <option value="Argentina ">Argentina </option>
                                        <option value="Armenia ">Armenia </option>
                                        <option value="Aruba ">Aruba </option>
                                        <option value="Ashmore andCartier Islands ">Ashmore andCartier Islands </option>
                                        <option value="Atlantic Ocean ">Atlantic Ocean </option>
                                        <option value="Australia ">Australia </option>
                                        <option value="Austria ">Austria </option>
                                        <option value="Azerbaiyán ">Azerbaiyán </option>
                                        <option value="Bahamas ">Bahamas </option>
                                        <option value="Bahráin ">Bahráin </option>
                                        <option value="Bangladesh ">Bangladesh </option>
                                        <option value="Barbados ">Barbados </option>
                                        <option value="Bélgica ">Bélgica </option>
                                        <option value="Belice ">Belice </option>
                                        <option value="Benín ">Benín </option>
                                        <option value="Bermudas ">Bermudas </option>
                                        <option value="Bielorrusia ">Bielorrusia </option>
                                        <option value="Birmania Myanmar ">Birmania Myanmar </option>
                                        <option value="Bolivia ">Bolivia </option>
                                        <option value="Bosnia y Hercegovina ">Bosnia y Hercegovina </option>
                                        <option value="Botsuana ">Botsuana </option>
                                        <option value="Brasil ">Brasil </option>
                                        <option value="Brunéi ">Brunéi </option>
                                        <option value="Bulgaria ">Bulgaria </option>
                                        <option value="Burkina Faso ">Burkina Faso </option>
                                        <option value="Burundi ">Burundi </option>
                                        <option value="Bután ">Bután </option>
                                        <option value="Cabo Verde ">Cabo Verde </option>
                                        <option value="Camboya ">Camboya </option>
                                        <option value="Camerún ">Camerún </option>
                                        <option value="Canadá ">Canadá </option>
                                        <option value="Chad ">Chad </option>
                                        <option value="Chile ">Chile </option>
                                        <option value="China ">China </option>
                                        <option value="Chipre ">Chipre </option>
                                        <option value="Clipperton Island ">Clipperton Island </option>
                                        <option value="Colombia ">Colombia </option>
                                        <option value="Comoras ">Comoras </option>
                                        <option value="Congo ">Congo </option>
                                        <option value="Coral Sea Islands ">Coral Sea Islands </option>
                                        <option value="Corea del Norte ">Corea del Norte </option>
                                        <option value="Corea del Sur ">Corea del Sur </option>
                                        <option value="Costa de Marfil ">Costa de Marfil </option>
                                        <option value="Costa Rica ">Costa Rica </option>
                                        <option value="Croacia ">Croacia </option>
                                        <option value="Cuba ">Cuba </option>
                                        <option value="Dhekelia ">Dhekelia </option>
                                        <option value="Dinamarca ">Dinamarca </option>
                                        <option value="Dominica ">Dominica </option>
                                        <option value="Ecuador ">Ecuador </option>
                                        <option value="Egipto ">Egipto </option>
                                        <option value="El Salvador ">El Salvador </option>
                                        <option value="El Vaticano ">El Vaticano </option>
                                        <option value="Emiratos Árabes Unidos ">Emiratos Árabes Unidos </option>
                                        <option value="Eritrea ">Eritrea </option>
                                        <option value="Eslovaquia ">Eslovaquia </option>
                                        <option value="Eslovenia ">Eslovenia </option>
                                        <option value="España ">España </option>
                                        <option value="Estados Unidos ">Estados Unidos </option>
                                        <option value="Estonia ">Estonia </option>
                                        <option value="Etiopía ">Etiopía </option>
                                        <option value="Filipinas ">Filipinas </option>
                                        <option value="Finlandia ">Finlandia </option>
                                        <option value="Fiyi ">Fiyi </option>
                                        <option value="Francia ">Francia </option>
                                        <option value="Gabón ">Gabón </option>
                                        <option value="Gambia ">Gambia </option>
                                        <option value="Gaza Strip ">Gaza Strip </option>
                                        <option value="Georgia ">Georgia </option>
                                        <option value="Ghana ">Ghana </option>
                                        <option value="Gibraltar ">Gibraltar </option>
                                        <option value="Granada ">Granada </option>
                                        <option value="Grecia ">Grecia </option>
                                        <option value="Groenlandia ">Groenlandia </option>
                                        <option value="Guam ">Guam </option>
                                        <option value="Guatemala ">Guatemala </option>
                                        <option value="Guernsey ">Guernsey </option>
                                        <option value="Guinea ">Guinea </option>
                                        <option value="Guinea Ecuatorial ">Guinea Ecuatorial </option>
                                        <option value="Guinea-Bissau ">Guinea-Bissau </option>
                                        <option value="Guyana ">Guyana </option>
                                        <option value="Haití ">Haití </option>
                                        <option value="Honduras ">Honduras </option>
                                        <option value="Hong Kong ">Hong Kong </option>
                                        <option value="Hungría ">Hungría </option>
                                        <option value="India ">India </option>
                                        <option value="Indian Ocean ">Indian Ocean </option>
                                        <option value="Indonesia ">Indonesia </option>
                                        <option value="Irán ">Irán </option>
                                        <option value="Iraq ">Iraq </option>
                                        <option value="Irlanda ">Irlanda </option>
                                        <option value="Isla Bouvet ">Isla Bouvet </option>
                                        <option value="Isla Christmas ">Isla Christmas </option>
                                        <option value="Isla Norfolk ">Isla Norfolk </option>
                                        <option value="Islandia ">Islandia </option>
                                        <option value="Islas Caimán ">Islas Caimán </option>
                                        <option value="Islas Cocos ">Islas Cocos </option>
                                        <option value="Islas Cook ">Islas Cook </option>
                                        <option value="Islas Feroe ">Islas Feroe </option>
                                        <option value="Islas Georgia del Sur y Sandwich del Sur ">Islas Georgia del Sur y Sandwich del Sur </option>
                                        <option value="Islas Heard y McDonald ">Islas Heard y McDonald </option>
                                        <option value="Islas Malvinas ">Islas Malvinas </option>
                                        <option value="Islas Marianas del Norte ">Islas Marianas del Norte </option>
                                        <option value="IslasMarshall ">IslasMarshall </option>
                                        <option value="Islas Pitcairn ">Islas Pitcairn </option>
                                        <option value="Islas Salomón ">Islas Salomón </option>
                                        <option value="Islas Turcas y Caicos ">Islas Turcas y Caicos </option>
                                        <option value="Islas Vírgenes Americanas ">Islas Vírgenes Americanas </option>
                                        <option value="Islas Vírgenes Británicas ">Islas Vírgenes Británicas </option>
                                        <option value="Israel ">Israel </option>
                                        <option value="Italia ">Italia </option>
                                        <option value="Jamaica ">Jamaica </option>
                                        <option value="Jan Mayen ">Jan Mayen </option>
                                        <option value="Japón ">Japón </option>
                                        <option value="Jersey ">Jersey </option>
                                        <option value="Jordania ">Jordania </option>
                                        <option value="Kazajistán ">Kazajistán </option>
                                        <option value="Kenia ">Kenia </option>
                                        <option value="Kirguizistán ">Kirguizistán </option>
                                        <option value="Kiribati ">Kiribati </option>
                                        <option value="Kuwait ">Kuwait </option>
                                        <option value="Laos ">Laos </option>
                                        <option value="Lesoto ">Lesoto </option>
                                        <option value="Letonia ">Letonia </option>
                                        <option value="Líbano ">Líbano </option>
                                        <option value="Liberia ">Liberia </option>
                                        <option value="Libia ">Libia </option>
                                        <option value="Liechtenstein ">Liechtenstein </option>
                                        <option value="Lituania ">Lituania </option>
                                        <option value="Luxemburgo ">Luxemburgo </option>
                                        <option value="Macao ">Macao </option>
                                        <option value="Macedonia ">Macedonia </option>
                                        <option value="Madagascar ">Madagascar </option>
                                        <option value="Malasia ">Malasia </option>
                                        <option value="Malaui ">Malaui </option>
                                        <option value="Maldivas ">Maldivas </option>
                                        <option value="Malí ">Malí </option>
                                        <option value="Malta ">Malta </option>
                                        <option value="Man, Isle of ">Man, Isle of </option>
                                        <option value="Marruecos ">Marruecos </option>
                                        <option value="Mauricio ">Mauricio </option>
                                        <option value="Mauritania ">Mauritania </option>
                                        <option value="Mayotte ">Mayotte </option>
                                        <option value="México ">México </option>
                                        <option value="Micronesia ">Micronesia </option>
                                        <option value="Moldavia ">Moldavia </option>
                                        <option value="Mónaco ">Mónaco </option>
                                        <option value="Mongolia ">Mongolia </option>
                                        <option value="Montserrat ">Montserrat </option>
                                        <option value="Mozambique ">Mozambique </option>
                                        <option value="Namibia ">Namibia </option>
                                        <option value="Nauru ">Nauru </option>
                                        <option value="Navassa Island ">Navassa Island </option>
                                        <option value="Nepal ">Nepal </option>
                                        <option value="Nicaragua ">Nicaragua </option>
                                        <option value="Níger ">Níger </option>
                                        <option value="Nigeria ">Nigeria </option>
                                        <option value="Niue ">Niue </option>
                                        <option value="Noruega ">Noruega </option>
                                        <option value="Nueva Caledonia ">Nueva Caledonia </option>
                                        <option value="Nueva Zelanda ">Nueva Zelanda </option>
                                        <option value="Omán ">Omán </option>
                                        <option value="Pacific Ocean ">Pacific Ocean </option>
                                        <option value="Países Bajos ">Países Bajos </option>
                                        <option value="Pakistán ">Pakistán </option>
                                        <option value="Palaos ">Palaos </option>
                                        <option value="Panamá ">Panamá </option>
                                        <option value="Papúa-Nueva Guinea ">Papúa-Nueva Guinea </option>
                                        <option value="Paracel Islands ">Paracel Islands </option>
                                        <option value="Paraguay ">Paraguay </option>
                                        <option value="Perú ">Perú </option>
                                        <option value="Polinesia Francesa ">Polinesia Francesa </option>
                                        <option value="Polonia ">Polonia </option>
                                        <option value="Portugal ">Portugal </option>
                                        <option value="Puerto Rico ">Puerto Rico </option>
                                        <option value="Qatar ">Qatar </option>
                                        <option value="Reino Unido ">Reino Unido </option>
                                        <option value="República Centroafricana ">República Centroafricana </option>
                                        <option value="República Checa ">República Checa </option>
                                        <option value="República Democrática del Congo ">República Democrática del Congo </option>
                                        <option value="República Dominicana ">República Dominicana </option>
                                        <option value="Ruanda ">Ruanda </option>
                                        <option value="Rumania ">Rumania </option>
                                        <option value="Rusia ">Rusia </option>
                                        <option value="Sáhara Occidental ">Sáhara Occidental </option>
                                        <option value="Samoa ">Samoa </option>
                                        <option value="Samoa Americana ">Samoa Americana </option>
                                        <option value="San Cristóbal y Nieves ">San Cristóbal y Nieves </option>
                                        <option value="San Marino ">San Marino </option>
                                        <option value="San Pedro y Miquelón ">San Pedro y Miquelón </option>
                                        <option value="San Vicente y las Granadinas ">San Vicente y las Granadinas </option>
                                        <option value="Santa Helena ">Santa Helena </option>
                                        <option value="Santa Lucía ">Santa Lucía </option>
                                        <option value="Santo Tomé y Príncipe ">Santo Tomé y Príncipe </option>
                                        <option value="Senegal ">Senegal </option>
                                        <option value="Seychelles ">Seychelles </option>
                                        <option value="Sierra Leona ">Sierra Leona </option>
                                        <option value="Singapur ">Singapur </option>
                                        <option value="Siria ">Siria </option>
                                        <option value="Somalia ">Somalia </option>
                                        <option value="Southern Ocean ">Southern Ocean </option>
                                        <option value="Spratly Islands ">Spratly Islands </option>
                                        <option value="Sri Lanka ">Sri Lanka </option>
                                        <option value="Suazilandia ">Suazilandia </option>
                                        <option value="Sudáfrica ">Sudáfrica </option>
                                        <option value="Sudán ">Sudán </option>
                                        <option value="Suecia ">Suecia </option>
                                        <option value="Suiza ">Suiza </option>
                                        <option value="Surinam ">Surinam </option>
                                        <option value="Svalbard y Jan Mayen ">Svalbard y Jan Mayen </option>
                                        <option value="Tailandia ">Tailandia </option>
                                        <option value="Taiwán ">Taiwán </option>
                                        <option value="Tanzania ">Tanzania </option>
                                        <option value="Tayikistán ">Tayikistán </option>
                                        <option value="TerritorioBritánicodel Océano Indico ">TerritorioBritánicodel Océano Indico </option>
                                        <option value="Territorios Australes Franceses ">Territorios Australes Franceses </option>
                                        <option value="Timor Oriental ">Timor Oriental </option>
                                        <option value="Togo ">Togo </option>
                                        <option value="Tokelau ">Tokelau </option>
                                        <option value="Tonga ">Tonga </option>
                                        <option value="Trinidad y Tobago ">Trinidad y Tobago </option>
                                        <option value="Túnez ">Túnez </option>
                                        <option value="Turkmenistán ">Turkmenistán </option>
                                        <option value="Turquía ">Turquía </option>
                                        <option value="Tuvalu ">Tuvalu </option>
                                        <option value="Ucrania ">Ucrania </option>
                                        <option value="Uganda ">Uganda </option>
                                        <option value="Unión Europea ">Unión Europea </option>
                                        <option value="Uruguay ">Uruguay </option>
                                        <option value="Uzbekistán ">Uzbekistán </option>
                                        <option value="Vanuatu ">Vanuatu </option>
                                        <option value="Venezuela ">Venezuela </option>
                                        <option value="Vietnam ">Vietnam </option>
                                        <option value="Wake Island ">Wake Island </option>
                                        <option value="Wallis y Futuna ">Wallis y Futuna </option>
                                        <option value="West Bank ">West Bank </option>
                                        <option value="World ">World </option>
                                        <option value="Yemen ">Yemen </option>
                                        <option value="Yibuti ">Yibuti </option>
                                        <option value="Zambia ">Zambia </option>
                                        <option value="Zimbabue ">Zimbabue </option>
                                    </select>                                       
                                </div>

                                <div class="input-group col-md-6 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Ciudad:</span>
                                    </div>
                                    <input id="ciudad"  value="<?php echo set_value('ciudad');?>" type="text" class="form-control" name="ciudad" required>                                        
                                </div>    
                            </div>
                            

                            <div class="row">
                                <div class="input-group col-md-6 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Longitud:</span>
                                    </div>
                                    <input id="longitud"  value="<?php echo set_value('lon');?>" maxlength="12" type="text" class="form-control" name="lon" required>                                        
                                </div>
                                <div class="input-group col-md-6 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Latitud:</span>
                                    </div>
                                    <input id="latitud"  value="<?php echo set_value('lat');?>" maxlength="12" type="text" class="form-control" name="lat" required>                                        
                                </div>
                            </div>      
                         
                            <div class="row">
                                <div  class="input-group col-md-6 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Fecha Contagio:</span>
                                    </div>
                                    <input id="fecha_contagio"  value="<?php echo set_value('fecha_contagio');?>" type="date" class="form-control" name="fecha_contagio" required>                                        
                                </div>
                                <div  class="input-group col-md-6 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Fecha Nacimiento:</span>
                                    </div>
                                    <input id="fecha_nacimiento" value="<?php echo set_value('fecha_nacimiento');?>" type="date" class="form-control" name="fecha_nacimiento" required>                                        
                                </div>

                            
                            </div>
                            <div class="row">
                                <div  class="input-group col-md-12 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Comentario:</span>
                                    </div>
                                    <textarea required style="resize: none;"  value="<?php echo set_value('comentario');?>" id="comentario" type="text" class="form-control" name="comentario"></textarea>                                       
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
                            <th role="columnheader">Editar | Borrar</th>
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
                                <a class="btn btn-warning" href="<?php echo base_url().'index.php/covid/editar/'.$caso['id']?>">Editar</a>
                                <a class="btn btn-danger" href="<?php echo base_url().'index.php/covid/eliminar/'.$caso['id']?>">Eliminar</a>
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