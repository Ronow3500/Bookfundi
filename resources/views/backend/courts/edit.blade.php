@extends('backend.layout.main')

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card">
        <div class="card-header">
           <h3>Edit {{ $court->court_name }}</h3>
        </div>
        <div class="card-body">
           <form action="{{ route('backend.courts.update', $court->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col">
                   <div class="mb-3">
                      <label for="court_name" class="form-label">Court Name</label>
                      <input type="text" name="court_name" class="form-control @error('court_name') is-invalid @enderror" id="court_name" value="{{ $court->court_name }}">
                      @error('court_name')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                      @enderror
                   </div> 
                </div>
                <div class="col">
                    <div class="mb-3">
                      <label for="court_level" class="form-label">Court Level</label>
                      <select id="court_level" class="form-select" name="court_level" style="width: 100%;">
                        @isset($court)
                        <option value="{{ $court->court_level }}">
                            {{ $court->court_level }}
                        </option>
                        @endisset
                        <option value="Court of Appeal">Court of Appeal</option>
                        <option value="High Court">High Court</option>
                        <option value="Employment and Labor Relations Court">Employment and Labor Relations Court</option>
                        <option value="Magistrates’ Courts">Magistrates’ Courts</option>
                        <option value="Kadhis Courts">Kadhis Courts</option>
                        <option value="Court Martial">Court Martial</option>
                        <option value="Environment and Land Court">Environment and Land Court</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                      <label for="court_country" class="form-label">Court Country</label>
                      <select id="court_country" class="form-select" name="court_country" style="width: 100%;">
                        @isset($court)
                        <option value="{{ $court->court_country }}">
                            {{ $court->court_country }}
                        </option>
                        @endisset
                        <option value="Kenya">Kenya</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Uganda">Uganda</option>
                      </select>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                      <label for="court_county" class="form-label">
                         Court County/State/Province
                      </label>
                      <select id="court_county" class="form-select @error('court_county') is-invalid @enderror" name="court_county" style="width: 100%;">
                        @isset($court)
                        <option value="{{ $court->court_county }}">
                            {{ $court->court_county }}
                        </option>
                        @endisset
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
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                      <label for="court_town" class="form-label">Court City/Town</label>
                      <select id="court_town" class="form-select" name="court_town" style="width: 100%;">
                        @isset($court)
                        <option value="{{ $court->court_town }}">
                            {{ $court->court_town }}
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
        $('#court_level').select2()
    })
    $(document).ready(function () {
        $('#court_country').select2()
    })
    $(document).ready(function () {
        $('#court_county').select2()
    })
    $(document).ready(function () {
        $('#court_town').select2()
    })
</script>
@endsection