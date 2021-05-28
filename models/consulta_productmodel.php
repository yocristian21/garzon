<?php

include_once 'models/producto.php';

class Consulta_ProductModel extends Model{

    public function __construct(){
        parent::__construct();
        //echo "<p>Nuevo controlador consulta_productmodel.php</p>";
    }

    public function get_productos($cat_param){
        $items = [];

        try{

            if($cat_param == ''){
                $query = $this->db->connect()->query("SELECT*FROM producto");
            }else{
                $query = $this->db->connect()->query("SELECT*FROM producto WHERE categoria='$cat_param'");
            }
            
            while($row = $query->fetch()){
                $item = new Producto();
                $item->id_producto = $row['id_producto'];
                $item->nombre    = $row['nombre'];
                $item->descripcion  = $row['descripcion'];
                $item->precio = $row['precio'];
                $item->foto    = $row['foto'];
                $item->stock  = $row['stock'];
                $item->categoria  = $row['categoria'];

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
            
        }
    }

    public function get_producto($id_param){
        $items = [];

        try{

            $query = $this->db->connect()->query("SELECT * FROM producto WHERE id_producto='$id_param'");

            while($row = $query->fetch()){
                $item = new Producto();
                $item->id_producto = $row['id_producto'];
                $item->nombre = $row['nombre'];
                $item->descripcion  = $row['descripcion'];
                $item->precio = $row['precio'];
                $item->foto    = $row['foto'];
                $item->stock  = $row['stock'];
                $item->categoria  = $row['categoria'];

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
            
        } 
    }
                        //  3
    public function update(){
        // $query = $this->db->connect()->query("SELECT * FROM producto WHERE id_producto='$id_param'");

        $query = $this->db->connect()->prepare("UPDATE producto SET id_producto = :id_producto, nombre = :nombre, descripcion = :descripcion, precio = :precio, foto = :foto, stock = :stock, categoria = :categoria  WHERE id_producto");
        
                 $query->execute([
                    'id_producto'   => $this->id_producto,
                    'nombre'        => $this->nombre,
                    'descripcion'   => $this->descripcion,
                    'precio'        => $this->precio,
                    'foto'          => $this->foto,
                    'stock'         => $this->stock,
                    'categoria'     => $this->categoria
                 ]);
    
    }
//                       vector que se va a cargar con las modificaciones
    // public function update($item){
    //     $query = $this->db->connect()->prepare("UPDATE producto SET nombre = :nombre, descripcion = :descripcion, precio = :precio, foto = :foto, stock = :stock, categoria = :categoria  WHERE id_producto = :id_producto");
    //     try{
    //         $query->execute([
    //             'id_producto' => $item['id_producto'],
    //             'nombre'=> $item['nombre'],
    //             'descripcion'=> $item['descripcion'],
    //             'precio'=> $item['precio'],
    //             'foto'=> $item['foto'],
    //             'stock'=> $item['foto'],
    //             'categoria'=> $item['categoria']
    //         ]);
    //         return true;
    //     }catch(PDOException $e){
    //         return false;
    //     }
    // }




}
?>