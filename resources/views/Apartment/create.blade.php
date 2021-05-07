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
    Add Apartment
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
      <form method="post" action="{{ route('apartment.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="number" class="form-control" name="quantity"/>
          </div>
          <div class="form-group">
            <label for="active">Active</label>
            <div>
              <input type="radio" name="active" id="active" value= 1> Yes
              <input type="radio" name="active" id="active" value= 0> No
            </div>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Create New</button>
      </form>
  </div>
</div>
@endsection