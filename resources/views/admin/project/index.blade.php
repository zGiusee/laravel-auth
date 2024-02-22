@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">
            @include('admin.partials.dashboard_nav')

            {{-- PROJECTS TABLE --}}
            <div class="col-12">
                <div class="py-3">
                    <table class="table my-mt-80">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Repository Link</th>
                                <th scope="col">Starting Date</th>
                                <th scope="col">Ending Date</th>
                                <th scope="col">Image Link</th>
                                <th scope="col">Slug</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <th scope="row">{{ $project->id }}</th>
                                    <td>
                                        <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">
                                            {{ $project->name }}
                                        </a>
                                    </td>
                                    <td>{{ Str::limit($project->description, 50, '...') }}</td>
                                    <td>{{ Str::limit($project->repository_link, 30, '...') }}</td>
                                    <td>{{ $project->date_start }}</td>
                                    <td>{{ $project->date_end }}</td>
                                    <td>{{ Str::limit($project->img, 20, '...') }}</td>
                                    <td>{{ $project->slug }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
