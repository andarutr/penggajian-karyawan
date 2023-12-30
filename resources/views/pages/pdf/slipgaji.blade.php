<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Slip Gaji {{ $user->nama_lengkap }}</h2>

<table>
  <tr>
        <th>Nama Lengkap</th>
        <td>{{ $user->nama_lengkap }}</td>
        <th>Email</th>
        <td>{{ $user->email }}</td>
    </tr>
    <tr>
        <th>No Slip</th>
        <td>{{ $gaji->no_slip }}</td>
        <th>Gaji</th>
        <td>Rp{{ number_format($gaji->gaji_pokok,0,',','.') }}</td>
    </tr>
    <tr>
        <th>Absen</th>
        <td>{{ $gaji->absen }}</td>
        <th>Tunjangan</th>
        <td>{{ $gaji->tunjangan }}</td>
    </tr>
    <tr>
        <th>Dibuat Pada</th>
        <td>{{ \Carbon\Carbon::parse($gaji->created_at)->format('d F Y') }}</td>
        <th>Diperbarui Pada</th>
        <td>{{ \Carbon\Carbon::parse($gaji->updated_at)->format('d F Y') }}</td>
    </tr>
</table>

</body>
</html>
