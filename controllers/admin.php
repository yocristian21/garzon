<?php

class Admin extends Controller{

    function __construct(){
        parent::__construct();
        //echo "<p>Nuevo controlador Admin</p>";
    }

    function render(){
        $this->view->render('admin/index');
    }

    function saludo(){
        echo "<p>Ejecutaste el método Saludo desde Admin</p>";
    }

    function adm_product(){
        $this->loadModel('consulta_product');
        $productos = $this->model->get_productos('');
        $this->view->productos = $productos;
        $this->view->render('admin/adm_product');
    }
    //recibe un ID y consulta con el mismo  en la base de datos y retorna un vector 
    function verProducto($param = null){
        $idProducto = $param[0];
        $producto = $this->model->getById($idProducto);

        session_start();
        $_SESSION['id_verProducto'] = $producto->id_producto;
        $this->view->producto = $producto;
        $this->view->mensaje = "";
        $this->view->render('admin/login/adm_product'); //ver!!!!!!!!!
    }
    
    function detalle_producto($param){
        $this->loadModel('consulta_product');//ver!!!!
        $producto = $this->model->get_producto($param[0]);
        $this->view->producto = $producto;
        $this->view->render('admin/login/editar');
    }

    function actualizar_producto(){
        // $data = [];
        $Producto = $_POST['ProductoArray'];//lo que recibe del .ajax el array con los datos del producto
        $this->loadModel('consulta_product');
        $this->model->update(['id_producto' => $Producto[0],//
                              'nombre'      => $Producto[1],
                              'descripcion' => $Producto[2],
                              'precio'      => $Producto[3], 
                              'foto'        => $Producto[4], 
                              'stock'       => $Producto[5], 
                              'categoria'   => $Producto[6]
        ]);
        //renderizar admin/login/adm_product
    }
    function eliminar_producto($param){
        echo "<p>Ejecutaste el método eliminar_producto</p>";
        $this->loadModel('consulta_product');//ver!!!!
        $this->model->delete_producto($param[0]);
       // $this->view->producto = $producto;
      //  $this->view->render('admin/login/eliminar');
    }


}

?>