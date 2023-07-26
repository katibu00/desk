;(function ($) {
    "use strict";

    /*============= preloader js css =============*/
    var cites = [];
    cites[0] = "Parents can access real-time updates on their child's academic performance, attendance, and school activities.";
    cites[1] = "Administrators can generate various types of reports, such as financial reports and student performance reports.";
    cites[2] = "Teachers can create and grade online quizzes and assignments, making the assessment process more efficient and paperless.";
    cites[3] = "Our software supports online fee payment options, allowing parents to conveniently pay school fees from the comfort of their homes.";
    var cite = cites[Math.floor(Math.random() * cites.length)];
    $('#preloader p').text(cite);
    $('#preloader').addClass('loading');

    $(window).on( 'load', function() {
        setTimeout(function () {
            $('#preloader').fadeOut(500, function () {
                $('#preloader').removeClass('loading');
            });
        }, 500);
    })

})(jQuery)