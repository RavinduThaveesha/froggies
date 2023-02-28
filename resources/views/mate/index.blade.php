@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Frogs') }}
                    <div class="float-right">
                        <a href="{{ route('home') }}" class="btn btn-primary btn-sm"><< Back</a>
                        <a href="{{ route('mate.create') }}" class="btn btn-primary btn-sm">Mating</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <p>After change the status to "In Completed" or "Completed", you will be not able to update status again.</p>
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th width="50">Id</th>
                                <th>Frogs</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th class="no-sort">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(function () {
        $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('mate.datatable') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'frogs', name: 'frogs'},
                {data: 'start_date', name: 'start_date'},
                {data: 'end_date', name: 'end_date'},
                {data: 'action', name: 'action'},
            ],
            order: [[ 2, 'desc' ]],
            columnDefs: [{
                targets: 'no-sort',
                orderable: false,
            }]
        });
    });
</script>
@endsection