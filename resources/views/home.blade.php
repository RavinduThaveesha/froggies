@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="card" style="box-shadow: 0 1px 1px #e4e7ed;">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h6>Around Temperature</h6>
                                            <h4>{{ $weather->around_temperature ? $weather->around_temperature . '℃' : '-' }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="card" style="box-shadow: 0 1px 1px #e4e7ed;">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h6>Water Temperature</h6>
                                            <h4>{{ $weather->water_temperature ? $weather->water_temperature . '℃' : '-' }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="card" style="box-shadow: 0 1px 1px #e4e7ed;">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h6>Humidity</h6>
                                            <h4>{{ $weather->humidity ? $weather->humidity . '%' : '-' }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="card" style="box-shadow: 0 1px 1px #e4e7ed;">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h6>pH</h6>
                                            <h4>{{ $weather->water_ph ? $weather->water_ph : '-' }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-right">
                            <p class="small mt-4">Last updated: {{ $weather->created_at }}</p>
                        </div>
                    </div>
                    <div class="card-header">{{ __('Links') }}</div>
                    <div class="row mt-3">
                        <div class="col-md-4 col-sm-12">
                            <a href="{{ route('frog.index') }}" class="card text-center" style="box-shadow: 0 1px 1px #e4e7ed;" title="Click on this link to maintain frogs and relevant data.">
                                <p class="mt-5">
                                    <i class="fa fa-external-link-square fa-3x" aria-hidden="true"></i>
                                </p>
                                <p class="font-w600">Frogs</p>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <a href="{{ route('mate.index') }}" class="card text-center" style="box-shadow: 0 1px 1px #e4e7ed;"  title="Click on this link to maintain mating and relevant data.">
                                <p class="mt-5">
                                    <i class="fa fa-venus-mars fa-3x" aria-hidden="true"></i>
                                </p>
                                <p class="font-w600">Mating</p>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <a href="{{ route('weather.index') }}" class="card text-center" style="box-shadow: 0 1px 1px #e4e7ed;" title="Click on this link to maintain weather and relevant data.">
                                <p class="mt-5">
                                    <i class="fa fa-sun-o fa-3x" aria-hidden="true"></i>
                                </p>
                                <p class="font-w600">Weather</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
