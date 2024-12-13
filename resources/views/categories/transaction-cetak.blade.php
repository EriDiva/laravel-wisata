<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data Transaksi</title>
  <style>
    .table-data {
      border-collapse: collapse;
      width: 100%;
    }

    .table-data tr th,
    .table-data tr td {
      border: 1px solid black;
      font-size: 11pt;
      padding: 10px 20px;
      text-align: center;
    }

    .table-data tr th {
      background-color: #2c3e50;
      color: white;
    }

    .table-data tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .table-data tr:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>

<body>
  <h3>Data Wisata</h3>
  <table class="table-data">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Wisata</th>
        <th>Harga</th>
        <th>Deskripsi</th>

      </tr>
    </thead>
    <tbody>
      @forelse ($category as $transaction)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $transaction->updated_at }}</td>
        <td>{{ $transaction->categories}}</td>
        <td>Rp. {{ number_format($transaction->price) }}</td>
        <td>{{ $transaction->description }}</td>

      </tr>
      @empty
      <tr>
        <td colspan="7" align="center">Tidak ada data</td>
      </tr>
      @endforelse
    </tbody>
</body>

</html>
