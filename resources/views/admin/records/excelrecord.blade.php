<table>
    <thead>
    <tr>
        <th><strong>N°</strong></th>
        <th><strong>Nombres</strong></th>
        <th><strong>Teléfono</strong></th>
        <th><strong>Email</strong></th>
        <th><strong>Empresa</strong></th>
        <th><strong>Comentarios</strong></th>
        <th><strong>Fecha de registro</strong></th>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
        <tr>
            <td style="width: 7px">{{ $loop->iteration }}</td>
            <td style="width: 40px">{{ $record->fullname }}</td>
            <td style="width: 15px">{{ $record->telephone }}</td>
            <td style="width: 23px">{{ $record->email }}</td>
            <td style="width: 20px">{{ $record->company }}</td>
            <td style="width: 40px">{{ $record->observation }}</td>
            <td style="width: 15px">{!! \Carbon\Carbon::parse($record->created_at)->format('d/m/Y') !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>