@extends('layouts.master')

@section('title')
  <title>Transaction</title>
@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css">
@endsection

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transaction</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="#">Home</a> </li>
              <li class="breadcrumb-item active">Transaction</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content" id="dw">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            @card
              @slot('title')

              @endslot

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Product</label>
                    <select name="product_id" id="product_id" class="form-control" width="100%" required>
                      <option value="">Choose</option>
                      @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->code }} - {{ $product->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="number" name="qty" id="qty" value="1" min="1" class="form-control">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary btn-sm">
                      <i class="fa fa-shopping-cart"></i> Add to cart
                    </button>
                  </div>
                </div>
                <div class="col-md-5">
                  <h4>Product Detail</h4>
                  <div v-if="product.name">
                    <table class="table table-stripped">
                      <tr>
                        <th>Code</th>
                        <td>:</td>
                        <td>@{{ product.code }}</td>
                      </tr>
                      <tr>
                        <th width="3%">Product</th>
                        <td width="2%">:</td>
                        <td>@{{ product.name }}</td>
                      </tr>
                      <tr>
                        <th>Price</th>
                        <td>:</td>
                        <td>@{{ product.price | currency }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-md-3" v-if="product.photo">
                  <img :src="'/uploads/product/' + product.photo" height="150px" width="150px" :alt="product.name">
                </div>
              </div>
              @slot('footer')

              @endslot
            @endcard
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>
  <script src="{{ asset('js/transaksi.js') }}"></script>
@endsection
