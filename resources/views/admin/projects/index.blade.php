@extends('layouts.app')
@section('title', 'Portfolio | Index')

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
              <h2 class="m-0">Projects</h2>
            </div>
            <div class="col-6 text-end">
              <a href="#" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i> Trash</a>
              <a href="{{route('admin.projects.create')}}" class="btn btn-outline-dark"><i class="fa-solid fa-plus"></i> Add Project</a>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table">
              <thead class="table-dark text-center lh-lg">
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
                    <a href="{{route('admin.projects.show', $project->id)}}" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-outline-success btn-sm"><i class="fa-solid fa-edit"></i></a>
                    <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST" class="d-inline delete" data-element-name="{{$project->name}}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @empty
                    <tr>
                      <td colspan="6">No item </td>
                    </tr>
                @endforelse
              </tbody>
            </table>
            
          </div>
          <div class="card-footer">
            <div class="m-0">
              {{$projects->links()}}
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
