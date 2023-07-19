@extends('site.template')
@section('template')

<?php
// dd($studentInfo);
?>

<!-- BreadCrumb -->
<section id="breadcrumb">
    <div class="container-ji">
        <div class="box-padding">
            <div class="box">
                <div class="box-content">
                    <h2 class="main-color text-center">School's Name</h2>
                    <h4 class="main-color text-center">
                        Student's Info / Class: 11 / Section: Sun
                    </h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Search Section -->
<section id="search" class="my-2">
    <div class="container-ji">
        <form action="">
            <input class="search-area" type="search" placeholder="Search Student by their Name" />
            <input class="search-button" type="submit" value="🔍" />
        </form>
    </div>
</section>

<!-- Table Section -->
<section id="table">
    <div class="container-ji">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">S.N</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Section</th>
                    <th scope="col">Father's Name</th>
                    <th scope="col">Mother's Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentInfo as $student)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->student_name }}</td>
                    <td class="text-uppercase">{{ $student->class }}</td>
                    <td>{{ $student->section }}</td>
                    <td>{{ $student->father_name }}</td>
                    <td>{{ $student->mother_name }}</td>
                    <td>{{ $student->father_contact . ',' . $student->mother_contact }}</td>
                    <td>{{ $student->current_municipality . '-' . $student->current_ward_no . ',' . $student->current_tole . ',' . $student->current_district }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection