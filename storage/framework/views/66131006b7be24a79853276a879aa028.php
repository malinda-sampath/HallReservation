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
                        
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>

                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <?php echo e(__('Logout')); ?>

                    </a>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->

        <!-- sign in -->
        

        <?php $__env->startSection('content'); ?>
                        <div>
                            <?php if(session('status')): ?>
                                <div role="alert">
                                    <?php echo e(session('status')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        
        <?php $__env->stopSection(); ?>
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
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="table-row" 
                            data-id="<?php echo e($row->id); ?>" 
                            data-hall-id="<?php echo e($row->hall_id); ?>" 
                            data-level="<?php echo e($row->level); ?>" 
                            data-subject-id="<?php echo e($row->subject_id); ?>"
                            data-date="<?php echo e($row->date); ?>"
                            data-start-time="<?php echo e($row->start_time); ?>"
                            data-end-time="<?php echo e($row->end_time); ?>"
                            data-is-visible="<?php echo e($row->is_visible); ?>"
                            data-message="<?php echo e($row->message); ?>">
                            <td><?php echo e($row->id); ?></td>
                            <td><?php echo e($row->hall_id); ?></td>
                            <td><?php echo e($row->level); ?></td>
                            <td><?php echo e($row->subject_id); ?></td>
                            <td><?php echo e($row->date); ?></td>
                            <td><?php echo e($row->start_time); ?></td>
                            <td><?php echo e($row->end_time); ?></td>
                            <td><?php echo e($row->is_visible ? 'Yes' : 'No'); ?></td>
                            <td><?php echo e($row->message); ?></td>
                            <td><?php echo e($row->insert_date); ?></td>
                            <td><?php echo e($row->update_date); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Table View End -->

        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <form action="<?php echo e(url('/home')); ?>" method="GET">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                            <div class="col-md-4">
                            <input type="text" name="hall_id" class="form-control border-0 py-3" placeholder="Hall Id">
                        </div>
                        <div class="col-md-4">
                            <select name="level" class="form-select border-0 py-3">
                                <option value="">Select Level</option>
                                <option value="Level-I">Level-I</option>
                                <!-- Add more levels as needed -->
                            </select>
                        </div>
                                <!-- <div class="col-md-4">
                                    <select class="form-select border-0 py-3">
                                        <option selected>Date</option>
                                        <option value="Saturday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                    </select>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-md-2" style="display:inline">
                            <button class="btn btn-dark border-0 w-100 py-3" onclick="return emptyness()">Search</button>
                            <a href="<?php echo e(url('/home')); ?>" class="btn btn-dark border-0 w-100 py-3">Clear Results</a>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
        <!-- Search End -->

        <!-- Data Form Start -->
        <div class="container-form">
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form class="form" id="dataEntryForm" action="<?php echo e(url('/home')); ?>" method="POST">
                <?php echo csrf_field(); ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Web\Hall Reservation - Copy Latest\hall_reservation\hall_revervation\resources\views/home.blade.php ENDPATH**/ ?>