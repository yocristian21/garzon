<?php
include_once 'models/producto.php'; 

//foreach($this->producto as $row){
    $productos = new Producto();
    $productos = $this->producto;
   
?>

 <div class='form-group' align='center'>
<!-- guardar en vector prodocto->nombre para despues enviarlo a la BD -->
                <h2>Editar Producto</h2>
                <br>
                <a>Nombre</a>
                <input type="text" class="input" id="nombre" value="<?php echo $productos[0]->nombre;?>">
                <br>
                <br>
                <a>Descripcion</a>
                <input type="text" class="input" id="descripcion" value="<?php echo $productos[0]->descripcion;?>">
                <br> 
                <br>
                <a>Precio</a>
                <input type="text" class="input" id="precio"value="<?php echo $productos[0]->precio;?>">
                <br> 
                <br>
                <a>Foto</a>
                <input type="text" class="input" id="foto"value="<?php echo $productos[0]->foto;?>">
                <br>
                <br> 
                <a>Stock</a>
                <input type="text" class="input" id="stock"value="<?php echo $productos[0]->stock;?>">
                <br>
                <br> 
                <a>Categoria</a>
                <input type="text" class="input" id="categoria"value="<?php echo $productos[0]->categoria;?>">
                <br>
                <br>  
                <!--ver: implementar metodo despues de onclick, que guarde en un vector la consulta de la BD -->
                <button  type='submit' name='registro' onclick= 'fun_modif_producto()' class='btn_aceptar' >Aceptar</button>
                                                       
        </div>