@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
  <div class="col-sm-6">
    <div class="mb-3">
      <a href="{{ route('books.index') }}">Kembali</a>
    </div>
    <div class="card">
      <div class="card-header text-center">
        <h5 class="mb-0">Tambah Buku</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          @include('books._form')

          <div class="d-grid">
            <button class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection