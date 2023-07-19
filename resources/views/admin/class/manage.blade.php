@extends('layouts.app')

@section('content')

<?php
// dd($schoolClasses);
?>

<section id="main-content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Class</h5>
                    </div>
                    <div class="col-md-4">
                        <h5 class="text-danger">Try Not To Delete. It will Permanently Delete From Database.(Can't
                            Restore)</h5>
                    </div>
                    <div class="col-md-4 text-end">
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#addClassModal">Add Class</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table btable-stripped">
                    <thead>
                        <tr>
                            <th>Class</th>
                            <th class="text-center">Section</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schoolClasses as $schoolClass)
                        <tr>
                            <td>{{ $schoolClass->class }}</td>
                            <td class="text-center text-uppercase">{{ $schoolClass->section }}</td>
                            <td class="text-end">
                                <a href="{{ route('geteditClass', $schoolClass->slug) }}"><button
                                        class="btn btn-success btn-sm">Edit</button></a>
                                <a href="{{ route('getdeleteClass', $schoolClass->slug) }}"><button
                                        class="btn btn-danger btn-sm">Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>



<!-- Modal -->
<div class="modal fade" id="addClassModal" tabindex="-1" aria-labelledby="addClassModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addProductModalLabel"><b>Add Class</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('postaddClass') }}" method="POST">
                    <div class="row">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="">Class*</label>
                                <input type="text" name="class"
                                    class="form-control @error('class') is-invalid @enderror" id="class"
                                    placeholder="Enter Class" value="{{ old('class') }}" required />
                                @error('class')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="">Section*</label>
                                <select name="section" id="section"
                                    class="form-control @error('section') is-invalid @enderror"
                                    value="{{ old('section') }}" required>
                                    <option value="">-- Select Section --</option>
                                    <option value="sun">SUN</option>
                                    <option value="moon">MOON</option>
                                    <option value="star">STAR</option>
                                </select>
                                @error('section')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Add Class">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection