@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Update Weather') }}
                    <div class="float-right">
                        <a href="{{ route('weather.index') }}" class="btn btn-primary btn-sm"><< Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('weather.store') }}">
                        @csrf 
                        <div class="form-group row">
                            <label for="address_2" class="col-md-4 col-form-label text-md-right">Around Temperature(℃)</label>
                            <div class="col-md-6">
                                <input type="text" name="around_temperature" class="form-control" placeholder="Around Temperature" value="{{ old('around_temperature') }}">
                                @error('around_temperature')
                                    <span class="invalid-feedback" style="display: block !important">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address_2" class="col-md-4 col-form-label text-md-right">Water Temperature(℃)</label>
                            <div class="col-md-6">
                                <input type="text" name="water_temperature" class="form-control" placeholder="Water Temperature" value="{{ old('water_temperature') }}">
                                @error('water_temperature')
                                    <span class="invalid-feedback" style="display: block !important">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address_2" class="col-md-4 col-form-label text-md-right">Humidity(%)</label>
                            <div class="col-md-6">
                                <input type="text" name="humidity" class="form-control" placeholder="Humidity" value="{{ old('humidity') }}">
                                @error('humidity')
                                    <span class="invalid-feedback" style="display: block !important">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address_2" class="col-md-4 col-form-label text-md-right">pH</label>
                            <div class="col-md-6">
                                <input type="text" name="water_ph" class="form-control" placeholder="pH" value="{{ old('water_ph') }}">
                                @error('water_ph')
                                    <span class="invalid-feedback" style="display: block !important">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Update Weather</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
