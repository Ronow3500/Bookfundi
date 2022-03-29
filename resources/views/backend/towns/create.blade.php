@extends('backend.layout.main')

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card">
        <div class="card-header">
           <h3>Create a new Town</h3>
        </div>
        <div class="card-body">
           <form action="{{ route('backend.towns.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                   <div class="mb-3">
                      <label for="town_name" class="form-label">Town Name</label>
                      <input type="text" name="town_name" class="form-control @error('town_name') is-invalid @enderror" id="town_name">
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
                      <label for="town_county" class="form-label">
                         Town County/State/Province
                      </label>
                      <select id="town_county" class="form-select @error('town_county') is-invalid @enderror" name="town_county" style="width: 100%;">
                          <optgroup label="Kenya">
                            <option value="Mombasa">Mombasa</option>
                            <option value="Nairobi">Nairobi</option>
                            <option value="Kisumu">Kisumu</option>  
                          </optgroup>
                          <optgroup label="Uganda">
                            <option value="Kampala">Kampala</option>
                            <option value="Jinja">Jinja</option>
                            <option value="Entebbe">Entebbe</option>  
                          </optgroup>
                          <optgroup label="Tanzania">
                            <option value="Daresalaam">Daresalaam</option>
                            <option value="Dodoma">Dodoma</option>
                            <option value="Kigoma">Kigoma</option>  
                          </optgroup>
                      </select>
                    </div>
                </div>
            </div>
              
              <button type="submit" class="btn btn-primary">Submit</button>
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