<?php
include_once "Producto.php";

class productoApi extends producto
{
    //CargoUno
    public function CargarUno($request, $response, $args)
    {
        $ArrayDeParametros = $request->getParsedBody();
        //$objDelaRespuesta= new stdclass();

       
        $descripcion= strtolower($ArrayDeParametros['descripcion']);
        $tipo= $ArrayDeParametros['tipo'];
        $precio= strtolower($ArrayDeParametros['precio']);
        $fechaDeVencimiento=$ArrayDeParametros['fechaDeVencimiento'];
        $rutaDeFoto="img/default.jpg";
        //$perfil= $ArrayDeParametros['perfil'];
        //$alta= date("Y-m-d H:i:s");

        $productoAux = new producto();

        $productoAux->descripcion = $descripcion;
        $productoAux->tipo = $tipo;
        $productoAux->precio = $precio;
        $productoAux->fechaDeVencimiento = $fechaDeVencimiento;
        $productoAux->rutaDeFoto = $rutaDeFoto;
        

        // if (foto::validarNombre($productoAux->nombre) == false) {
        //     throw new Exception('Error: Nombre solo puede contener letas y numeros');
        // }


        //$foto = $_FILES['foto'];
        $e = producto::TraerDescripcion($productoAux->descripcion);

            
        if ($e == null){
            $productoAux->InsertarproductoParametros();
            $response->getBody()->write("Se dio de alta al producto ".$descripcion." precio ".$precio." tipo ".$tipo." fecha de vencimiento ".$fechaDeVencimiento,202);
            //$response->withJson("Se dio de alta al producto: ".$nombre);

        }else {
            return $response->getBody()->write("El producto ya existe ",404);
        }

        return $response;
        
    }


    

    //TraigoTodos
    public function traerTodos($request, $response, $args) 
	{
            $todosproductos = producto::TraerTodoLosProductos();
		    return $response->withJson($todosproductos, 200);  
            
    

    }


    public function traerUno($request, $response, $args) 
	{
        $ArrayDeParametros = $request->getParsedBody();
        $descripcion = $args['descripcion'];
        $empBuscado = producto::TraerDescripcion($descripcion);
        return $response->withJson($empBuscado, 200); 
        
    }

    public function BorrarUno($request, $response, $args) 
    {
            $ArrayDeParametros = $request->getParsedBody();
            $id=$args['id'];

            $empBorrar = producto::TraerProductoID($id);
           
            if ($empBorrar == false) {
                return $response->withJson('Error al borrar: No existe producto con id: '.$id,404);
            }
            $id = $empBorrar->id;
            $nombreViejo =$empBorrar->descripcion;
            if(producto::BorrarProductoID($id)>0){       
                return $response->getBody()->write('Se borro con exito a '.$nombreViejo,202);
            }else{
                return $response->getBody()->write('Error al Borrar el producto',404);
            }
    }



    public function modificarUno($request, $response, $args) 
    {
            $ArrayDeParametros = $request->getParsedBody();
            $descripcion= $ArrayDeParametros['descripcion'];
            $objDelaRespuesta= new stdclass();
            $empModificar = producto::TraerProductoDescripcion($descripcion);
            
            
            if ($empModificar != false) {
                 $id = $empModificar->id;
                $objDelaRespuesta->msj = "se modifico producto con descripcion ".$descripcion;
                
                
                if (isset($ArrayDeParametros['tipo'])) {
                    $tipo = password_hash($ArrayDeParametros['tipo'],PASSWORD_BCRYPT);
                    $empModificar->tipo = $tipo;
                    if ($empModificar->tipo== "" || !isset($empModificar->tipo)) {
                        return $response->withJson('Error: tipo no puede esta vacio',404);
                    }
                    $empModificar->ModificarProductoID($id);
                    $objDelaRespuesta->tipo =$tipo;
                }
                if (isset($ArrayDeParametros['precio'])) {
                    $precio = strtolower($ArrayDeParametros['precio']);
                    $empModificar->precio = $precio;
                    if ($empModificar->precio== "" || !isset($empModificar->precio)) {
                        return $response->withJson('Error: precio no puede esta vacio',404);
                    }
                    $empModificar->ModificarProductoID($id);
                    $objDelaRespuesta->precio =$precio;
                }
                 if (isset($ArrayDeParametros['fechaDeVencimiento'])) {
                    $fechaDeVencimiento = strtolower($ArrayDeParametros['fechaDeVencimiento']);
                    $empModificar->fechaDeVencimiento = $fechaDeVencimiento;
                    if ($empModificar->fechaDeVencimiento== "" || !isset($empModificar->fechaDeVencimiento)) {
                        return $response->withJson('Error: fechaDeVencimiento no puede esta vacio',404);
                    }
                    $empModificar->ModificarProductoID($id);
                    $objDelaRespuesta->fechaDeVencimiento =$fechaDeVencimiento;
                }
            }
            else {
                return $response->withJson('Error no existe el descripcion del producto',404);
            }
            return $response->withJson($objDelaRespuesta, 202);
            
    }



}
