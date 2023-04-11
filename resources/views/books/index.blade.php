@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header d-flex align-items-center justify-content-between">
    <h5 class="mb-0">Data Buku</h5>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Add Buku</a>
  </div>
  <div class="card-body">

    {{-- Check if session has success message --}}
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    {{-- Filter data by row & searching --}}
    <div class="mb-3">
      <form>
        <div class="row">
          <div class="col-12 col-sm-auto mb-3 mb-sm-0">
            <select name="row" id="row" class="form-select" onchange="this.form.submit()">
              <option value="10" {{ request()->row == 10 ? 'selected' : '' }}>10</option>
              <option value="25" {{ request()->row == 25 ? 'selected' : '' }}>25</option>
              <option value="50" {{ request()->row == 50 ? 'selected' : '' }}>50</option>
              <option value="100" {{ request()->row == 100 ? 'selected' : '' }}>100</option>
            </select>
          </div>
          <div class="col-sm-3">
            <select name="category" class="form-control" onchange="this.form.submit()">
              <option value="">All Category</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request()->category == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-12 col-sm-4 ms-auto">
            <input type="text" name="search" id="search" class="form-control" placeholder="Search..." value="{{ request()->search }}">
          </div>
        </div>
      </form>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Image</th>
            <th>Title</th>
            <th>Publisher</th>
            <th>Qty</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          {{-- Check if data is available --}}
          @if ($books->count() > 0)

            {{-- Looping data --}}
            @foreach ($books as $book)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <img src="{{ $book->image_url }}" class="img-fluid" style="height: 40px;" alt="">
                </td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->qty }}</td>
                <td>{{ $book->category->name }}</td>
                <td class="d-flex gap-1">
                  {{-- Action Button Here --}}
                  <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-success">Edit</a>
                  <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                  </form>  
                </td>
              </tr>
            @endforeach
          @else

            {{-- If data is not available --}}
            <tr>
              <td colspan="7" class="text-center">No data available</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>

    {{-- Pagination --}}
    {{ $books->links() }}

  </div>
</div>
@endsection