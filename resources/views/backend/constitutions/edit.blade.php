@extends('backend.layout.main')

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card">
        <div class="card-header">
           <h3>Edit {{ $constitution->constitution_name }}</h3>
        </div>
        <div class="card-body">
           <form action="{{ route('backend.constitutions.update', $constitution->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col">
                   <div class="mb-3">
                      <label for="constitution_name" class="form-label">Country Name</label>
                      <input type="text" name="constitution_name" class="form-control @error('constitution_name') is-invalid @enderror" id="constitution_name" value="{{ $constitution->constitution_name }}">
                      @error('constitution_name')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                      @enderror
                   </div> 
                </div>
                <div class="col">
                   <div class="mb-3">
                    <label for="constitution_code" class="form-label">Country Code</label>
                    <input type="text" name="constitution_code" class="form-control @error('constitution_code') is-invalid @enderror" id="constitution_code" value="{{ $constitution->constitution_code }}">
                     @error('constitution_code')
                     <p class="text-danger">
                        {{ $message }}
                     </p>
                     @enderror
                   </div> 
                </div>
            </div>
              
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="card-footer">
            
        </div>
    </div>
  </div>
</div>

@endsection