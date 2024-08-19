<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hall Reservation</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">HALL RESERVATION</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->

        <!-- sign in -->
        @extends('layouts.app')

        @section('content')
                        <div>
                            @if (session('status'))
                                <div role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        
        @endsection
        <!-- sign in -->

        <!-- Table View Start -->
        <div class="container">
            <h1>Level-I Table</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hall ID</th>
                            <th>Level</th>
                            <th>Subject ID</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Visible</th>
                            <th>Message</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                        </tr>
                    </thead>
                        <tbody>
                        @foreach($data as $row)
                        <tr class="table-row" 
                            data-id="{{ $row->id }}" 
                            data-hall-id="{{ $row->hall_id }}" 
                            data-level="{{ $row->level }}" 
                            data-subject-id="{{ $row->subject_id }}"
                            data-date="{{ $row->date }}"
                            data-start-time="{{ $row->start_time }}"
                            data-end-time="{{ $row->end_time }}"
                            data-is-visible="{{ $row->is_visible }}"
                            data-message="{{ $row->message }}">
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->hall_id }}</td>
                            <td>{{ $row->level }}</td>
                            <td>{{ $row->subject_id }}</td>
                            <td>{{ $row->date }}</td>
                            <td>{{ $row->start_time}}</td>
                            <td>{{ $row->end_time }}</td>
                            <td>{{ $row->is_visible ? 'Yes' : 'No' }}</td>
                            <td>{{ $row->message }}</td>
                            <td>{{ $row->insert_date }}</td>
                            <td>{{ $row->update_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Table View End -->

        <!-- Search Start -->
        <div class="container-fluid custom-bg mb-5">
            <div class="container">
                <form action="{{ url('/home') }}" method="GET">
                    <div class="row custom-row align-items-center justify-content-center">
                        <div class="col-md-4">
                            <input type="text" name="hall_id" class="form-control custom-input" placeholder="Hall Id">
                        </div>
                        <div class="col-md-4">
                            <select name="level" class="form-select custom-input">
                                <option value="">Select Level</option>
                                <option value="Level-I">Level-I</option>
                            </select>
                        </div>
                        <div class="col-md-2 custom-button-container">
                            <a class="btn custom-button" onclick="return emptyness()">Search</a>
                            <a href="{{ url('/home') }}" class="btn custom-clear-button">Clear</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Search End -->


        <!-- Data Form Start -->
        <div class="container-form">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form class="form" id="dataEntryForm" action="{{ url('/home') }}" method="POST">
                @csrf
                <h3 class="heading-data-entry-form">Data Entry Form</h3>

                <div class="form-row">
                    <label for="hall_id" class="hall_id">Hall ID:</label>
                    <input type="text" id="hall_id" name="hall_id" required>
                </div>

                <div class="form-row">
                    <label for="level" class="level">Level:</label>
                    <select id="level" class="level" name="level" required>
                        <option value="">Select Level</option>
                        <option value="Level-I">Level-I</option>
                        <!-- Add other levels as needed -->
                    </select>
                </div>

                <div class="form-row">
                    <label for="subject_id" class="subid">Subject ID:</label>
                    <input type="text" class="subid" id="subject_id" name="subject_id">
                </div>

                <div class="form-row">
                    <label for="date" class="date">Date:</label>
                    <select id="date" class="date" name="date" required>
                        <option value="">Select day</option>
                        <option value="Saturday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                    </select>
                </div>

                <div class="form-row">
                    <label for="start_time" class="sTime">Start Time:</label>
                    <input type="time" class="sTime" id="start_time" name="start_time" required>
                </div>

                <div class="form-row">
                    <label for="end_time" class="eTime">End Time:</label>
                    <input type="time" class="eTime" id="end_time" name="end_time" required>
                </div>

                <div class="form-row">
                    <label for="is_visible" class="visibility">Visibility:</label>
                    <input type="checkbox" class="visibility" id="is_visible" name="is_visible">
                </div>

                <div class="form-row">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" cols="50" disabled></textarea>
                </div>


                <!-- Buttons -->
                <div class="form-row">
                    <button type="submit">Add</button>
                    <button type="button">Update</button>
                    <button type="button">Delete</button>
                    <button type="button" onclick="clearForm()">Clear</button>
                </div>
            </form>
        </div>
        <!-- Data Form End -->

                <!-- Table View Start -->
                <div class="container">
            <h1>Request Table</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hall ID</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Purpose</th>
                            <th>Status</th>
                            <th>Requested Date</th>
                            <th>Respond Date</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                        <tbody>
                        @foreach($data as $row)
                        <tr class="table-row">
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Table View End -->

        <!-- Footer Start -->
        <div class="footer bg-dark text-white-50 pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="copyright">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">DCS - University of Ruhuna</a>, All Right Reserved. 
                        </div>
                        <div class="col-md-6 text-center text-md-end footer-social">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
