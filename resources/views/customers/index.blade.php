@extends('layouts.master')

@section('title')

@section('content')
<div class="row border border-gray">

    @if (session('status'))
    <div class="row mx-auto mt-2">
        <div class="col-12 alert {{ session('alertClass') }} text-center" role="alert">
            {{ session('status') }}
        </div>
    </div>
    @endif

    <div class="table-responsive mt-3">
        <div class="row">
            <div class="col-md-10 text-center border-bottom border-gray mb-3">
                <h2>List of All Customers</h2>
            </div>
            <div class="col-md-2">
                <a class="btn btn-success floar-end" href="{{ route('customers.create') }}">Add New Customer</a>
            </div>
        </div>
        <table class="table table-bordered text-center" id="datatable">
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

@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable({
                responsive: true,
                "pageLength": 25
            });
        });
    </script>
@endpush
