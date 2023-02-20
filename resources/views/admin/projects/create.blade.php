@extends('layouts.admin')

@section('title', 'Create New Project')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            @include('admin.projects.partials.form', ['route' => 'admin.projects.store','method' => 'POST', 'project' => $project])
        </div>
    </div>
</div>
@endsection