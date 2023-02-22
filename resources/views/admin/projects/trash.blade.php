@extends('layouts.app')
@section('title', 'Portfolio | Index')
@section('alert')
<link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
@endsection
@section('content')
<div class="container">
    <div class="row">
      @if (session('info-message'))
      <div class="col-12">
          <div class="alert alert-{{session('alert')}}">
              {{session('info-message')}}
          </div>
      </div>
      @endif
      <div class="card p-0">
        <div class="card-header">
          <div class="row">
            <div class="col-6">
              <h2 class="m-0">Trash</h2>
            </div>
            <div class="col-6 text-end">
              <a href="#" class="btn btn-outline-dark"><i class="fa-solid fa-boxes-packing"></i> Restore</a>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table">
              <thead class="table-dark lh-lg">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Publication Date</th>
                  <th scope="col">Complexity</th>
                  <th scope="col">Language Used</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($projects as $project)
                <tr>
                  <th scope="row">{{$project->id}}</th>
                  <td>{{$project->name}}</td>
                  <td>{{$project->publication_date}}</td>
                  <td class="text-secondary">
                    @for ($i = 0; $i < 5; $i++)
                    <span class="fa-star {{($i < $project->complexity) ? 'fas' : 'far'}}"></span>
                    @endfor
                  </td>
                  <td>{{$project->language_used}}</td>
                  <td class="text-center">
                    <form action="{{route('admin.forcedelete', $project->id)}}" method="POST" class="d-inline delete double-confirm" data-element-name="{{$project->name}}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @empty
                    <tr>
                      <td colspan="6" class="text-center">No item </td>
                    </tr>
                @endforelse
              </tbody>
            </table>
            
          </div>
          <div class="card-footer text-end">
            <div class="m-0 ">
              <a href="{{route('admin.projects.index')}}" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
@section('scripts')
    @vite('resources/js/deleteConfirm.js')
@endsection