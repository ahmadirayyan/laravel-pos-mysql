@extends('layouts.master')

@section('title')
  <title>Add Product Data</title>
@endsection

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{ route('home') }}">Home</a> </li>
              <li class="breadcrumb-item"> <a href="{{ route('produk.index') }}">Product</a> </li>
              <li class="breadcrumb-item active">Add</li>
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
              @slot('title')

              @endslot

              @if (session('success'))
                @alert(['type' => 'success'])
                  {!! session('success') !!}
                @endalert
              @endif

              <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="">Product Code</label>
                  <input type="text" name="code" required maxlength="10" class="form-control {{ $errors->has('code') ? 'is-invalid': '' }}">
                  <p class="text-danger">{{ $errors->first('code') }}</p>
                </div>
                <div class="form-group">
                  <label for="">Product Name</label>
                  <input type="text" name="name" required class="form-control {{ $errors->has('name') ? 'is-invalid': '' }}">
                  <p class="text-danger">{{ $errors->first('name') }}</p>
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea name="description" rows="5" cols="5" class="form-control {{ $errors->has('description') ? 'is-invalid': '' }}"></textarea>
                  <p class="text-danger">{{ $errors->first('description') }}</p>
                </div>
                <div class="form-group">
                  <label for="">Stock</label>
                  <input type="number" name="stock" required class="form-control {{ $errors->has('stock') ? 'is-invalid': '' }}">
                  <p class="text-danger">{{ $errors->first('stock') }}</p>
                </div>
                <div class="form-group">
                  <label for="">Price</label>
                  <input type="number" name="price" required class="form-control {{ $errors->has('price') ? 'is-invalid': '' }}">
                  <p class="text-danger">{{ $errors->first('price') }}</p>
                </div>
                <div class="form-group">
                  <label for="">Category</label>
                  <select name="category_id" id="category_id" required class="form-control {{ $errors->has('category_id') ? 'is-invalid': '' }}">
                    <option value="">Choose</option>
                    @foreach ($categories as $row)
                      <option value="{{ $row->id }}">{{ ucfirst($row->name) }}</option>
                    @endforeach
                  </select>
                  <p class="text-danger">{{ $errors->first('category_id') }}</p>
                </div>
                <div class="form-group">
                  <label for="">Photo</label>
                  <input type="file" name="photo" class="form-control">
                  <p class="text-danger">{{ $errors->first('photo') }}</p>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-sm"> <i class="fa fa-send"></i> Save </button>
                </div>
              </form>
              @slot('footer')

              @endslot
            @endcard
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
