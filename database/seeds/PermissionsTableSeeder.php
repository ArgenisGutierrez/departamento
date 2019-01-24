<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create([
          'name'=>'Ver listado de usuarios',
          'slug'=>'usuario.index',
          'description'=>'Ver la lista de todos los usuarios del sistema',
        ]);
        Permission::create([
          'name'=>'Editar usuarios',
          'slug'=>'usuario.edit',
          'description'=>'Editar la informacion de los ususarios',
        ]);
        Permission::create([
          'name'=>'Eliminar usuarios',
          'slug'=>'usuario.destroy',
          'description'=>'Eliminar ususarios del sistema',
        ]);


        //Area que Envia
        Permission::create([
          'name'=>'Ver listado de areas que envian',
          'slug'=>'area.index',
          'description'=>'Ver la lista de todos las areas registradas en el sistema',
        ]);
        Permission::create([
          'name'=>'Editar areas que envian',
          'slug'=>'area.edit',
          'description'=>'Editar la informacion de las areas',
        ]);
        Permission::create([
          'name'=>'Crear areas que envian',
          'slug'=>'area.create',
          'description'=>'Agregar nuevas areas al sistema',
        ]);
        Permission::create([
          'name'=>'Eliminar areas que envian',
          'slug'=>'area.destroy',
          'description'=>'Eliminar areas del sistema',
        ]);


        //Area que Recibe
        Permission::create([
          'name'=>'Ver listado de areas que reciben',
          'slug'=>'area2.index',
          'description'=>'Ver la lista de todos las areas registradas en el sistema',
        ]);
        Permission::create([
          'name'=>'Editar areas que reciben',
          'slug'=>'area2.edit',
          'description'=>'Editar la informacion de las areas',
        ]);
        Permission::create([
          'name'=>'Crear areas que reciben',
          'slug'=>'area2.create',
          'description'=>'Agregar nuevas areas al sistema',
        ]);
        Permission::create([
          'name'=>'Eliminar areas que reciben',
          'slug'=>'area2.destroy',
          'description'=>'Eliminar areas del sistema',
        ]);


        //Taller
        Permission::create([
          'name'=>'Ver listado de talleres',
          'slug'=>'taller.index',
          'description'=>'Ver la lista de todos los talleres registrados en el sistema',
        ]);
        Permission::create([
          'name'=>'Editar talleres',
          'slug'=>'taller.edit',
          'description'=>'Editar la informacion de los talleres',
        ]);
        Permission::create([
          'name'=>'Crear talleres',
          'slug'=>'taller.create',
          'description'=>'Agregar nuevos talleres al sistema ',
        ]);
        Permission::create([
          'name'=>'Eliminar talleres',
          'slug'=>'taller.destroy',
          'description'=>'Eliminar talleres del sistema',
        ]);


        //Unidad
        Permission::create([
          'name'=>'Ver listado de unidades',
          'slug'=>'unidad.index',
          'description'=>'Ver la lista de todos los unidades registrados en el sistema',
        ]);
        Permission::create([
          'name'=>'Editar unidades',
          'slug'=>'unidad.edit',
          'description'=>'Editar la informacion de los unidades ',
        ]);
        Permission::create([
          'name'=>'Crear unidades',
          'slug'=>'unidad.create',
          'description'=>'Agregar nuevos unidades al sistema ',
        ]);
        Permission::create([
          'name'=>'Eliminar unidades',
          'slug'=>'unidad.destroy',
          'description'=>'Eliminar unidades del sistema',
        ]);


        //Orden
        Permission::create([
          'name'=>'Ver listado de ordenes',
          'slug'=>'orden.index',
          'description'=>'Ver la lista de todos las ordenes registradas en el sistema',
        ]);
        Permission::create([
          'name'=>'Editar ordenes',
          'slug'=>'orden.edit',
          'description'=>'Editar la informacion de las ordenes ',
        ]);
        Permission::create([
          'name'=>'Crear ordenes',
          'slug'=>'orden.create',
          'description'=>'Agregar nuevas ordenes al sistema ',
        ]);
        Permission::create([
          'name'=>'Eliminar ordenes',
          'slug'=>'orden.destroy',
          'description'=>'Eliminar ordenes del sistema',
        ]);


        //Factura
        Permission::create([
          'name'=>'Ver listado de facturas',
          'slug'=>'factura.index',
          'description'=>'Ver la lista de todos las facturas registradas en el sistema',
        ]);
        Permission::create([
          'name'=>'Editar facturas',
          'slug'=>'factura.edit',
          'description'=>'Editar la informacion de las facturas ',
        ]);
        Permission::create([
          'name'=>'Crear facturas',
          'slug'=>'factura.create',
          'description'=>'Agregar nuevas facturas al sistema ',
        ]);
        Permission::create([
          'name'=>'Eliminar facturas',
          'slug'=>'factura.destroy',
          'description'=>'Eliminar facturas del sistema',
        ]);


        //Archivos
        Permission::create([
          'name'=>'Ver listado de Ordenes con Archivos',
          'slug'=>'archivo.index',
          'description'=>'Ver el listados de todas las Ordenes con Archivos registradas en el sistema',
        ]);
        Permission::create([
          'name'=>'Subir Archivos',
          'slug'=>'archivo.create',
          'description'=>'Subir Archivos de las Ordenes',
        ]);
        Permission::create([
          'name'=>'Consultar Archivos',
          'slug'=>'archivo.show',
          'description'=>'Consultar y Descargar los Archivos',
        ]);


        //Exportar Datos
        Permission::create([
          'name'=>'Exportar datos del Area que Envia',
          'slug'=>'area.xlsx',
          'description'=>'Exportar los datos de las Areas que Envian en un archivo Excel',
        ]);
        Permission::create([
          'name'=>'Exportar datos del Area que Recibe',
          'slug'=>'areaDos.xlsx',
          'description'=>'Exportar los datos de las Areas que Reciben en un archivo Excel',
        ]);
        Permission::create([
          'name'=>'Exportar datos de las Facturas',
          'slug'=>'factura.xlsx',
          'description'=>'Exportar los datos de las Facturas en un archivo Excel',
        ]);
        Permission::create([
          'name'=>'Exportar datos de los Talleres',
          'slug'=>'taller.xlsx',
          'description'=>'Exportar los datos de los Talleres en un archivo Excel',
        ]);
        Permission::create([
          'name'=>'Exportar datos de las Unidades',
          'slug'=>'unidad.xlsx',
          'description'=>'Exportar los datos de las Unidades en un archivo Excel',
        ]);
        Permission::create([
          'name'=>'Exportar todos los Datos de la Orden',
          'slug'=>'orden.xlsx',
          'description'=>'Exportar todos los Datos de las Ordenes en un archivo Excel',
        ]);


        //Importar Datos desde Excel
        Permission::create([
          'name'=>'Importar datos ',
          'slug'=>'importar.index',
          'description'=>'Importar los datos desde Archivos de Excel',
        ]);
        Permission::create([
          'name'=>'Importar datos del Area que Envia',
          'slug'=>'importar.area',
          'description'=>'Importar los datos de las Areas que Envian desde un archivo Excel',
        ]);
        Permission::create([
          'name'=>'Importar datos del Area que Recibe',
          'slug'=>'importar.areados',
          'description'=>'Importar los datos de las Areas que Reciben desde un archivo Excel',
        ]);
        Permission::create([
          'name'=>'Importar datos de Talleres',
          'slug'=>'importar.taller',
          'description'=>'Importar los datos de los Talleres desde un archivo Excel',
        ]);
        Permission::create([
          'name'=>'Importar datos de las Unidades',
          'slug'=>'importar.unidad',
          'description'=>'Importar los datos de las Unidades desde un archivo Excel',
        ]);


        //Reportes
        Permission::create([
          'name'=>'Acceder a Reportes',
          'slug'=>'reporte.index',
          'description'=>'Acceder al Apartado de Reportes',
        ]);
        Permission::create([
          'name'=>'Crear Disctamen Tecnico',
          'slug'=>'orden.pdf',
          'description'=>'Crear el Dictamen Tecnico de las Ordenes',
        ]);
        Permission::create([
          'name'=>'Crear Bitacora de Unidad',
          'slug'=>'unidad.bitacora',
          'description'=>'Crear la Bitacora de las Unidades',
        ]);
        Permission::create([
          'name'=>'Crear Reporte Total de Servicios Anual',
          'slug'=>'servicios.anual',
          'description'=>'Crear el Reporte del total de servicios Anual',
        ]);
        Permission::create([
          'name'=>'Crear Reporte Total de Servicios Periodo',
          'slug'=>'servicios.mensual',
          'description'=>'Crear el Reporte del total de servicios de acuerdo a un rango determinado',
        ]);
        Permission::create([
          'name'=>'Crear Test de Taller',
          'slug'=>'taller.test',
          'description'=>'Crear el Test de Talleres',
        ]);
        Permission::create([
          'name'=>'Crear Reporte de Mantenimiento Mensual',
          'slug'=>'mantenimiento.mensual',
          'description'=>'Crear el Reporte de Mantenimiento Mensual',
        ]);
        Permission::create([
          'name'=>'Crear Reporte de Mantenimiento Anual',
          'slug'=>'mantenimiento.anual',
          'description'=>'Crear el Reporte de Mantenimiento Mensual',
        ]);


        //Roles
        Permission::create([
          'name'=>'Ver listado de roles',
          'slug'=>'roles.index',
          'description'=>'Ver la lista de todos los roles del sistema',
        ]);
        Permission::create([
          'name'=>'Editar roles',
          'slug'=>'roles.update',
          'description'=>'Editar la informacion de los roles ',
        ]);
        Permission::create([
          'name'=>'Crear roles',
          'slug'=>'roles.store',
          'description'=>'Agregar nuevos roles al sistema ',
        ]);
        Permission::create([
          'name'=>'Eliminar roles',
          'slug'=>'roles.destroy',
          'description'=>'Eliminar roles del sistema',
        ]);


        //Configurar Dictamen
        Permission::create([
          'name'=>'Configurar dictamen',
          'slug'=>'dictamen.index',
          'description'=>'Editar los nombres de los jefes del dictamen',
        ]);
    }
}
