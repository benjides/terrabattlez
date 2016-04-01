@extends('layouts.admin')

@section('title', 'Items - Create')

@section('css')
  <link href="{{ asset('/css/jasny-bootstrap.min.css')}}" rel="stylesheet">
@endsection

@section('js')
  <script src="{{ asset('/js/fileinput.js') }}"></script>
  <script src="{{ asset('/js/holder.min.js') }}"></script>
@endsection

@section('content')
<style>

</style>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Items <small>Form Creation</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{url('admin/items')}}">Items</a>
            </li>
            <li class="active">
                 Create
            </li>
        </ol>
    </div>
</div>

<form class="form-horizontal" action="{{url('admin/items')}}" method="POST" enctype="multipart/form-data">
  <fieldset>

      <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="contents">Item name</label>
        <div class="col-md-5">
          <input id="name" name="name" placeholder="Item" class="form-control input-md" required="" type="text" value="{{old('name')}}">
        </div>
      </div>

      <!-- Textarea input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="contents">Description</label>
        <div class="col-md-5">
          <textarea id="description" name="description" placeholder="Description" class="form-control input-md" required="">{{old('description')}}</textarea>
        </div>
      </div>

      <!-- File input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="contents">Icon</label>
        <div class="col-md-5">
          <div class="fileinput fileinput-new" data-provides="fileinput" >
            <div class="fileinput-preview thumbnail" data-trigger="fileinput" >
              <img data-src="holder.js/50x50">
            </div>
            <div>
              <span class="btn btn-default btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="icon">
              </span>
              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
            </div>
          </div>
        </div>
      </div>



      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="submit"></label>
        <div class="col-md-4">
          <button id="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>

  </fieldset>
</form>

@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
  @foreach($errors->all() as $error)
  <p>{{$error}}</p>
  @endforeach
</div>
@endif

@if (Session::has('success'))
<div class="alert alert-success" role="alert">
  The item <strong>{{Session::get('success')}}</strong> has been registered succesfully.
</div>
@endif

@endsection