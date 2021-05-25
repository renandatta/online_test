@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Jumlah</th>
                            <th class="text-right">Total Harga</th>
                            <th class="text-right">Ready</th>
                            <th class="text-right">OnHold</th>
                            <th class="text-right">Delivered</th>
                            <th class="text-right">Packing</th>
                            <th class="text-right">Sent</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product['barcode'] }}</td>
                                <td class="text-right">{{ $product['jumlah'] }}</td>
                                <td class="text-right">{{ number_format($product['total_harga'], 2, '.', ',') }}</td>
                                <td class="text-right">{{ $product['ready_count'] }}</td>
                                <td class="text-right">{{ $product['onhold_count'] }}</td>
                                <td class="text-right">{{ $product['delivered_count'] }}</td>
                                <td class="text-right">{{ $product['packing_count'] }}</td>
                                <td class="text-right">{{ $product['sent_count'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
