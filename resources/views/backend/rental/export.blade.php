<table>
    <thead>
    <tr>
        <th>Tanggal</th>
        <th>Aula</th>
        <th>Acara</th>
        <th>Peminjam</th>
        <th>Program Studi</th>
        <th>No HP</th>
        <th>Alamat</th>
    </tr>
    </thead>
    <tbody>
    @foreach($rentals as $rental)
        <tr>
            <td>{{ $rental->tgl_awal }}</td>
            <td>{{ $rental->room->room }}</td>
            <td>{{ $rental->acara }}</td>
            <td>{{ $rental->peminjam }}</td>
            <td>{{ $rental->prodi->name }}</td>
            <td>{{ $rental->no_hp }}</td>
            <td>{{ $rental->alamat }}</td>
        </tr>
    @endforeach
    </tbody>
</table>