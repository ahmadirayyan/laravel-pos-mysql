@extends('layouts.master')

@section('title')
  <title>Order Management</title>
@endsection

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transaction List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="{{ route('home') }}">Home</a> </li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content" id="dw">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            @card
              @slot('title')
                Transaction Filter
              @endslot

              <form action="{{ route('order.index') }}" method="get">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Start Date</label>
                      <input type="text" name="start_date" class="form-control {{ $errors->has('start_date' ? 'is-invalid': '') }}" id="start_date" value="{{ request()->get('start_date') }}">
                    </div>
                    <div class="form-group">
                      <label for="">End Date</label>
                      <input type="text" name="end_date" class="form-control {{ $errors->has('end_date' ? 'is-invalid': '') }}" id="end_date" value="{{ request()->get('end_date') }}">
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary btn-sm">Search</button>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Customer</label>
                      <select name="customer_id" class="form-control">
                        <option value="">Choose</option>
                        @foreach ($customers as $cust)
                          <option value="{{ $cust->id }}" {{ request()->get('customer_id') == $cust->id ? 'selected': '' }}>
                            {{ $cust->name }} - {{ $cust->email }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Cashier</label>
                      <select name="user_id" class="form-control">
                        <option value="">Choose</option>
                        @foreach
                          <option value="{{ $user->id }}" {{ request()->get('user_id') == $user->id ? 'selected': '' }}>
                            {{ $user->name }} - {{ $user->email}}
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </form>
              @slot('footer')

              @endslot
            @endcard
          </div>
          <div class="col-md-12">
            @card
              @slot('title')
                Transaction Data
              @endslot

              <div class="row">
                <div class="col-4">
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h4>{{ $sold }}</h4>
                      <p>Sold Items</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                  </div>
                </div>
                <div class="col-4">
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>Rp {{ number_format($total) }}</h3>
                      <p>Total Sales</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                  </div>
                </div>
                <div class="col-4">
                  <div class="small-box bg-primary">
                    <div class="inner">
                      <h3>{{ $total_customer }}</h3>
                      <p>Customers</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>Invoice</th>
                      <th>Customer</th>
                      <th>Phone</th>
                      <th>Total</th>
                      <th>Cashier</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($orders as $row)
                    <tr>
                      <td><strong>#{{ $row->invoice }}</strong></td>
                      <td>{{ $row->customer->name }}</td>
                      <td>{{ $row->customer->phone}}</td>
                      <td>Rp {{ number_format($row->total) }}</td>
                      <td>{{ $row->user->name }}</td>
                      <td>{{ $row->created_at->format('d-m-Y H:i:s') }}</td>
                      <td>
                        <a href="{{ route('order.pdf', $row->invoice) }}" target="_blank" class="btn btn-primary btn-sm">
                          <i class="fa fa-print"></i>
                        </a>
                        <a href="{{ route('order.excel', $row->invoice) }}" target="_blank" class="btn btn-info btn-sm">
                          <i class="fa fa-file-excel-o"></i>
                        </a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td class="text-center" colspan="7">No data</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
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
  <script>
    $('#start_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#end_date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  </script>
@endsection
