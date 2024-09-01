(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.nav-bar').addClass('sticky-top');
        } else {
            $('.nav-bar').removeClass('sticky-top');
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Header carousel
    $(".header-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: true,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 24,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            992:{
                items:2
            }
        }
    });
    
})(jQuery);

function clearForm() {
    var button = document.querySelector('.btn-dataClear');
    if (button.innerText === 'Clear') {
        document.getElementById('dataEntryForm').reset();
    } else {
        window.location.href = '/home';
    }
}



document.getElementById('is_visible').addEventListener('change', function() {
    var messageTextarea = document.getElementById('message');
    if (this.checked) {
        messageTextarea.disabled = false;  // Enable the textarea
    } else {
        messageTextarea.disabled = true;   // Disable the textarea
    }
});



function emptyness() {
    var hallId = document.querySelector('input[name="hall_id"]').value;
    var level = document.querySelector('select[name="level"]').value;

    if (hallId.trim() === "") {
        alert("Please fill out all required fields.");
        return false; // Prevent form submission if validation fails
    }

    return true; // Allow form submission if validation passes
}

document.addEventListener('DOMContentLoaded', function () {
    const rows = document.querySelectorAll('.table-row');

    rows.forEach(row => {
        row.addEventListener('click', function () {
            // Get data from the clicked row
            const hallId = this.dataset.hallId;
            const level = this.dataset.level;
            const subjectId = this.dataset.subjectId;
            const date = this.dataset.date;
            const startTime = this.dataset.startTime;
            const endTime = this.dataset.endTime;
            const isVisible = this.dataset.isVisible;
            const message = this.dataset.message;

            // Populate the form fields
            document.getElementById('hall_id').value = hallId;
            document.getElementById('level').value = level;
            document.getElementById('subject_id').value = subjectId;
            document.getElementById('date').value = date;
            document.getElementById('start_time').value = startTime;
            document.getElementById('end_time').value = endTime;
            document.getElementById('is_visible').checked = isVisible == 1 ? true : false;
            document.getElementById('message').value = message;
        });
    });
});


