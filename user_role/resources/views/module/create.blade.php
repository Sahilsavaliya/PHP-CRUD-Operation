@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card"> -->
                

                <div class="card-body">
                    <form method="POST" action="{{ route('module.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="modules_name" class="col-md-4 col-form-label text-md-end">{{ __('modules_name') }}</label>

                            <div class="col-md-6">
                                <input id="modules_name" type="text" class="form-control @error('modules_name') is-invalid @enderror" name="modules_name" value="{{ old('modules_name') }}" required autocomplete="name" autofocus>

                                @error('modules_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection
