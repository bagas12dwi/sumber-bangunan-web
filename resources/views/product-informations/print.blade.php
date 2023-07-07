@php
    use App\Helpers\Helper;
    
    $helper = new Helper();
@endphp

<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <style>
        table,
        th,
        td {
            border: 1px solid;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>

    {{-- <link href="{{ public_path('css/bootstrap.min.css') }}" rel="stylesheet"> --}}

</head>

<body>
    <main>
        <div class="container" style="margin: 0 16px 0 0;">
            <h3 style="text-align: center">Data Produk</h3>
            <hr>
        </div>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col" style="width: 2%;">No.</th>
                        <th scope="col">Foto Produk</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga Modal</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr class="">
                            <td style="width: 2%"> {{ $key + 1 }} </td>
                            <td>
                                <img src="{{ public_path('storage/') . $item->img_path }}" alt=""
                                    style="height: 100px">
                            </td>
                            <td scope="row"> {{ $item->product_name }} </td>
                            <td>
                                @foreach ($item->Multiprice as $multiprice)
                                    @if ($multiprice->capital_price != null || $multiprice->capital_price != '')
                                        {{ $multiprice->amount . ' ' . $multiprice->unit->unit_name . ' ' . $helper->formatRupiah($multiprice->capital_price) }}
                                    @endif
                                    <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($item->Multiprice as $multiprice)
                                    @if ($multiprice->selling_price != null || $multiprice->selling_price != '')
                                        {{ $multiprice->amount . ' ' . $multiprice->unit->unit_name . ' ' . $helper->formatRupiah($multiprice->selling_price) }}
                                    @endif
                                    <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($item->Multiprice as $multiprice)
                                    {{ $multiprice->date_modified }}
                                    <br>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
