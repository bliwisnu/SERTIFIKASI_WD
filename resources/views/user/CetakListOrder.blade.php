<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cetak List Order</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="table-responsive container">
        <!-- Table List Order -->
        <h4 class="header text-center text-light bg-success">
            <b>LIST ORDER</b>
        </h4>
        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>
                <tr class="text-dark">
                    <th scope="col">Nama Alat</th>
                    <th scope="col">Harga/Hari</th>
                    <th scope="colengemb">Tanggal Penyewaan</th>
                    <th scope="col">Tanggal Pengembalian</th>
                </tr>
            </thead>
            @foreach ($peminjaman as $sewa)
            <tbody>
                <tr>
                    <td>{{ $sewa -> table_alat -> nama_alat }}</td>
                    <td>{{ $sewa -> table_alat -> harga_alat }}</td>
                    <td>{{ $sewa -> tanggal_sewa  }}</td>
                    <td>{{ $sewa -> tanggal_pengembalian  }}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <!-- Table Total Alat & Harga -->
        <table class="table text-start table-bordered table-hover mb-0 mt-3">
            <thead>
                <tr class="text-dark">
                    <th scope="col">Total Alat</th>
                    <th scope="col">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $countAlat }}</td>
                    <td>{{ $countHarga }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>