<?php

use App\Feature;
use App\Project;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // ====
        // DPYX
        // ====

        $project = Project::create([
            'name' => 'Sistema de autoevaluación de repositorios de información académica y científica',
            'description' =>
            'dPyx es un sistema que ha sido instalado en alrededor de 5 instituciones, una de ellas a nivel nacional en Perú
            (CONCYTEC) que cuenta con la inscripción de más de 80 repositorios.
            
            Debido a la seguridad que ofrece, la interfaz gráfica amigable y la usabilidad que presenta, ha sido requerido por
            las instituciones para la autoevaluación de sus repositorios institucionales. Esta herramienta permite ofrecer un 
            panorama más amplio de las áreas de oportunidad de los sitemas de dichas instituciones.',
            'path_cover_page' => 'img/cover_pages/portada_dpyx.jpg',
            'path_video' => 'videos/video_demostrativo_dpyx.mp4',
            'link' => 'https://demo.dpyx.net/',
            'date' => 'Junio del 2021',
        ]);

        $project->features()->attach([
            Feature::where('description', 'Gráficas (de reportes)')->first()->id,
            Feature::where('description', 'Importacion / Exportacion Excel')->first()->id,
            Feature::where('description', 'Envío de correo')->first()->id,
            Feature::where('description', 'Seguridad con perfiles de acceso')->first()->id,
            Feature::where('description', 'Almacenamiento en tiempo real')->first()->id,
        ]);

        // =============
        // MATERIAL UC
        // =============

        $project = Project::create([
            'name' => 'Material UC',
            'description' => 'Participé en la implementación un sistema web que se 
                encarga de controlar los préstamos de dispositivos y herramientas 
                de la División de Ingenierías Civíl y Geomática, mediante escaneo 
                de QR para usuarios y materiales. Los lenguajes y frameworks utilizados 
                fueron PHP, MySQL, javascript, CSS, HTML y bootstrap.

                Las tareas que realicé en este proyecto fueron el desarrollo del frontend 
                del sistema web completo, el desarrollo de las funciones CRUD para la 
                administración de usuarios y materiales, la implementación del sistema de 
                login mediante escanéo de código QR, así como la lógica de programación para el 
                control de préstamos de los materiales.',
            'path_cover_page' => 'img/cover_pages/portada_material_uc.png',
            'path_video' => 'videos/video_demostrativo_materialuc.mp4',
            'link' => 'http://132.248.139.119/~materialuc/',
            'date' => 'febrero del 2019'
        ]);

        $project->features()->attach([
            Feature::where('description', 'Escanéo QR')->first()->id,
        ]);
        

        // ============
        // SOURCE LINK
        // ============

        $project = Project::create([
            'name' => 'Sistema generador de estadisticas de DSpace',
            'description' =>
            'Source Link es una herramienta que permite obtener información en tiempo real de los
            repositorios DSpace a partir de una API desarrollada con python (usando el framework FLASK).
            Una vez que obtiene información de valor como vistas y descargas, esta es agrupada por país, item,
            comunidad y autor, para identificar cuales son las publicaciones más destacadas que ha tenido el repositorio
            institucional en cuestión.',
            'path_cover_page' => 'img/cover_pages/portada_source_link.jpg',
            'path_video' => 'videos/video_demostrativo_source_link.mp4',
            'link' => 'http://34.235.253.220/',
            'date' => 'Mayo del 2021',
        ]);

        $project->features()->attach([
            Feature::where('description', 'Gráficas (de reportes)')->first()->id,
            Feature::where('description', 'Importacion / Exportacion Excel')->first()->id,
            Feature::where('description', 'Seguridad con perfiles de acceso')->first()->id,
            Feature::where('description', 'Almacenamiento en tiempo real')->first()->id,
        ]);

        // =============
        // ARBYS
        // =============

        $project = Project::create([
            'name' => 'ERP para Arbys',
            'description' =>
            'Arbys es una empresa dedicada a la venta de motos y autos. Ellos requerían un 
                sistema que ERP (Entreprise Resource Planning) y CRM (Customer Relationship Management).
                
                En este proyecto implementé un módulo que permitiera subir archivos excel periódicamente 
                sobre los productos que necesitan, y tener una lista de clientes, quienes pueden cotizar y 
                comprar dichos productos, los cuales, se envían en formato PDF personalizado a sus correos.
                
                Todo esto es realizado por los empleados que pueden encontrarse en diferentes sucursales.',
            // 'Participé en el desarrollo de un sistema ERP (Entrepise Resource Planning) y 
            // CRM (Cutomer Relationship Management) para la administración de Arbys.',
            'path_cover_page' => 'img/cover_pages/portada_arbys.jpg',
            'path_video' => 'videos/video_demostrativo_arbys.mp4',
            'link' => 'http://siaa.planarbys.com',
            'date' => 'enero del 2020',
        ]);

        $project->features()->attach([
            Feature::where('description', 'Importacion / Exportacion Excel')->first()->id,
            Feature::where('description', 'Envío de correo')->first()->id,
            Feature::where('description', 'Seguridad con perfiles de acceso')->first()->id,
            Feature::where('description', 'Creación de PDF')->first()->id,
        ]);

        // ============
        // TO-DO (MERN)
        // ============

        $project = Project::create([
            'name' => 'To-Do MERN',
            'description' =>
            'Aplicación MERN FULL Stack (MongoDB, Express, React.js y NodeJs). 
                Se encarga de realizar la administración de tareas pendientes que 
                tenga el usuario mediante operaciones CRUD (create, read, update y delete) 
                a la base de datos haciendo uso de peticiones HTTP al servidor.',
            'path_cover_page' => 'img/cover_pages/portada_todo_app_mern_stack.jpg',
            'path_video' => 'videos/video_demostrativo_mern_stack_to_do_app.mp4',
            'date' => 'junio del 2019',
        ]);

        $project->features()->attach([
            Feature::where('description', 'Notificaciones')->first()->id,
            Feature::where('description', 'Almacenamiento en tiempo real')->first()->id,
        ]);

        // ====================
        // REFACCIONARIA ZAPATA
        // ====================

        $project = Project::create([
            'name' => 'E-commerce para Refaccionaria Zapata Camiones Aeropuerto',
            'description' =>
            'Zapata Camiones S.A. de C.V. es una empresa dedicada a la venta de autopartes. Requerían 
                un sistema E-commerce que permitiera vender en la web sus productos. Las tareas a 
                mi cargo fue el diseño e implementación del proceso de pago, desde la selección de los productos, 
                hasta la realización de la compra. 
                
                Así mismo, implementé el sistema administrativo que permite tener el control de los productos,
                las promociones, el seguimiento de las compras, envío de correos con el CFDI, reportes diarios de 
                ventas, y la creación de diferentes perfiles para el control de acceso al sistema.',
            'path_cover_page' => 'img/cover_pages/portada_refaccionaria_zapata_camiones.jpg',
            'path_video' => 'videos/video_demostrativo_zapata_camiones.mp4',
            'link' => 'https://www.refaccionariazapata.com/',
            'date' => 'Julio del 2020',
        ]);

        // =========
        // TO-DO APP
        // =========

        $project = Project::create([
            'name' => 'To-do App',
            'description' =>
            'Implementé un administrador de tareas que consite en dos pestañas, la primera 
            se encarga de mostrar las tareas pendientes y la segunda pestaña las tareas terminadas. 
                Estas pueden ser editadas o incluso, eliminadas. Las tecnologías que utilicé fueron 
                Ionic 3 y Angular 7.',
            'path_cover_page' => 'img/cover_pages/portada_to_do_app.png',
            'path_video' => 'videos/video_demostrativo_to_do_app.mp4',
            'date' => 'mayo del 2019'
        ]);

        $project->features()->attach([
            Feature::where('description', 'Animación digital')->first()->id,
        ]);

        

        $project->features()->attach([
            Feature::where('description', 'Pagos electrónicos')->first()->id,
            Feature::where('description', 'Importacion / Exportacion Excel')->first()->id,
            Feature::where('description', 'Envío de correo')->first()->id,
            Feature::where('description', 'Gráficas (de reportes)')->first()->id,
            Feature::where('description', 'Seguridad con perfiles de acceso')->first()->id,
        ]);

        // ===========
        // MATERIAL UC
        // ===========

        $project = Project::create([
            'name' => 'Juego de aviones',
            'description' =>
            'Es un juego sencillo que consite en disparar a naves extraterrestres 
                para evitar que estas puedan invadir el planeta tierra. Las tecnologías 
                empleadas para este proyecto fueron HTML, CSS, Javascript, así como jquery.',
            'path_cover_page' => 'img/cover_pages/portada_juego_aviones.png',
            'path_video' => 'videos/video_demostrativo_juego_aviones.mp4',
            'date' => 'diciembre 2018'
        ]);

        $project->features()->attach([
            Feature::where('description', 'Animación digital')->first()->id,
        ]);

        
    }
}
