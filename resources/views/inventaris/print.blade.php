<!DOCTYPE html>
<html>

<head>
    <title>Generate PDF</title>
    <style>
        body {
            padding: $base-spacing-unit;
            font-family: 'Source Sans Pro', sans-serif;
            margin: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
        }

        .container {
            max-width: 1000px;
            margin-right: auto;
            margin-left: auto;
            margin-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }

    </style>
</head>

<body>
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h2 class="text-center mb-4">
                            Data Inventaris
                        </h2>
                        <small class=" pull-right mb-1">Print by : {{ Auth::user()->name }} </small>
                        <table class="styled-table">
                            <tr class="text-center">
                                <th scope="row">#</th>
                                <th>Kode Inventaris</th>
                                <th>Nama Inventaris</th>
                                <th>Kondisi</th>
                                <th>Keterangan</th>
                                <th>Jumlah</th>
                                <th>Gambar</th>
                                <th>ID Ruang</th>
                            </tr>
                            @if ($data->count() > 0)
                                @foreach ($data as $row)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $row->kode }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>
                                            @if ($row->kondisi == '1')
                                                Baik
                                            @elseif ($row->kondisi == '2')
                                                Rusak Ringan
                                            @elseif ($row->kondisi == '3')
                                                Rusak Berat
                                            @else
                                                Not Define
                                            @endif
                                        </td>
                                        <td>{{ $row->keterangan }}</td>
                                        <td>{{ $row->jumlah }}</td>
                                        <td class="text-center">
                                            @if (strlen($row->gambar) > 0)
                                                <img src="{{ asset('image/' . $row->gambar) }}" width="80px">
                                            @endif
                                        </td>
                                        <td>{{ $row->ruang }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center">Data Kosong</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
    </div>
    </div>

    </main>
    </div>
</body>

</body>

</html>
