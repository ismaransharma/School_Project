@extends('layouts.app')
@section('content')

<?php
// dd($schoolClasses);
?>


<section id="student-edit">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Edit Student Info - {{ $StudentInfo->slug }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('posteditStudent', $StudentInfo->slug) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="">Student Name*</label>
                                <input type="text" name="student_name"
                                    class="form-control @error('student_name') is-invalid @enderror" id="student_name"
                                    placeholder="Enter Student Name" value="{{ $StudentInfo->student_name }}"
                                    required />
                                @error('student_name')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="class">Class</label>
                                <select name="class" id="class" class="form-control" required>
                                    <option value="">-----------Choose Class-----------</option>
                                    <option value="1" <?php if($StudentInfo->class == '1') {echo('selected');} ?>>1
                                    </option>
                                    <option value="2" <?php if($StudentInfo->class == '2') {echo('selected');} ?>>
                                        2</option>
                                    <option value="3" <?php if($StudentInfo->class == '3') {echo('selected');} ?>>
                                        3</option>
                                    <option value="4" <?php if($StudentInfo->class == '4') {echo('selected');} ?>>4
                                    </option>
                                    <option value="5" <?php if($StudentInfo->class == '5') {echo('selected');} ?>>
                                        5</option>
                                    <option value="6" <?php if($StudentInfo->class == '6') {echo('selected');} ?>>
                                        6</option>
                                    <option value="7" <?php if($StudentInfo->class == '7') {echo('selected');} ?>>
                                        7</option>
                                    <option value="8" <?php if($StudentInfo->class == '8') {echo('selected');} ?>>8
                                    </option>
                                    <option value="9" <?php if($StudentInfo->class == '9') {echo('selected');} ?>>
                                        9</option>
                                    <option value="10" <?php if($StudentInfo->class == '10') {echo('selected');} ?>>
                                        10</option>
                                </select>
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
                                    <?php if($StudentInfo->section == 'sun') {echo('selected');} ?>>SUN</option>
                                    <option value="moon"
                                        <?php if($StudentInfo->section == 'moon') {echo('selected');} ?>>
                                        MOON</option>
                                    <option value="star"
                                        <?php if($StudentInfo->section == 'star') {echo('selected');} ?>>
                                        STAR</option>
                                </select>
                                @error('section')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="">Father's Name*</label>
                                <input type="text" name="father_name"
                                    class="form-control @error('father_name') is-invalid @enderror" id="father_name"
                                    placeholder="Enter Father's Name" value="{{ $StudentInfo->father_name }}"
                                    required />
                                @error('father_name')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="">Father's Occupation*</label>
                                <input type="text" name="father_occupation"
                                    class="form-control @error('father_occupation') is-invalid @enderror"
                                    id="father_occupation" placeholder="Enter Father's Occupation"
                                    value="{{ $StudentInfo->father_occupation }}" required />
                                @error('father_name')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="">Father's Contact*</label>
                                <input type="number" name="father_contact"
                                    class="form-control @error('father_contact') is-invalid @enderror"
                                    id="father_contact" placeholder="Enter Father's Contact"
                                    value="{{ $StudentInfo->father_contact }}" required />
                                @error('father_contact')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="">Mother's Name*</label>
                                <input type="text" name="mother_name"
                                    class="form-control @error('mother_name') is-invalid @enderror" id="mother_name"
                                    placeholder="Enter Mother's Name" value="{{ $StudentInfo->mother_name }}"
                                    required />
                                @error('mother_name')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="">Father's Occupation*</label>
                                <input type="text" name="mother_occupation"
                                    class="form-control @error('mother_occupation') is-invalid @enderror"
                                    id="mother_occupation" placeholder="Enter Mother's Occupation"
                                    value="{{ $StudentInfo->mother_occupation }}" required />
                                @error('mother_occupation')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="">Mother's Contact*</label>
                                <input type="number" name="mother_contact"
                                    class="form-control @error('mother_contact') is-invalid @enderror"
                                    id="mother_contact" placeholder="Enter Mother's Contact"
                                    value="{{ $StudentInfo->mother_contact }}" required />
                                @error('mother_contact')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="">Permanent Address (District)*</label>
                                <input type="text" name="permanent_district"
                                    class="form-control @error('permanent_district') is-invalid @enderror"
                                    id="permanent_district" placeholder="Enter Permanent District"
                                    value="{{ $StudentInfo->permanent_district }}" required />
                                @error('permanent_district')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="">Permanent Address (Municipality)*</label>
                                <input type="text" name="permanent_municipality"
                                    class="form-control @error('permanent_municipality') is-invalid @enderror"
                                    id="permanent_municipality" placeholder="Enter Permanent Municipality"
                                    value="{{ $StudentInfo->permanent_municipality }}" required />
                                @error('permanent_municipality')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="">Permanent Address (Ward No.)*</label>
                                <input type="number" name="permanent_ward_no"
                                    class="form-control @error('permanent_ward_no') is-invalid @enderror"
                                    id="permanent_ward_no" placeholder="Enter Permanent Ward No."
                                    value="{{ $StudentInfo->permanent_ward_no }}" required />
                                @error('permanent_ward_no')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="">Permanent Address (Tole)*</label>
                                <input type="text" name="permanent_tole"
                                    class="form-control @error('permanent_tole') is-invalid @enderror"
                                    id="permanent_tole" placeholder="Enter Permanent Tole"
                                    value="{{ $StudentInfo->permanent_tole }}" required />
                                @error('permanent_tole')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="">Current Address (District)*</label>
                                <input type="text" name="current_district"
                                    class="form-control @error('current_district') is-invalid @enderror"
                                    id="current_district" placeholder="Enter Current District"
                                    value="{{ $StudentInfo->current_district }}" required />
                                @error('current_district')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="">Current Address (Municipality)*</label>
                                <input type="text" name="current_municipality"
                                    class="form-control @error('current_municipality') is-invalid @enderror"
                                    id="current_municipality" placeholder="Enter Current Municipality"
                                    value="{{ $StudentInfo->current_municipality }}" required />
                                @error('current_municipality')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="">Current Address (Ward No.)*</label>
                                <input type="number" name="current_ward_no"
                                    class="form-control @error('current_ward_no') is-invalid @enderror"
                                    id="current_ward_no" placeholder="Enter Current Ward No."
                                    value="{{ $StudentInfo->current_ward_no }}" required />
                                @error('current_ward_no')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="">Current Address (Tole)*</label>
                                <input type="text" name="current_tole"
                                    class="form-control @error('current_tole') is-invalid @enderror" id="current_tole"
                                    placeholder="Enter Current Tole" value="{{ $StudentInfo->current_tole }}"
                                    required />
                                @error('current_tole')
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
</section>

@endsection