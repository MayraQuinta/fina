<?php

class repositorio_juridico {

    
    public static function insertar_persona_juridica($conexion, $juridica) {
        $resultado = FALSE;
        if (isset($conexion)) {
            try {
               //$juridica = new persona_juridica();
                $nombre = $juridica->getId_nombre();
                $numero = $juridica->getNumero();
                $dui = $juridica->getDui();
                $nit = $juridica->getNit();

                $sql = "INSERT INTO persona_juridica (nombre, numero,dui,nit)"
                        . " VALUES ( '" . $nombre . "' , '" . $numero . "' , '".$dui."' ,'".$nit."');";

                $sentencia = $conexion->prepare($sql);

                $resultado = $sentencia->execute();
                
            } catch (PDOException $ex) {
                echo 'persona no guardado';
                print 'ERROR: ' . $ex->getMessage();
            }
        } else {
            echo 'no hay conexion';
        }
    
        return $resultado;
        }
    
    public static function ultima_persona_insertada($conexion) {
        $lista= array();
        if (isset($conexion)) {
            try {
                $sql = "select * from persona_juridica order by id_persona_juridica desc limit 1";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $persona = new persona_juridica();
                        $persona->setId_persona_juridica($fila['id_persona_juridica']);
                   $lista[] = $persona;
                    }
                }
            } catch (PDOException $exc) {
                print('ERROR' . $exc->getMessage());
            }
        }

        return $lista;
    }
    
    public static function obtener_persona_juridca($conexion, $codigo) {
        $juridica = new persona_juridica;
        //echo 'esta en administradodr actual<br>';
        if (isset($conexion)) {
            //echo 'hay conexion<br>';
            try {
                $sql = "select * from persona_juridica where (id_persona_juridica = '$codigo')";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $juridica = new persona_juridica();
                        $juridica->setId_persona_juridica($fila['id_persona_juridica']);
                        $juridica->setId_nombre($fila['nombre']);
                        $juridica->setNumero($fila['numero']);
                        $juridica->setDui($fila['dui']);
                        $juridica->setNit($fila['nit']);
                    }
                }
            } catch (PDOException $exc) {
                print('ERROR' . $exc->getMessage());
            }
        } else {
            //echo 'no hay conexion<br>';
        }
        return $juridica;
    }
    
    public static function lista_persona_juridca($conexion) {
        $lista_juridica =  Array();
        //echo 'esta en administradodr actual<br>';
        if (isset($conexion)) {
            //echo 'hay conexion<br>';
            try {
                $sql = "select * from persona_juridica as pj, expediente_juridico as ej ,prestamo as p where(pj.id_persona_juridica = ej.id_persona_juridica and ej.id_prestamo = p.id_prestamo )";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
 
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $juridica = new persona_juridica();
                        $juridica->setId_persona_juridica($fila['id_persona_juridica']);
                        $juridica->setId_nombre($fila['nombre']);
                        $juridica->setNumero($fila['numero']);
                        $juridica->setDui($fila['dui']);
                        $juridica->setNit($fila['nit']);
                        //$juridica->setPrestamo($fila['id_prestamo']);
                       
                        
                        $lista_juridica[] = $juridica;
                        
                    }
                }
            } catch (PDOException $exc) {
                print('ERROR' . $exc->getMessage());
            }
        } else {
            //echo 'no hay conexion<br>';
        }
        return $lista_juridica;
    }
    public static function lista_persona_abono_juridica($conexion) {
        $resultado = "";
        if (isset($conexion)) {
            try {
                $sql = "SELECT
                pj.id_persona_juridica as id,
                pj.nombre as nombre,
                pj.dui as dui,
                pj.nit as nit,
                p.prestamo_original as prestamo,
                p.saldo_actual as saldo_actual,
                p.tasa_interes as tasa,
                p.tiempo as meses
                FROM
                persona_juridica as pj,prestamo as p,expediente_juridico as ej
                WHERE
                ej.id_prestamo = p.id_prestamo AND ej.id_persona_juridica = pj.id_persona_juridica";
                $resultado = $conexion->query($sql);
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $resultado;
    }
    
     public static function lista_persona_juridcaAbono($conexion) {
        $lista_juridica =  Array();
        //echo 'esta en administradodr actual<br>';
        if (isset($conexion)) {
            //echo 'hay conexion<br>';
            try {
                $sql = "select * from persona_juridica WHERE
persona_juridica.categoria = 0";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
 
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $juridica = new persona_juridica();
                        $juridica->setId_persona_juridica($fila['id_persona_juridica']);
                        $juridica->setId_nombre($fila['nombre']);
                        $juridica->setNumero($fila['numero']);
                        $juridica->setDui($fila['dui']);
                        $juridica->setDui($fila['nit']);
                        
                        $lista_juridica[] = $juridica;
                        
                    }
                }
            } catch (PDOException $exc) {
                print('ERROR' . $exc->getMessage());
            }
        } else {
            //echo 'no hay conexion<br>';
        }
        return $lista_juridica;
    }

}

?>
