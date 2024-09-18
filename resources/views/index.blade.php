
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
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">Lecture Hall Reservation</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('index') }}" class="nav-item nav-link active">Home</a>
                        <a href="/contact" class="nav-item nav-link">Contact</a>
            </nav>
        </div>
        <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Department of Computer Science<span class="text-primary"><br> Lecture Hall Management System</span></h1>
                    <p class="animated fadeIn mb-4 pb-2">Easily reserve, track, and manage lecture halls for your events. Stay updated with timetables and special allocations. Simplifying your univeristy scheduling experience</p>
                    <!-- <a href="" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a> -->
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/uor1.jpg" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/uor2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Category Start -->
        <div class="custom-timetable-container">
            <div class="custom-timetable-header">
                <h1 class="title">Lecture Time Table</h1>
                <p class="description">Explore the current lecture hall schedule. View available time slots and upcoming events to plan your bookings accordingly</p>
            </div>
            <div class="custom-timetable-content">
                <h2 class="subtitle">Schedule for Level-I - ({{ \Carbon\Carbon::now('Asia/Colombo')->format('Y/m/d') }})</h2>

                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hall ID</th>
                            <th>Level</th>
                            <th>Subject ID</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($rows->isEmpty())
                            <tr>
                                <td colspan="7" class="no-data">No data available for today.</td>
                            </tr>
                        @else
                            @foreach($rows as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->hall_id }}</td>
                                <td>{{ $row->level }}</td>
                                <td>{{ $row->subject_id }}</td>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->start_time }}</td>
                                <td>{{ $row->end_time }}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="custom-timetable-content">
                <h2 class="subtitle">Schedule for Level-II - ({{ \Carbon\Carbon::now('Asia/Colombo')->format('Y/m/d') }})</h2>

                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hall ID</th>
                            <th>Level</th>
                            <th>Subject ID</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($rows->isEmpty())
                            <tr>
                                <td colspan="7" class="no-data">No data available for today.</td>
                            </tr>
                        @else
                            @foreach($rows as $row)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="custom-timetable-content">
                <h2 class="subtitle">Schedule for Level-III - ({{ \Carbon\Carbon::now('Asia/Colombo')->format('Y/m/d') }})</h2>

                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hall ID</th>
                            <th>Level</th>
                            <th>Subject ID</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($rows->isEmpty())
                            <tr>
                                <td colspan="7" class="no-data">No data available for today.</td>
                            </tr>
                        @else
                            @foreach($rows as $row)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Category End -->

        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="img/map.jpg">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <!-- <h1 class="mb-4">#1 Place To Find The Perfect Property</h1> -->
                        <p class="mb-4">Find your way around campus with our interactive lecture hall map. Easily locate your designated hall for reservations or events, ensuring you reach the right spot on time.</p>
                        <ul>
                            <li><strong>03:</strong> Computer Lab 01</li>
                            <li><strong>04:</strong> Mini Auditorium</li>
                            <li><strong>06:</strong> Conference Room</li>
                            <li><strong>07:</strong> Record Room</li>
                            <li><strong>08:</strong> Special Room</li>
                            <li><strong>09:</strong> Computer Lab 02</li>
                            <li><strong>10:</strong> E-Learning Center</li>
                            <li><strong>11:</strong> Special Lab</li>
                            <li><strong>13:</strong> Main Auditorium</li>
                            <li><strong>16:</strong> Computer Lab 03</li>
                        </ul>
                        <!-- <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                        <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Testimonial Start -->
        <!-- <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Our Clients Say!</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                    <small>Profession</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                    <small>Profession</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                    <small>Profession</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Testimonial End -->
        
        <h1>Reservations</h1>
<table class="table">
    <thead>
        <tr>
            <th>Hall No</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
            @foreach($reservationsData as $reservation)     
                        <tr>
                            <td>{{ $reservation->hall }}</td>
                            <td>{{ $reservation->event_date }}</td>
                            <td>{{ $reservation->start_time }}</td>
                            <td>{{ $reservation->end_time }}</td>
                            <td>{{ $reservation->status }}</td>
                        </tr>                  
            @endforeach
    </tbody>
</table>

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