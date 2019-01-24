<table>
    <thead>
    <tr>
        <th>Folio DPA</th>
        <th>No. de Oficio</th>
        <th>Fecha</th>
        <th>Area que Envia</th>
        <th>Encargado</th>
        <th>Cargo</th>
        <th>Quien Recibe</th>
        <th>Cargo</th>
        <th>Servicios</th>
        <th>Correctivo</th>
        <th>Preventivo</th>
        <th>Enllantamiento</th>
        <th>Refacciones</th>
        <th>Mano de Obra</th>
        <th>Marca</th>
        <th>Tipo</th>
        <th>Placa</th>
        <th>Modelo</th>
        <th>Serie</th>
        <th>No. Economico</th>
        <th>Cil</th>
        <th>KM</th>
        <th>Taller</th>
        <th>Familia</th>
        <th>Importe Cotizacion</th>
        <th>Fecha Ingreso</th>
        <th>Fecha Salida</th>
        <th>Folio Factura</th>
        <th>Importe Factura</th>
        <th>Fecha Factura</th>
        <th>Fecha Envio Area</th>
        <th>Fecha Recibo Area</th>
        <th>Elaboro</th>
        <th>Estado</th>
        <th>Fecha de creacion</th>
        <th>Fecha ultima Actualizacion</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ordenes as $orden)
        <tr>
          <td>{{$orden->folio_dpa}}</td>
          <td>{{$orden->no_oficio}}</td>
          <td>{{$orden->fecha}}</td>
          <td>{{$orden->area->nombre}}</td>
          <td>{{$orden->area->encargado}}</td>
          <td>{{$orden->area->cargo}}</td>
          <td>{{$orden->areados->encargado}}</td>
          <td>{{$orden->areados->cargo}}</td>
          <td>{{$orden->servicio}}</td>
          <td>{{$orden->correctivo}}</td>
          <td>{{$orden->preventivo}}</td>
          <td>{{$orden->enllantamiento}}</td>
          <td>{{$orden->refacciones}}</td>
          <td>{{$orden->mano_obra}}</td>
          <td>{{$orden->unidad->marca}}</td>
          <td>{{$orden->unidad->tipo}}</td>
          <td>{{$orden->unidad->placa}}</td>
          <td>{{$orden->unidad->modelo}}</td>
          <td>{{$orden->unidad->serie}}</td>
          <td>{{$orden->unidad->no_economico}}</td>
          <td>{{$orden->unidad->cil}}</td>
          <td>{{$orden->km}}</td>
          <td>{{$orden->taller->nombre}}</td>
          <td>{{$orden->unidad->familia}}</td>
            @if($orden->factura===null)
            <td></td>
            @else
            <td>{{$orden->factura->importe}}</td>
            @endif()
          <td>{{$orden->fecha_ingreso}}</td>
          <td>{{$orden->fecha_salida}}</td>
            @if($orden->factura===null)
            <td></td>
            @else
            <td>{{$orden->factura->folio}}</td>
            @endif()
            @if($orden->factura===null)
            <td></td>
            @else
            <td>{{$orden->factura->importe}}</td>
            @endif()
            @if($orden->factura===null)
            <td></td>
            @else
            <td>{{$orden->factura->fecha}}</td>
            @endif()
            @if($orden->factura===null)
            <td></td>
            @else
            <td>{{$orden->factura->fecha_envio_area}}</td>
            @endif()
            @if($orden->factura===null)
            <td></td>
            @else
            <td>{{$orden->factura->fecha_recibo_area}}</td>
            @endif()
          <td>{{$orden->user->name}}</td>
          <td>{{$orden->estado}}</td>
          <td>{{$orden->created_at}}</td>
          <td>{{$orden->updated_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
