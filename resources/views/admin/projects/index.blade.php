@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <table class="table">
            <thead class="table-dark text-center lh-lg">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Publication Date</th>
                <th scope="col">Complexity</th>
                <th scope="col">Language Used</th>
                <th scope="col"><a href="#" class="btn btn-light"><i class="fa-solid fa-plus"></i> Add Project</a></th>
              </tr>
            </thead>
            <tbody>
              @forelse ($projects as $project)
              <tr>
                <th scope="row">{{$project->id}}</th>
                <td>{{$project->name}}</td>
                <td>{{$project->publication_date}}</td>
                <td>
                  @for ($i = 0; $i < 5; $i++)
                  <span class="fa-star {{($i < $project->complexity) ? 'fas' : 'far'}}"></span>
                  @endfor
                </td>
                <td>{{$project->language_used}}</td>
                <td class="text-center">
                  <a href="#" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                  <a href="#" class="btn btn-outline-success btn-sm"><i class="fa-solid fa-edit"></i></a>
                  <form action="#" method="post" class="d-inline">
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
</div>
@endsection
