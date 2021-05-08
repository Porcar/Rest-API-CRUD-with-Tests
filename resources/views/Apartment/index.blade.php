@extends('layout')

@section('content')

<div class="push-top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Apartments</div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    </div>
                    
                    <div>
                        <a style="margin: 19px;" href="{{ route('apartment.create')}}" class="btn btn-primary">New Apartment</a>
                    </div>
                  
                    <div class="card-body">
                        
                        <table class="table table-bordered">
                            <tr>
                                <th>AP-ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Active</th>
                                <th>Creation Date</th>
                                <th>Deletion Date</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($apartments as $apartment)
                            <tr>
                                <td>{{ $apartment->ext_id }}</td>
                                <td>{{ $apartment->name }}</td>
                                <td>{{ $apartment->description }}</td>
                                <td>{{ $apartment->quantity }}</td>
                                <td>{{ $apartment->active }}</td>
                                <td>{{ $apartment->created_at }}</td>
                                <td>{{ $apartment->deleted_at }}</td>
                                <td>
                                    <form action="{{ route('apartment.destroy',$apartment->ext_id) }}" method="POST">
                                                                            
                                        <a class="btn btn-primary" href="{{ route('apartment.edit',$apartment->ext_id) }}">Edit</a>
                    
                                        @csrf
                                        @method('DELETE')
                        
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>                  
                        {!! $apartments->links() !!}                             
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
