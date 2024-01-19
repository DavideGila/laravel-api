@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>{{$project->title}}</h1>
        <img src="{{asset('storage/' . $project->image)}}" alt="{{$project->title}}">
        <div>
            <p>{{ $project->body }}</p>
            @if($project->category_id)
                <div class="mb-3">
                    <h4>Category</h4>
                    <a class="badge text-bg-primary" href="{{route('admin.categories.show', $project->category->slug)}}">{{$project->category->name}}</a>
                </div>
            @endif
             @if(count($project->technologies) > 0)
                <div class="mb-3">
                    <h4>Technologies</h4>
                    @foreach ($project->technologies as $technology)
                        <a class="badge rounded-pill text-bg-success" href="{{route('admin.technologies.show', $technology->slug)}}">{{$technology->name}}</a>
                    @endforeach

                </div>
            @endif
        </div>

        <button class="btn btn-primary mb-3"><a href="{{route('admin.projects.edit', $project)}}" class="text-white text-decoration-none">Edit</a></button>
        <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger text-white text-decoration-none">Delete</button>
        </form>

    </section>
@endsection
