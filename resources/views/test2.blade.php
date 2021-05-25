@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-0">Data</h5>
                    {{ json_encode($data) }}
                    <br><br>
                    <h5 class="mb-0">Result</h5>
                    {{ json_encode($result) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
