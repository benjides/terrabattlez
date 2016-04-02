@extends('layouts.admin')

@section('title', 'News - Update')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            News <small>Update</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{url('admin/news')}}">News</a>
            </li>
            <li class="active">
                 Update
            </li>
        </ol>
    </div>
</div>

<form class="form-horizontal" action="{{url('admin/news',$news->id)}}" method="POST">
  <fieldset>

      <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
      <input type="hidden" name="_method" value="PUT">

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="contents">Contents</label>
        <div class="col-md-5">
        <textarea id="contents" name="contents" placeholder="Contents" class="form-control input-md">{{$news->contents}}</textarea>

        </div>
      </div>

      <!-- Multiple Radios (inline) -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="radios">Update date :</label>
        <div class="col-md-4">
          <label class="radio-inline">
            <input name="date" value="yes" type="radio">
            Yes
          </label>
          <label class="radio-inline">
            <input name="date" value="no" type="radio" checked="checked">
            No
          </label>
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
  The News has been updated succesfully.
</div>
@endif

@endsection
