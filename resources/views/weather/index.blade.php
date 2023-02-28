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
                        <a href="{{ route('weather.create') }}" class="btn btn-primary btn-sm">Update Weather</a>
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
                                <th>Around Temperature(℃)</th>
                                <th>Water Temperature(℃)</th>
                                <th>Humidity(%)</th>
                                <th>pH</th>
                                <th>Date & Time</th>
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
            ajax: "{{ route('weather.datatable') }}",
            columns: [
                {data: 'around_temperature', name: 'around_temperature'},
                {data: 'water_temperature', name: 'water_temperature'},
                {data: 'humidity', name: 'humidity'},
                {data: 'water_ph', name: 'water_ph'},
                {data: 'date_time', name: 'date_time'},
            ],
            order: [[ 4, "desc" ]]
      });
    });
</script>
@endsection