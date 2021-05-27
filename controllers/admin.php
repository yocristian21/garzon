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


}

?>