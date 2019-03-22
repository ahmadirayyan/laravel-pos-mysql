@extends('layouts.master')

@section('title')
  <title>Edit Product Data</title>
@endsection

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="#">Home</a> </li>
              <li class="breadcrumb-item"> <a href="{{ route('produk.index') }}">Product</a> </li>
              <li class="breadcrumb-item active">Edit</li>
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
                @alert(['type' => 'danger'])
                  {!! session('error') !!}
                @endalert
              @endif
              <form action="{{ route('produk.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                  <label for="">Product Code</label>
                  <input type="text" name="code" required maxlength="10" readonly value="{{ $product->code }}" class="form-control {{ $errors->has('code') ? 'is-invalid': '' }}">
                  <p class="text-danger">{{ $errors->first('code') }}</p>
                </div>
                <div class="form-group">
                  <label for="">Product Name</label>
                  <input type="text" name="name" required value="{{ $product->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid': '' }}">
                  <p class="text-danger">{{ $errors->first('name') }}</p>
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea name="description" rows="5" cols="5" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid': '' }}"></textarea>
                  <p class="text-danger">{{ $errors->first('description') }}</p>
                </div>
                <div class="form-group">
                  <label for="">Stock</label>
                  <input type="number" name="stock" required value="{{ $product->stock }}" class="form-control {{ $errors->has('stock') ? 'is-invalid': '' }}">
                  <p class="text-danger">{{ $errors->first('stock') }}</p>
                </div>
                <div class="form-group">
                  <label for="">Price</label>
                  <input type="number" name="price" required value="{{ $product->price }}" class="form-control {{ $errors->has('price') ? 'is-invalid': '' }}">
                  <p class="text-danger">{{ $errors->first('price') }}</p>
                </div>
                <div class="form-group">
                  <label for="">Category</label>
                  <select name="category_id" id="category_id" required class="form-control {{ $errors->has('category_id') ? 'is-invalid': '' }}">
                    <option value="">Choose</option>
                    @foreach ($categories as $row)
                      <option value="{{ $row->id }}" {{ $row->id == $product->category_id ? 'selected':'' }}>{{ ucfirst($row->name) }}</option>
                    @endforeach
                  </select>
                  <p class="text-danger">{{ $errors->first('category_id') }}</p>
                </div>
                <div class="form-group">
                  <label for="">Photo</label>
                  <input type="file" name="photo" class="form-control">
                  <p class="text-danger">{{ $errors->first('photo') }}</p>
                  @if (!empty($product->photo))
                    <hr>
                    <img src="{{ asset('uploads/product/' . $product->photo) }}" alt="{{ $product->name }}" width="150px" height="150px">
                  @endif
                </div>
                <div class="form-group">
                  <button class="btn btn-info btn-sm"> <i class="fa fa-refresh"></i> Update </button>
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