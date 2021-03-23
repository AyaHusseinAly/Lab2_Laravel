@extends('layouts.app')

@section('title')Index Page @endsection

@section('content')
<a href="{{route('posts.create')}}" class="btn btn-success" style="margin-bottom: 20px;">Create Post</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Slug</th>
        <th scope="col">Title</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      
      <tr>
        <th scope="row">{{ $post->id}}</th>
        <td>{{ $post->slug }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->myUserRelation? $post->myUserRelation->name:'user not found' }}</td> <!--hat el user object el 5as bel post whatel name mno-->
        <td>{{ $post->created_at }}</td>
        <td>
          <a href="{{ route('posts.show',['post' => $post['id']]) }}" class="btn btn-info" style="margin-bottom: 20px;">View</a>
          <a href="{{ route('posts.edit',['post' => $post['id']]) }}" class="btn btn-secondary" style="margin-bottom: 20px;">Edit</a>
          

          <button type="button" class="btn btn-danger" style="margin-bottom: 20px;"data-toggle="modal" data-target="#modalId">Delete</button>
          
            <div class="modal" tabindex="-1" role="dialog" id="modalId">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Delete Post</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure you want to delete this post?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" style="margin-bottom: 20px;"data-dismiss="modal">Cancel</button>
                      <form method="POST" action="{{ route('posts.delete',['post' => $post['id']]) }}" style="display:inline">
                          @csrf
                          @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="margin-bottom: 20px;">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

  
        </td>
      </tr>
    @endforeach
    </tbody>
</table>
{!! $posts->links('pagination::bootstrap-4'); !!}

@endsection
