@extends('layouts.master')

@section('title', '')

@section('content')
<div class="row border border-gray">

    @if (session('status'))
    <div class="row mx-auto">
        <div class="col-12 alert {{ session('alertClass') }} text-center" role="alert">
            {{ session('status') }}
        </div>
    </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="table-responsive mt-3">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>List Of All Customers</h2>
            </div>
        </div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th style="width:10%">#</th>
                    <th style="width:20%">Code</th>
                    <th style="width:35%">Full Name</th>
                    <th style="width:10%">Age</th>
                    <th style="width:30%">Location</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $i => $customer)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $customer->code }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->age }}</td>
                        <td>{{ $customer->area->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
