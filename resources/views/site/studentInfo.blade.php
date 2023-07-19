@extends('site.template')
@section('template')

<?php
// dd($schoolClasses);
?>

<!-- BreadCrumb -->
<section id="breadcrumb">
    <div class="container-ji">
        <div class="box-padding">
            <div class="box">
                <div class="box-content">
                    <h2 class="main-color text-center">School's Name</h2>
                    <h4 class="main-color text-center">Student's Info</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Class Box -->
<section id="class-box">
    <div class="container-ji">
        <div class="card border-0 m-5">
            <div class="row text-center">
                @foreach ($schoolClasses as $schoolClass)
                <div class="col-md-4 mb-5">
                    <a href="{{ asset('getClass') }}">
                        <div class="card-body">
                            <h4>Class: {{ $schoolClass->class }}</h4>
                            <h4 class="text-uppercase">Section: {{ $schoolClass->section }}</h4>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection