<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
	table, td, th {border: 1px solid black;}
    table {border-collapse: collapse;}
    </style>
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/style.css">
</head>
<body>
    <a href="<?php echo constant('URL'); ?>admin"><input type="button" value="Volver"/></a>
    <br>
    <br>
    <button onclick="fun_agre_producto()">Agregar Producto</button>
    <br>
    <br>
    <div>
        <table id='tabla_principal' style="border: 1px solid black;">
            <thead>
                <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>PRECIO</th>
                <th>FOTO</th>                
                <th>STOCK</th>
                <th>CATEGORIA</th>
                <th></th>
                <th></th>
                </tr>
            </thead>            
            <tbody id='productos'>
                <?php
                include_once 'models/producto.php';
                foreach($this->productos as $row){
                    $producto = new Producto();
                    $producto = $row; 
                    echo "<tr>
                        <td>$producto->id_producto</td>
                        <td>$producto->nombre</td>
                        <td>$producto->descripcion</td>                        
                        <td>$producto->precio</td>
                        <td>$producto->foto</td>
                        <td>$producto->stock</td>
                        <td>$producto->categoria</td>
                        
                        <td><input type='button' onclick='fun_detalle_producto($producto->id_producto)' value='Editar'/></td>
                       
                       
                       
                        <td><input type='button' value='Eliminar'/></td>
                        </tr>";
                } 
                
                
                ?>
            </tbody>
        </table>

    </div>

    <div id='agre_producto' class='div_emergente' >
        <div id='datos' class='ventana_emergente' >
            <button  type='submit' onclick='cancelar_agre()' class='btn_x' >X</button>

           
                    
            <div  class='form-group' align='center'> -->
                <h2>Agregar Producto</h2>
                <br>
                <a>Nombre</a>
                <input type="text" class="input" id="nombre_agre">
                <br>
                <br>
                <a>Descripcion</a>
                <input type="text" class="input" id="descripcion_agre">
                <br> 
                <br>
                <a>Precio</a>
                <input type="text" class="input" id="precio_agre">
                <br> 
                <br>
                <a>Foto</a>
                <input type="text" class="input" id="foto_agre">
                <br>
                <br> 
                <a>Stock</a>
                <input type="text" class="input" id="stock_agre">
                <br>
                <br> 
                <a>Categoria</a>
                <input type="text" class="input" id="categoria_agre">
                <br>
                <br>

            </div>
        </div>
    </div> 

    <div id='modif_producto' class='div_emergente' >
        <div id='datos' class='ventana_emergente' >
            <button  type='submit' onclick='cancelar_modif()' class='btn_x' >X</button>
           

            <div id='modificar_prod' class='form-group' align='center'>
               
            <div class='form-group' align='center'>
<!-- guardar en vector prodocto->nombre para despues enviarlo a la BD -->
                <h2>Editar Producto</h2>
                <br>
                <a>Nombre</a>
                <input type="text" class="input" id="nombre_edit" value="Juan">
                <br>
                <br>
                <a>Descripcion</a>
                <input type="text" class="input" id="descripcion_edit" value="">
                <br> 
                <br>
                <a>Precio</a>          
                <input type="text" class="input" id="precio_edit" value="">
                <br> 
                <br>
                <a>Foto</a>
                <input type="text" class="input" id="foto_edit" value="">
                <br>
                <br> 
                <a>Stock</a>
                <input type="text" class="input" id="stock_edit" value="">
                <br>
                <br> 
                <a>Categoria</a>
                <input type="text" class="input" id="categoria_edit" value="">
                <br>
                <br>  
                <!--ver: implementar metodo despues de onclick, que guarde en un vector la consulta de la BD -->
                <button  type='submit' name='registro' onclick= 'fun_modif_producto()' class='btn_aceptar' >Aceptar</button>                                    
        </div>


            </div>
        </div>
    </div>
    <div id='div_aux'>
    </div>
    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
</body>
</html>