@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card"> -->
                

               
               
                <div class="card-body">
                    
                    <form action="{{ route('role.update',$role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="roles_name" class="col-md-4 col-form-label text-md-end">{{ __('roles_name') }}</label>

                            <div class="col-md-6">
                                <input id="roles_name" type="text" class="form-control @error('roles_name') is-invalid @enderror" name="roles_name" value="{{$role->roles_name }}" required autocomplete="name" autofocus>

                                @error('roles_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                     
                        <div class="row mb-3">
                        <label for="module_id" class="col-md-4 col-form-label text-md-end">{{ __('module_id') }}</label>
                    <select name="module_id" class="col-md-4 col-form-control">
                        <option >Select</option>
                        
                    @foreach($modules as $module)
                    <option value="{{$module->id}}"> {{ $module->modules_name }}</option>
                    @endforeach
                    </select>
                                @error('module_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                                @error('roles_name')
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
