@extends('layout')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Add Category
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('category.store') }}">
          <div class="form-group">
              @csrf
              <label for="title">Name</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="ext_id">ext_id</label>
              <input type="text" class="form-control" name="ext_id"/>
          </div>          
          <button type="submit" class="btn btn-block btn-danger">Create New</button>
      </form>
  </div>
</div>
@endsection