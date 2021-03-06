@extends('backend.layout.main')

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card">
        <div class="card-header">
           <h3>Articles's Table</h3>
           <a href="{{ route('backend.sub_sub_articles.create') }}" class="btn btn-primary right">Create new article</a>
        </div>
        <div class="card-body">
           <div class="table-responsive">
              <table class="table table-bordered border-primary table-hover table-sm">
               <thead>
                   <tr>
                       <th>Title</th>
                       <th>Description</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tbody>
                @foreach($sub_sub_articles as $sub_sub_article)
                <tr>
                   <td>
                       <a href="{{ route('backend.sub_sub_articles.show', $sub_sub_article->id) }}">
                           {{ $sub_sub_article->title }}
                       </a>
                   </td>
                   <td>
                    <?php 
                      $body =  Str::words($sub_sub_article->description, 20, '...');
                    ?>
                    {!! $body !!}
                    </td>
                   <td>
                       <a href="{{ route('backend.sub_sub_articles.edit', $sub_sub_article->id) }}" class="btn btn-sm btn-primary float-left">
                        <i class="fas fa-pen"></i>
                       </a>
                       <?php
                       

                       $slug = Str::slug('s-' . $sub_sub_article->created_at);
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
                                You are about to remove {{ $sub_sub_article->title }} from the system. Are you sure you want to proceed.
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-footer">
                                
                                <form action="{{ route('backend.sub_sub_articles.destroy', $sub_sub_article->id) }}" method="POST">
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
            {{ $sub_sub_articles->links() }}
        </div>

        

       
    </div>
  </div>
</div>
@endsection