<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class APIController extends ResourceController
{
    protected $modelName = 'App\Models\UsuarioModelo';
    protected $format    = 'json';

    public function index(){
        return $this->respond($this->model->findAll());
    }

    public function registrar(){

        // se reciben datos cliente
        $nombre=$this->request->getPost("nombre");
        $correo=$this->request->getPost("correo");
        $password=$this->request->getPost("password");
        

        //se crea arreglo con los datos recibidos
            $arregloDatos=array(

                "nombre"=>$nombre,
                "correo"=>$correo,
                "password"=>$password

                );

          //se crea la operación en la base de datos para grabar la información
            $id=$this->model->insert($arregloDatos);

            //configuro la respuesta
              $mensaje=array(
                  "msj"=>"exito agregando el usuario",
                  "estado"=>true
              );

              return $this->respond(json_encode($mensaje));


             }



        }