@extends('backend.layout.main')

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card">
        <div class="card-header">
           <h3>Edit {{ $town->town_name }}</h3>
        </div>
        <div class="card-body">
           <form action="{{ route('backend.towns.update', $town->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col">
                   <div class="mb-3">
                      <label for="town_name" class="form-label">Town Name</label>
                      <input type="text" name="town_name" class="form-control @error('town_name') is-invalid @enderror" id="town_name" value="{{ $town->town_name }}">
                      @error('town_name')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                      @enderror
                   </div> 
                </div>
                <div class="col">
                    <div class="mb-3">
                      <label for="town_country" class="form-label">Town Country</label>
                      <select id="town_country" class="form-select" name="town_country" style="width: 100%;">
                        @isset($town)
                        <option value="{{ $town->town_country }}">
                            {{ $town->town_country }}
                        </option>
                        @endisset
                        <option value="Town of Appeal">Town of Appeal</option>
                        <option value="High Town">High Town</option>
                        <option value="Employment and Labor Relations Town">Employment and Labor Relations Town</option>
                        <option value="Magistrates’ Towns">Magistrates’ Towns</option>
                        <option value="Kadhis Towns">Kadhis Towns</option>
                        <option value="Town Martial">Town Martial</option>
                        <option value="Environment and Land Town">Environment and Land Town</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                      <label for="town_county" class="form-label">Town County</label>
                      <select id="town_county" class="form-select" name="town_county" style="width: 100%;">
                        @isset($town)
                        <option value="{{ $town->town_county }}">
                            {{ $town->town_county }}
                        </option>
                        @endisset
                        <option value="Mombasa">Mombasa</option>
                        <option value="Nairobi">Nairobi</option>
                        <option value="Kisumu">Kisumu</option>
                      </select>
                    </div>
                </div>
                <div class="col">
                    
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

<script type="text/javascript">
    $(document).ready(function () {
        $('#town_country').select2()
    })
    $(document).ready(function () {
        $('#town_county').select2()
    })
</script>
@endsection