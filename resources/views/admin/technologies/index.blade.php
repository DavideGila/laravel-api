@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Technologies List</h1>
        <div class="row">
            @foreach ($technologies as $technology)
                <div class="col-6">
                    <h2><a href="{{ route('admin.technologies.show', $technology) }}">{{ $technology->name }}</a></h2>
                    <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger text-white text-decoration-none">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a
                href="{{ route('admin.technologies.create', $technology) }}"class="text-white text-decoration-none btn btn-primary">Crea</a>
        </div>

    </section>
@endsection
