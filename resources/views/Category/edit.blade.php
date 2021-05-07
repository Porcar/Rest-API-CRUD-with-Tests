@extends('layout')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Edit & Update
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
      <form method="post" action="{{ route('category.update', $category->ext_id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="title">Name</label>
              <input type="text" class="form-control" name="title" value="{{ $category->title }}"/>
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description" value="{{ $category->description }}"/>
          </div>
          <div class="form-group">
              <label for="ext_id">ID</label>
              <input type="text" class="form-control" name="ext_id" value="{{ $category->ext_id }}"/>
          </div>
          
          <button type="submit" class="btn btn-block btn-danger">Update</button>
      </form>
  </div>
</div>
@endsection
