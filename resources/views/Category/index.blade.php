@extends('layout')

@section('content')

<div class="push-top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    </div>
                    
                    <div>
                        <a style="margin: 19px;" href="{{ route('category.create')}}" class="btn btn-primary">New Category</a>
                    </div>
                  
                    <div class="card-body">
                        
                        <table class="table table-bordered">
                            <tr>
                                <th>AP-ID</th>
                                <th>Title</th>
                                <th>Description</th>                                
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->ext_id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->description }}</td>                                
                                <td>
                                    <form action="{{ route('category.destroy',$category->ext_id) }}" method="POST">
                                                                            
                                        <a class="btn btn-primary" href="{{ route('category.edit',$category->ext_id) }}">Edit</a>
                    
                                        @csrf
                                        @method('DELETE')
                        
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>                  
                        {!! $categories->links() !!}                             
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
