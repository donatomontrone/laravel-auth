@extends('layouts.app')
@section('title', $project->name)
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('info-message'))
        <div class="col-12">
            <div class="alert alert-{{session('alert')}}">
                {{session('info-message')}}
            </div>
        </div>
        @endif
        <div class="col-6">
            <div class="card text-center">
                <div class="card-header d-flex justify-content-between">
                    <p class="d-inline m-0">{{$project->language_used}}</p>
                    <p class="d-inline-block m-0">
                        @for ($i = 0; $i < 5; $i++)
                        <span class="fa-star {{($i < $project->complexity) ? 'fas' : 'far'}}"></span>
                        @endfor</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$project->name}}</h5>
                    <div class="card-img">
                        <img src="{{$project->preview}}" alt="preview of {{$project->name}}">
                    </div>
                    <p class="card-body">GitHub Link : <a href="{{$project->github_url}}">{{$project->github_url}}</a></p>
                    <div class="buttons d-flex justify-content-around">
                        <a href="{{route('admin.projects.index')}}" class="btn btn-outline-primary"><i class="fa-solid fa-caret-left"></i> Prev</a>
                        <div class="center-buttons">
                            <a href="{{route('admin.projects.index')}}" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i> Back</a>
                            <a href="#" class="btn btn-outline-warning"><i class="fa-solid fa-edit"></i> Edit</a>
                            <a href="#" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                        </div>
                        <a href="{{route('admin.projects.index')}}" class="btn btn-outline-primary">Next <i class="fa-solid fa-caret-right"></i> </a>
                    </div>
                </div>
                    <div class="card-footer text-muted">
                    {{$project->publication_date}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
