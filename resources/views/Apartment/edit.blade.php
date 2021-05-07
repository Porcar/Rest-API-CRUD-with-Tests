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
      <form method="post" action="{{ route('apartment.update', $apartment->ext_id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ $apartment->name }}"/>
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description" value="{{ $apartment->description }}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="number" class="form-control" name="quantity" value="{{ $apartment->quantity }}" max="2147483647"/>
          </div>
          <div class="form-group">
            <label for="active">Active</label>
            <div>
              <input type="radio" name="active" id="active" value= 1  <?php if ($apartment->active == '1') {echo ' checked ';} ?> /> Yes
              <input type="radio" name="active" id="active" value= 0  <?php if ($apartment->active == '0') {echo ' checked ';} ?> /> No
            </div>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update</button>
      </form>
  </div>
</div>
@endsection
