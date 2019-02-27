<?php
  $dictamen=departamento\dictamen::first();
 ?>
<img src="imagenes/logo1.jpg" alt="" style="width: 730px; height: 65px;">
<table WIDTH="730px" STYLE="table-layout:fixed">
    <tr>
        <td id="titulo" colspan="6" style="width:400px;">Dictamen Técnico de Autorización para Ingreso a Taller</td>
        <td style="width:50px;">Folio:</td>
        <td style="width:50px;">{{$orden->folio_dpa}}</td>
    </tr>
    <tr>
        <td colspan="6" rowspan="2">{{$orden->area->where('id_area',$orden->id_area)->value('nombre')}}</td>
        <td>Fecha:</td>
        <td>{{$orden->fecha}}</td>
    </tr>
    <tr>
        <td>No.Oficio</td>
        <td>{{$orden->no_oficio}}</td>
    </tr>
    <tr>
        <td id="titulo" style="width: 62.5px;">Marca</td>
        <td id="titulo" style="width: 62.5px;">Tipo</td>
        <td id="titulo" style="width: 62.5px;">Placa</td>
        <td id="titulo" style="width: 62.5px;">Modelo</td>
        <td id="titulo" style="width: 62.5px;">Serie</td>
        <td id="titulo" style="width: 62.5px;">No. Económico</td>
        <td id="titulo" style="width: 62.5px;">CIL</td>
        <td id="titulo" style="width: 62.5px;">KM</td>
    </tr>
    <tr>
        <td style="width: 62.5px;">{{$orden->unidad->where('id_unidad',$orden->id_unidad)->value('marca')}}</td>
        <td style="width: 62.5px;">{{$orden->unidad->where('id_unidad',$orden->id_unidad)->value('tipo')}}</td>
        <td style="width: 62.5px;">{{$orden->unidad->where('id_unidad',$orden->id_unidad)->value('placa')}}</td>
        <td style="width: 62.5px;">{{$orden->unidad->where('id_unidad',$orden->id_unidad)->value('modelo')}}</td>
        <td style="width: 62.5px;">{{$orden->unidad->where('id_unidad',$orden->id_unidad)->value('serie')}}</td>
        <td style="width: 62.5px;">{{$orden->unidad->where('id_unidad',$orden->id_unidad)->value('no_economico')}}</td>
        <td style="width: 62.5px;">{{$orden->unidad->where('id_unidad',$orden->id_unidad)->value('cil')}}</td>
        <td style="width: 62.5px;">{{$orden->km}}</td>
    </tr>
    <tr>
        <td id="titulo" colspan="2">Taller Licitado</td>
        <td colspan="6">{{$orden->taller->where('id_taller',$orden->id_taller)->value('nombre')}}</td>
    </tr>
    <tr>
        <td id="titulo" colspan="8">Diagnostico Preliminar:</td>
    </tr>
    <tr>
        <td id="servicio" colspan="8" style="height:245px;">
            <?php $servicios=departamento\detalle::all() ?>
            @foreach($servicios as $servicio)
            @if($servicio->id_orden==$orden->id_orden)
        {{$servicio->servicio->nombre}} <br>
        @endif
        @endforeach
        </td>
    </tr>
    <tr>
        <td id="titulo" colspan="3">Refacciones</td>
        @if($orden->refacciones==='si')
        <td> X </td>
        @else
        <td> - </td>
        @endif
        <td id="titulo" colspan="3">Mano de Obra</td>
        @if($orden->mano_obra==='si')
        <td> X </td>
        @else
        <td> - </td>
        @endif
    </tr>
    <tr>
        <td id="titulo" colspan="2">Servicio Mecánico Preventivo</td>
        @if($orden->preventivo==='si')
        <td> X </td>
        @else
        <td> - </td>
        @endif
        <td id="titulo" colspan="2">Servicio Mecánico Correctivo</td>
        @if($orden->correctivo==='si')
        <td> X </td>
        @else
        <td> - </td>
        @endif
        <td id="titulo">Servicio de Enllantamiento</td>
        @if($orden->enllantamiento==='si')
        <td> X </td>
        @else
        <td> - </td>
        @endif
    </tr>
    <tr>
        <td id="titulo" colspan="4">Solicitud de Area Usuaria</td>
        <td id="titulo" colspan="4">Valida</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="3" style="height: 95px;"></td>
        <td colspan="4" style="height: 40px;"></td>
    </tr>
    <tr>
        @if($dictamen==null)
        <td colspan="4"></td>
        @else
        <td colspan="4">{{$dictamen->jefe_oficina}}</td>
        @endif
    </tr>
    <tr>
        <td colspan="4" style="height: 5px; font-weight: bold;">Jefe de la Oficina de Maquinaria</td>
    </tr>
    <tr>
        <td colspan="4">{{$orden->areados->where('id_area_dos',$orden->id_area_dos)->value('encargado')}}</td>
        <td id="titulo" colspan="4" style="height: 10px;">Vo.Bo.</td>
    </tr>
    <tr>
        <td colspan="4" style="font-weight: bold;">{{$orden->areados->where('id_area_dos',$orden->id_area_dos)->value('cargo')}}</td>
        <td colspan="4" style="height: 40px;"></td>
    </tr>
    <tr>
        <td id="titulo" colspan="4">Revisa</td>
        @if($dictamen==null)
        <td colspan="4"></td>
        @else
        <td colspan="4">{{$dictamen->jefe_departamento}}</td>
        @endif
    </tr>
    <tr>
        <td colspan="4" rowspan="3"></td>
        <td colspan="4" style="font-weight: bold;">Jefe del Departamento de Recursos Materiales y<div>Servicios
                Generales</td>
    </tr>
    <tr>
        <td id="titulo" colspan="4">Autoriza</td>
    </tr>
    <tr>
        <td colspan="4" style="height: 40px;"></td>
    </tr>
    <tr>
        <td colspan="4" style="height: 10px;">{{$orden->area->where('id_area',$orden->id_area)->value('encargado')}}</td>
        @if($dictamen==null)
        <td colspan="4"></td>
        @else
        <td colspan="4">{{$dictamen->jefe_unidad}}</td>
        @endif
    </tr>
    <tr>
        <td colspan="4" style="height: 10px; font-weight: bold;">{{$orden->area->where('id_area',$orden->id_area)->value('cargo')}}</td>
        <td colspan="4" style="height: 10px; font-weight: bold;">Jefe de la Unidad Administrativa</td>
    </tr>
</table>

<style media="screen">
    td {
        border: 1px solid rgb(0, 0, 0);
        text-align: center;
        word-wrap: break-word;
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
        border: 1px solid rgb(0, 0, 0);
        word-wrap: break-word;
    }

    #titulo {
        background-color: rgb(144, 144, 144);
        font-weight: bold;
    }

    #servicio {
        text-align: left;
        text-align: justify;
    }

</style>
