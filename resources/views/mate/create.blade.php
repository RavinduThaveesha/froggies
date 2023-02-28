@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Mate new Pair') }}
                    <div class="float-right">
                        <a href="{{ route('mate.index') }}" class="btn btn-primary btn-sm"><< Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <p>In mating frogs will not be available for mating until ongoing process finish.</p>
                    <form method="post" action="{{ route('mate.store') }}">
                        @csrf 
                        <div class="form-group row">
                            <label for="address_2" class="col-md-4 col-form-label text-md-right">Male *</label>
                            <div class="col-md-6">
                                <select class="form-control" name="male_id">
                                    @foreach ($males as $male)
                                        <option value="{{ $male->id }}">{{ $male->name .' ('. $male->type->name .')' }}</option>
                                    @endforeach
                                </select>
                                @error('male_id')
                                    <span class="invalid-feedback" style="display: block !important">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address_2" class="col-md-4 col-form-label text-md-right">Female *</label>
                            <div class="col-md-6">
                                <select class="form-control" name="female_id">
                                    @foreach ($females as $female)
                                        <option value="{{ $female->id }}">{{ $female->name .' ('. $female->type->name .')' }}</option>
                                    @endforeach
                                </select>
                                @error('female_id')
                                    <span class="invalid-feedback" style="display: block !important">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Mate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
