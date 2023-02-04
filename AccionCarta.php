<?php
date_default_timezone_set("America/Lima");
// Iniciamos la clase de la carta
include 'La-carta.php';
$cart = new Cart;

// include database configuration file
include 'Configuracion.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // get product details
        $query = $db->query("SELECT * FROM productos WHERE cantidad > '0' AND id = ".$productID );
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'precio_rebajado' => $row['precio_rebajado'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'index.php':'index.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: VerCarta.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0   ){

        if (isset($_SESSION['USUADMIN'])){
   
            $USUADMIN= $_SESSION['USUADMIN'];
            echo"$USUADMIN";
            

            include("config/conex.php");

            $query = mysqli_query($conexion, "SELECT `usuarios`.`usuario`,
             `tmbtv_cli`.`usuarioo`, `usuarios`.`clave`, `usuarios`.`rol`, 
             `tmbtv_cli`.`ced_comp`
            FROM `usuarios`
                , `tmbtv_cli`
               WHERE
               `usuarios`.`usuario`= `tmbtv_cli`.`usuarioo` AND
               `usuarios`.`usuario`= '$USUADMIN'");
       
           $result= mysqli_num_rows($query);

           if($result == 1)
           {
               $data = mysqli_fetch_array($query);
               $ced_comp = $data['ced_comp'];
           }

        
        // insert order details into database
        $insertOrder = $db->query("INSERT INTO 
        orden
         (customer_id, total_price, status)
          VALUES
           ('$ced_comp', '".$cart->total()."', '1')");
        
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO orden_articulos (order_id, product_id, quantity)
                 VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
            

            $query_upd = mysqli_query($conexion,"CALL resta_productos('".$item['qty']."','".$item['id']."')");
            $result= mysqli_num_rows($query_upd);
          
               if($result > 0){
                                            
            }
        }
        

            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);
            
            if($insertOrderItems){
                $cart->destroy();
                header("Location: OrdenExito.php?id=$orderID");
            }else{
                header("Location: Pagos.php");
            }
        }else{
            header("Location: Pagos.php");
        }
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}}else{
    header("Location: index.php");
}
