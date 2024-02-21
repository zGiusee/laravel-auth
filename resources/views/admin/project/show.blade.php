@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="py-5">
                    <table class="table">
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

                            <tr>
                                <th scope="row">{{ $project->id }}</th>
                                <td>
                                    <a>
                                        {{ $project->name }}
                                    </a>
                                </td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->repository_link }}</td>
                                <td>{{ $project->date_start }}</td>
                                <td>{{ $project->date_end }}</td>
                                <td>{{ $project->img }}</td>
                                <td>{{ $project->slug }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
