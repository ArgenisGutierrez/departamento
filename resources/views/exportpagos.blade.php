<?php $detalles=departamento\DetallePago::all(); ?>
<table>
    <thead>
        <tr>
            <th>N° Tramite</th>
            <th>Area</th>
            <th>Placa/Serie</th>
            <th>Fecha Tramite</th>
            <th>Folios</th>
            <th>Importes</th>
            <th>Fechas</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ordenes as $orden)
        <tr>
            <td>{{$orden->no_tramite}}</td>
            <td>{{$orden->area}}</td>
            <td>{{$orden->serie}}</td>
            <td>{{$orden->fecha}}</td>
            <td>
                @foreach($detalles as $detalle)
                @if($orden->id_orden_pago==$detalle->id_orden_pago)
                {{$detalle->folio}} -
                @endif
                @endforeach
            </td>
            <td>
                @foreach($detalles as $detalle)
                @if($orden->id_orden_pago==$detalle->id_orden_pago)
                {{$detalle->importe}} -
                @endif
                @endforeach
            </td>
            <td>
                @foreach($detalles as $detalle)
                @if($orden->id_orden_pago==$detalle->id_orden_pago)
                {{$detalle->fecha_pago}} -
                @endif
                @endforeach
            </td>
            <td>{{$orden->total}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
