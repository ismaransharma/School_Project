<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>School</title>

    <!-- FontAwesome Css -->
    <link rel="stylesheet" href="{{ asset('site/fontawesome/all.css') }}" />

    <!-- Bootstrap Css-->
    <link rel="stylesheet" href="{{ asset('site/bootstrap/bootstrap.css') }}" />

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('site/css/style.css')  }}" />
</head>

<body>
    <!-- Top Header -->
    <section id="top-header">
        <div class="container-ji">
            <div class="top-header-content">
                <div class="row m-0">
                    <div class="col-md-8">
                        <a href="#" class="d-block" style="width: 285px">
                            <h4 class="school-name">
                                Little Angel's High School
                            </h4>
                        </a>
                    </div>
                    <div class="col-md-2 text-end">
                        <h6 class="school-name">
                            <a href="#">
                                <span class="school-name"> Routine </span>
                            </a>
                        </h6>
                    </div>
                    <div class="col-md-2">
                        <a href="#">
                            <h6 class="school-name">Calendar</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NavBar -->
    <section id="top-header-navbar">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto text-center">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Admission</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Activities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Events</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link student-info" href="{{ route('getStudentInfo') }}">Student's Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Teacher's Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    @yield('template')



    <!-- FontAwesome Js -->
    <script src="{{ asset('site/fontawesome/all.js') }}"></script>

    <!-- Bootstrap Js -->
    <script src="{{ asset('site/bootstrap/bootstrap.js') }}"></script>
</body>

</html>