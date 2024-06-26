<?php
session_start();
require_once 'config/parameters.php';
require_once 'config/db.php';
require_once 'autoload.php';
require_once 'helpers/registro/htmlRegistro.php';
require_once 'helpers/registro/validaciones.php';
require_once 'helpers/configuracion/htmlConfiguracion.php';
require_once 'helpers/configuracion/validacionesConfig.php';
require_once 'helpers/historial/estadisticas.php';
require_once 'helpers/configuracion/estadisticasConfig.php';
require_once 'helpers/historial/htmlHistorial.php';

//Controlador Frontal
if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'] . 'Controller';  
  }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){   
    $nombre_controlador = CONTROLLER_DEFAULT;
  }else{
     $error = new ErrorController();
     $error->index();
     exit();
  } 
  
  if(class_exists($nombre_controlador)){
     $controlador = new $nombre_controlador; 
        if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];           
        $controlador->$action();     
           }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
           $ACTION_DEFAULT = ACTION_DEFAULT;
           $controlador->$ACTION_DEFAULT();
                 }else{
                    $error = new ErrorController();
                    $error->index();
                 }                      
  }else{
     $error = new ErrorController();
     $error->index();
  }



?>