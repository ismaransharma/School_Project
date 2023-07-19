@extends('layouts.app')

@section('content')

<?php
// dd($StudentInfos);
?>

<section id="student-info">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Students</h5>
                    </div>
                    <div class="col-md-4">
                        <h5 class="text-danger">Try Not To Delete. It will Permanently Delete From Database.(Can't
                            Restore)</h5>
                    </div>
                    <div class="col-md-4 text-end">
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#addStudentModal">Add Students</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table btable-stripped">
                    <thead>
                        <tr class="text-center">
                            <th>S.N</th>
                            <th>Student Name</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th style="width: 110px;">Father's Name</th>
                            <th>Mother's Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($StudentInfos as $StudentInfo)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td style="width: 121px;">{{ $StudentInfo->student_name }}</td>
                            <td>{{ $StudentInfo->class }}</td>
                            <td class="text-uppercase">{{ $StudentInfo->section }}</td>
                            <td style="width: 121px;">{{ $StudentInfo->father_name }}</td>
                            <td style="width: 121px;">{{ $StudentInfo->mother_name }}</td>
                            <td>{{ $StudentInfo->father_contact . ',' . $StudentInfo->mother_contact}}
                            </td>
                            <td>{{ $StudentInfo->current_municipality . '-' . $StudentInfo->current_ward_no . ',' . $StudentInfo->current_tole . ',' . $StudentInfo->current_district  }}
                            </td>
                            <td>
                                <div class="view-edit my-1">
                                    <a href="{{ route('geteditStudent', $StudentInfo->slug) }}"><button
                                            class="btn btn-success btn-sm">View/Edit</button></a>
                                </div>
                                <div class="delete">
                                    <a href="{{ route('getdeleteStudent', $StudentInfo->slug) }}"><button
                                            class="btn btn-danger btn-sm">Delete</button></a>
                                </div>
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
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addProductModalLabel"><b>Add Student</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('postaddStudent') }}" method="POST">
                    <div class="row">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="">Student Name*</label>
                                <input type="text" name="student_name"
                                    class="form-control @error('student_name') is-invalid @enderror" id="student_name"
                                    placeholder="Enter Student Name" value="{{ old('student_name') }}" required />
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
                                    @foreach ($schoolClasses as $schoolClass)
                                    <option value="{{ $schoolClass }}">{{ $schoolClass }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="">Father's Name*</label>
                                <input type="text" name="father_name"
                                    class="form-control @error('father_name') is-invalid @enderror" id="father_name"
                                    placeholder="Enter Father's Name" value="{{ old('father_name') }}" required />
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
                                    value="{{ old('father_occupation') }}" required />
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
                                    id="father_contact" placeholder="Enter Father Contact"
                                    value="{{ old('father_contact') }}" required />
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
                                    placeholder="Enter Mother's Name" value="{{ old('mother_name') }}" required />
                                @error('mother_name')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="">Mother's Occupation*</label>
                                <input type="text" name="mother_occupation"
                                    class="form-control @error('mother_occupation') is-invalid @enderror"
                                    id="mother_occupation" placeholder="Enter Mother's Occupation"
                                    value="{{ old('mother_occupation') }}" required />
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
                                    value="{{ old('mother_contact') }}" required />
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
                                    value="{{ old('permanent_district') }}" required />
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
                                    value="{{ old('permanent_municipality') }}" required />
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
                                    value="{{ old('permanent_ward_no') }}" required />
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
                                    value="{{ old('permanent_tole') }}" required />
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
                                    value="{{ old('current_district') }}" required />
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
                                    value="{{ old('current_municipality') }}" required />
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
                                    value="{{ old('current_ward_no') }}" required />
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
                                    placeholder="Enter Current Tole" value="{{ old('current_tole') }}" required />
                                @error('current_tole')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Add Student">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection