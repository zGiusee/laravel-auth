@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">
            @include('admin.partials.dashboard_nav')

            {{-- PROJECTS TABLE --}}
            <div class="col-12">
                <div class="py-3">
                    <table class="table my-table-styles my-mt-80">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Repository Link</th>
                                <th scope="col">Starting Date</th>
                                <th scope="col">Ending Date</th>
                                <th scope="col">Image Link</th>
                                {{-- <th scope="col">Slug</th> --}}
                                <th scope="col">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    {{-- TABLE PROPERTIES --}}
                                    <th scope="row">{{ $project->id }}</th>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ Str::limit($project->description, 50, '...') }}</td>
                                    <td>{{ Str::limit($project->repository_link, 30, '...') }}</td>
                                    <td>{{ $project->date_start }}</td>
                                    <td>{{ $project->date_end }}</td>
                                    <td>{{ Str::limit($project->img, 20, '...') }}</td>
                                    {{-- <td>{{ $project->slug }}</td> --}}

                                    {{-- TOOLS --}}
                                    <td>
                                        {{-- REDIRECT TO DETAIL PAGE --}}
                                        <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>

                                        {{-- REDIRECT TO MODIFY PAGE --}}
                                        <a href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>

                                        {{-- DELETE BUTTON --}}
                                        <button href="">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
