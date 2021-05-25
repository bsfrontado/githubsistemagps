<h1>Exportar datos</h1>
<table>

      
      <thead >
      <tr>
          <th>#</th>
          <th>modelo</th>
          <th>marca</th>
          <th>serial</th>
          <th>estado</th>
          <th>caracteristicas</th>
          <th>precio_compra</th>
          <th>foto</th>
          </tr>
    </thead>
    <tbody>
    @foreach($reportes as $reporte)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$reporte->modelo}}</td>
            <td>{{$reporte->marca}}</td>
            <td>{{$reporte->serial}}</td>
            <td>{{$reporte->estado}}</td>
            <td>{{$reporte->caracteristicas}}</td>
            <td>{{$reporte->precio_compra}}</td>
            <td>
            <img src="{{ asset('storage').'/'.$reporte->foto}}" class="img-thumbnail img-fluid" alt="" width="100">
            </td>
           
            </tr>
     @endforeach       
    </tbody>

 </table> 