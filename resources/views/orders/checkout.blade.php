@extends('layouts.master')

@section('title')
  <title>Checkout</title>
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
            <h1 class="m-0 text-dark">Checkout</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{ route('home') }}">Home</a> </li>
              <li class="breadcrumb-item"> <a href="{{ route('order.transaksi') }}">Transaction</a> </li>
              <li class="breadcrumb-item active">Checkout</li>
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
                <h4 class="card-title">Customer Data</h4>
              @endslot

              <div v-if="message" class="alert alert-success">
                We accepted your transaction, Invoice: <strong>#@{{ message }}</strong>
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" v-model="customer.email" class="form-control" @keyup.enter.prevent="searchCustomer" required>
                <p>Press enter to check email availability.</p>
              </div>
              <div v-if="formCustomer">
                <div class="form-group">
                  <label for="">Customer Name</label>
                  <input type="text" name="name" v-model="customer.name" :disabled="resultStatus" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="">Address</label>
                  <textarea name="address" rows="5" cols="5" class="form-control" :disabled="resultStatus" v-model="customer.address" required></textarea>
                </div>
                <div class="form-group">
                  <label for="">Phone Number</label>
                  <input type="text" name="phone" v-model="customer.phone" :disabled="resultStatus" class="form-control" required>
                </div>
              </div>
              @slot('footer')
                <div class="card-footer text-muted">
                  <div v-if="errorMessage" class="alert alert-danger">
                    @{{ errorMessage }}
                  </div>
                  <button class="btn btn-primary btn-sm float-right" :disabled="submitForm" @click.prevent="sendOrder">
                    @{{ submitForm ? 'Loading...': 'Order Now' }}
                  </button>
                </div>
              @endslot
            @endcard
          </div>
          @include('orders.cart')
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
