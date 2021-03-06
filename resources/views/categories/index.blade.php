@extends('layouts.master')

@section('title')
  <title>Category Management</title>
@endsection

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a href="#">Home</a> </li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            @card
              @slot('title')
                Add
              @endslot

              @if (session('error'))
                @alert(['type' => 'danger'])
                  {!! session('error') !!}
                @endalert
              @endif

              <form role="form" action="{{ route('kategori.store') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="name">Category</label>
                  <input class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" name="name" type="text" id="name" required>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" name="description" id="description" rows="5" cols="5"></textarea>
                </div>

              @slot('footer')
                  <div class="card-footer">
                    <button class="btn btn-primary">Save</button>
                  </div>
              </form>
              @endslot
            @endcard
          </div>
          <div class="col-md-8">
            @card
              @slot('title')
                Category List
              @endslot

              @if (session('success'))
                @alert(['type' => 'success'])
                  {!! session('success') !!}
                @endalert
              @endif

              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <td>#</td>
                      <td>Category</td>
                      <td>Description</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @forelse ($categories as $row)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->description }}</td>
                      <td>
                        <form action="{{ route('kategori.destroy', $row->id) }}" method="post">
                          @csrf
                          <input type="hidden" name="_method" value="delete">
                          <a href="{{ route('kategori.edit', $row->id) }}" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> </a>
                          <button class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </button>
                        </form>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="4" class="text-center">Empty</td>
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
