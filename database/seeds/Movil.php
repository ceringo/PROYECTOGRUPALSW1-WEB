<?php

use Illuminate\Database\Seeder;

use App\Login;
use App\Empleador;
use App\Empleado;
use App\UsuarioMovil;
use App\Ubicacion;
use App\Servicio;
use App\Especialidad;
use App\Area;



Class Movil extends seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(){

        //3
        $areas=['COMPUTACION','HOGAR','GASTRONOMIA'];

        //6
        $especialidadesComutacion = ['Ingenieros(as) en Software de Apps Móviles','	Analista Sénior de Proyectos Tecnológicos/Soporte y Mantenimiento de Aplicaciones','Desarrollador(a) Web','Reparador Computadoras y Mantenimiento','Instalador de aplicaciones en computador y app movil','Programador en laravel'];
        $especialidadesHogar = ['Pintor','Alabnil','plomero','Ama de Casa','Mayor Domo','Chofer'];
        $especialidadesGastronomia = ['Chef','Mesero','Lava Platos','Preparador de Bocaditos para eventos','Cociner','Ayudante de Cocina'];
        

        for($i=1;$i<=3;$i++){

            $area = new Area;
            $area->nombre = $areas[$i];
            $area->descripcion =  $areas[$i]+" - descripcion "+ $i;
            $area->save();

            for($j=1;$j<=6;$j++){


                if($i=="1"){

                    $especialidad = new Especialidad;
                    $especialidad->nombre = $especialidadesComutacion[$j];
                    $especialidad->descripcion =  $especialidadesComutacion[$j]+" - descripcion "+ $j;
                    $especialidad->id_area = $i;
                    $especialidad->save();
                }


                if($i=="2"){

                    $especialidad = new Especialidad;
                    $especialidad->nombre = $especialidadesHogar[$j];
                    $especialidad->descripcion =  $especialidadesHogar[$j]+" - descripcion "+ $j;
                    $especialidad->id_area = $i;
                    $especialidad->save();
                }


                if($i=="3"){

                    $especialidad = new Especialidad;
                    $especialidad->nombre = $especialidadesGastronomia[$j];
                    $especialidad->descripcion =  $especialidadesGastronomia[$j]+" - descripcion "+ $j;
                    $especialidad->id_area = $i;
                    $especialidad->save();
                }

            }

        }



        $bandera = true;
        

        for($i=1;$i<=10;$i++){

             $login= new Login;
             $login->email = "vera"+$i+"@gmail.com";
             $login->pasword = "123123";
             $login->save();


        $usuariomovil = new UsuarioMovil;
        $usuariomovil->foto = "https://res.cloudinary.com/dwq72cog2/image/upload/v1574952061/b4fy1ghza8ckqmsdegfs.jpg";
        $usuariomovil->nombre = "brayan"+$i;
        $usuariomovil->apellidos = "vera"+$i;
        $usuariomovil->telefono = "766546"+$i;
        $usuariomovil->sexo = "masculino";
        $usuariomovil->fecha_nacimiento = date("Y-m-d");
        $usuariomovil->fecha_registro = date("Y-m-d");
        $usuariomovil->estado = "1";
        $usuariomovil->id_login = $i;
        $usuariomovil->save();


        //Crea empleado y empleador
        $empleador = new Empleador;
        $empleador->calificacion_empleador=0;
        $empleador->id_usuario_movil=$i;
        $empleador->save();
          
        $empleado = new Empleado;
        $empleado->calificacion_empleado=0;
        $empleado->estado_respaldo="0";
        $empleado->estado="0";
        $empleado->id_usuario_movil=$i;
        $empleado->save();

        $ubicacion = new Ubicacion;
        $ubicacion->latitud="-17.8146";
        $ubicacion->longitud="-63.1561";
        $ubicacion->id_usuario_movil=$i;
        $ubicacion->save();

        if($i <=5){


            for($j=1;$j<=6;$j++){


                if($bandera == true){


                    $servicio = new Servicio();
                    $servicio->descripcion="descriocion servicio" + $j;
                    $servicio->precio_estandar=rnd(1000);
                    $servicio->estado_servicio="0";
                    $servicio->estado="0";
                    $servicio->id_empleado=$i;
                    $servicio->id_especialidad=rnd(1,6);
                    $servicio->save();
                    //pro

                    if($j== "3"){
                        $bandera = false;
                    }

                }else{

                    $servicio = new Servicio();
                    $servicio->descripcion="descriocion servicio" + $j;
                    $servicio->precio_estandar=rnd(1000);
                    $servicio->estado_servicio="0";
                    $servicio->estado="0";
                    $servicio->id_empleado=$i;
                    $servicio->id_especialidad=rnd(7,12);
                    $servicio->save();

                    
                }


            }

        }else{


            for($j=1;$j<=6;$j++){


                if($bandera == true){


                    $servicio = new Servicio();
                    $servicio->descripcion="descriocion servicio" + $j;
                    $servicio->precio_estandar=rnd(1000);
                    $servicio->estado_servicio="0";
                    $servicio->estado="0";
                    $servicio->id_empleado=$i;
                    $servicio->id_especialidad=rnd(7,12);
                    $servicio->save();
                    //pro

                    if($j== "3"){
                        $bandera = false;
                    }

                }else{

                    $servicio = new Servicio();
                    $servicio->descripcion="descriocion servicio" + $j;
                    $servicio->precio_estandar=rnd(1000);
                    $servicio->estado_servicio="0";
                    $servicio->estado="0";
                    $servicio->id_empleado=$i;
                    $servicio->id_especialidad=rnd(13,18);
                    $servicio->save();

                    
                }


            }
        }
 


        }


    }

}