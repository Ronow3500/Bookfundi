@extends('backend.layout.main')

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card">
        <div class="card-header">
           <h3>Caselaws Table</h3>
           <a href="{{ route('backend.caselaws.create') }}" class="btn btn-primary right">Create new caselaw</a>
        </div>
        <div class="card-body">
           <div class="table-responsive">
              <table class="table table-bordered border-primary table-hover table-sm">
               <thead>
                   <tr>
                       <th>Case Number</th>
                       <th>Case Title</th>
                       <th>Case Decision</th>
                       <th>Year</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tbody>
                @foreach($caselaws as $caselaw)
                <tr>
                   <td>
                       <a href="{{ route('backend.caselaws.show', $caselaw->id) }}">
                           {{ $caselaw->case_number }}
                       </a>
                   </td>
                   <td>{{ $caselaw->case_title }}</td>
                   <td>{{ $caselaw->case_decision }}</td>
                   <td>{{ $caselaw->case_date }}</td>
                   <td>
                       <a href="{{ route('backend.caselaws.edit', $caselaw->id) }}" class="btn btn-sm btn-primary float-left">
                           <i class="fas fa-pen"></i>
                       </a>
                       <?php

                         $slug = Str::slug($caselaw->case_number);
                         
                       ?>
                       <!-- Delete Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#<?= 'r-' . $slug; ?>">
                          <i class="fas fa-trash"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="<?= 'r-' . $slug; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content bg-danger">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    You are about to remove {{ $caselaw->case_number }} from the system. Are you sure you want to proceed.
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-footer">
                                
                                <form action="{{ route('backend.caselaws.destroy', $caselaw->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-primary float-right">
                                    Yes
                                  </button>
                                </form>

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                              </div>
                            </div>
                          </div>
                        </div>
                   </td>
                </tr>
                @endforeach
               </tbody>
             </table>
           </div> 
        </div>
        <div class="card-footer">
            {{ $caselaws->links() }}
        </div>

        

       
    </div>
  </div>
</div>
@endsection