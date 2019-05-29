<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tugas #2 Pemrograman Web</title>
    </head>
    <body>
        <h1>TUGAS #2</h1>
        <table>
            <thead>
                <th>Nama Kost</th>
                <th>Alamat Kost</th>
                <th>Pemilik</th>
                <th>Edit</th>
                <th>Hapus</th>
            </thead>
            <tbody>
                @foreach($kosts as $kost)
                <tr>
                    <td>{{ $kost->namaKost }}</td>
                    <td>{{ $kost->alamatKost }}</td>
                    <td>{{ $kost->namaPemilik }}</td>
                    <td><a href="#">Edit</a></td>
                    <td><a href="#">Hapus</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
