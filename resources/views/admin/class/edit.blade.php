@extends('layouts.app')

@section('content')

<?php
// dd($schoolClasses);
?>

<section id="class-edit">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Edit Class - '{{ $schoolClasses->slug }}'</h5>
            </div>
            <div class="card-body">
                <div class="modal-body">
                    <form action="{{ route('posteditClass', $schoolClasses->slug) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">Class*</label>
                                    <input type="text" name="class"
                                        class="form-control @error('class') is-invalid @enderror" id="class"
                                        placeholder="Enter Class" value="{{ $schoolClasses->class }}" required />
                                    @error('class')
                                    <span class=" invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="">Section*</label>
                                    <select name="section" id="section"
                                        class="form-control @error('section') is-invalid @enderror""
                                required>
                                <option value="">-- Select Section --</option>
                                <option value=" sun"
                                        <?php if($schoolClasses->section == 'sun') {echo('selected');} ?>>SUN</option>
                                        <option value="moon"
                                            <?php if($schoolClasses->section == 'moon') {echo('selected');} ?>>
                                            MOON</option>
                                        <option value="star"
                                            <?php if($schoolClasses->section == 'star') {echo('selected');} ?>>
                                            STAR</option>
                                    </select>
                                    @error('section')
                                    <span class=" invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Save changes">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection