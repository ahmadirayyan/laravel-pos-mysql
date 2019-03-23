@extends('layouts.master')

@section('title')
  <title>Add new user</title>
@endsection

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add new user</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{ route('home') }}">Home</a> </li>
              <li class="breadcrumb-item"> <a href="{{ route('users.index') }}">User</a> </li>
              <li class="breadcrumb-item active">Add new user</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            @card
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
