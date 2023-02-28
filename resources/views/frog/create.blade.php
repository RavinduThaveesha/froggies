@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Add new Frog') }}
                    <div class="float-right">
                        <a href="{{ route('frog.index') }}" class="btn btn-primary btn-sm"><< Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('frog.store') }}">
                        @csrf 
                        <div class="form-group row">
                            <label for="address_1" class="col-md-4 col-form-label text-md-right">Name *</label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Name">
                                @error('name')
                                    <span class="invalid-feedback" style="display: block !important">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address_2" class="col-md-4 col-form-label text-md-right">Gender *</label>
                            <div class="col-md-6">
                                <select class="form-control" name="gender">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" style="display: block !important">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address_1" class="col-md-4 col-form-label text-md-right">Date of Birth *</label>
                            <div class="col-md-6">
                                <input type="text" name="dob" class="form-control date" placeholder="Date of Birth" autocomplete="off">
                                @error('dob')
                                    <span class="invalid-feedback" style="display: block !important">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address_2" class="col-md-4 col-form-label text-md-right">Type *</label>
                            <div class="col-md-6">
                                <select class="form-control" name="type_id">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <span class="invalid-feedback" style="display: block !important">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    window.onload = function () {
        $('.date').datepicker({  
            format: 'mm-dd-yyyy'
        }); 
    };
</script> 
@endsection
