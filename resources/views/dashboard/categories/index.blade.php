@extends('dashboard.layouts.main')

@section('container')
    <div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Category</h1>
    </div>
    
    @if (session()->has('success'))
      <div class="alert alert-success col-lg-9" role="alert">
        {{ session('success')}}
      </div>
    @endif
    <div class="table-responsive col-lg-9">
      <a href="/dashboard/categories/create" class="btn btn-sm btn-primary mb-3"> create new category 🎞️</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Category Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $category->name }}</td>
              <td>


                {{-- edit data --}}
                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge rounded-pill bg-warning">
                    <span data-feather="edit" class="align-text-bottom"></span>
                </a>

                {{-- hapus data --}}
                <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
                  @csrf
                  @method('delete') {{-- digunakan untuk menimpa method, jadi yang awalanya post mennjadi delete --}}
                  <button type="submit" class="badge rounded-pill bg-danger border-0" onclick="return confirm('are you sure??')">
                      <span data-feather="x-circle" class="align-text-bottom"></span>
                  </button>
                </form>

              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
    </div>

@endsection