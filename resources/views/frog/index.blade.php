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
                        <a href="{{ route('frog.create') }}" class="btn btn-primary btn-sm">Add a New Frog</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th width="50">Id</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Date of Death</th>
                                <th>Species</th>
                                <th class="no-sort">Action</th>
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
            ajax: "{{ route('frog.datatable') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'gender', name: 'gender'},
                {data: 'dob', name: 'dob'},
                {data: 'dod', name: 'dod'},
                {data: 'type', name: 'type'},
                {data: 'action', name: 'action'},
            ],
            columnDefs: [{
                targets: 'no-sort',
                orderable: false,
            }]
        });
    });
</script>
@endsection