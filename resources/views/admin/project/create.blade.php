@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">
            {{-- BUTTONS --}}
            <div class="col-12">
                <div class="text-center">
                    <div>
                        <a href="{{ route('admin.projects.create') }}">
                            Add project
                        </a>
                    </div>
                </div>
            </div>

            {{-- PROJECTS CREATION FORM --}}
            <div class="col-12">
                <div class="py-3">
                    <form action="{{ route('admin.projects.store') }}" method="post">
                        @csrf

                        <div class="container">
                            <div class="row">

                                {{-- PROJECT NAME --}}
                                <div class="col-6">
                                    <label for="name">Project name:</label>
                                    <input required max="150" type="text" name="name" id="name"
                                        placeholder="Name" value="{{ old('name') }}">
                                    @error('name')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- PROJECT DESCRIPTION --}}
                                <div class="col-6">
                                    <label for="description">Project Description:</label>
                                    <textarea required name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- REPOSITORY LINK --}}
                                <div class="col-6">
                                    <label for="repository_link">Repository link:</label>
                                    <input required type="text" name="repository_link" id="repository_link"
                                        placeholder="Repository link" value="{{ old('repository_link') }}">
                                    @error('repository_link')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- PROJECT IMAGE LINK --}}
                                <div class="col-6">
                                    <label for="img">Project image link:</label>
                                    <input max="255" type="text" name="img" id="img"
                                        placeholder="Image link" value="{{ old('img') }}">
                                    @error('img')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- STARTING DATE --}}
                                <div class="col-3">
                                    <label for="date_start">Starting date</label>
                                    <input required type="date" name="date_start" id="date_start">
                                    @error('date_start')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- ENDING DATE --}}
                                <div class="col-3">
                                    <label for="date_end">Ending date</label>
                                    <input type="date" name="date_end" id="date_end">

                                </div>

                                <div class="col-12">
                                    <button type="submit">Invia</button>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
