<table>
    <thead>
    <tr>
        <th>Folio DPA</th>
        <th>Folio</th>
        <th>Importe</th>
        <th>Fecha</th>
        <th>Fecha de Envio</th>
        <th>Fecha de Recibo</th>
        <th>Fecha de creacion</th>
        <th>Fecha ultima Actualizacion</th>
    </tr>
    </thead>
    <tbody>
    @foreach($facturas as $factura)
        <tr>
          <td>{{$factura->orden->folio_dpa}}</td>
          <td>{{$factura->folio}}</td>
          <td>{{$factura->importe}}</td>
          <td>{{$factura->fecha}}</td>
          <td>{{$factura->fecha_envio_area}}</td>
          <td>{{$factura->fecha_recibo_area}}</td>
          <td>{{$factura->created_at}}</td>
          <td>{{$factura->updated_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
