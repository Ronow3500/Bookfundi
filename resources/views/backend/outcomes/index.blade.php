@extends('backend.layout.main')

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card">
        <div class="card-header">
           <h3>Outcomes Table</h3>
           <a href="{{ route('backend.outcomes.create') }}" class="btn btn-success right">Create new outcome</a>
        </div>
        <div class="card-body">
           <div class="table-responsive">
              <table class="table table-bordered border-primary table-hover table-sm">
               <thead>
                   <tr>
                       <th>Outcomes</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tbody>
                @foreach($outcomes as $outcome)
                <tr>
                   <td>
                       <a href="{{ route('backend.outcomes.show', $outcome->id) }}">
                           {{ $outcome->outcome_name }}
                       </a>
                   </td>
                   <td>
                       <a href="{{ route('backend.outcomes.edit', $outcome->id) }}" class="btn btn-sm btn-primary float-left">
                           <i class="fas fa-pen"></i>
                       </a>
                       <?php
                        $slug = Str::slug($outcome->outcome_name);
                       ?>
                       <!-- Delete Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#<?= $slug; ?>">
                          <i class="fas fa-trash"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="<?= $slug; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content bg-danger">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                You are about to remove {{ $outcome->outcome_name }} from the system. Are you sure you want to proceed.
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-footer">
                                
                                <form action="{{ route('backend.outcomes.destroy', $outcome->id) }}" method="POST">
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
            {{ $outcomes->links() }}
        </div>

        

       
    </div>
  </div>
</div>
@endsection