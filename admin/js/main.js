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


    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });


    // Progress Bar
    $('.pg-bar').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, {offset: '80%'});


    // Calender
    $('#calender').datetimepicker({
        inline: true,
        format: 'L'
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: true,
        loop: true,
        nav : false
    });

    $('input[type=radio][name=status]').click(function (){
        var petid = $(this).attr('petid');
        var id = $(this).attr('id');

        if( id == 'btnradio3_'+petid ) {
            $("#dis1_"+ petid).show();
            $("#dis2_"+ petid).show();
        }
        else {
            $("#dis1_"+ petid).hide();
            $("#dis2_"+ petid).hide();
            $("#dis3_"+ petid).hide();
            $("#dis4_"+ petid).hide();
        }
    });

    $('input[type=radio][name=approved]').click(function (){
        var petid = $(this).attr('petid');
        var id = $(this).attr('id');

        console.log(id);

        if( id == 'radio1_'+petid ) {
            $("#dis3_"+ petid).show();
            $("#dis4_"+ petid).show();
        }
        else {
            $("#dis3_"+ petid).hide();
            $("#dis4_"+ petid).hide();
        }
    });

    // $('button[type=submit][for=updatestatus]').click();


// var mysql = require('mysql');

// var con = mysql.createConnection({
//     host: "localhost",
//     user: "root",
//     password: "",
//     database: "kratom"
// });

// con.connect(function(err) {
//     if (err) throw err;
//     con.query("SELECT id_petition FROM petition", function (err, result, fields) {
//     if (err) throw err;
//     console.log(result);

//     $("#btnradio3text" + console.log(result)).click(function () {
//         $("#dis1").show();
//         $("#dis2").show();
//         $("#dis3").hide();
//         $("#dis4").hide();
//         console.log('3')

        
//     });

//     $('#btnradio1text'+ console.log(result)).click(function () {
//         $("#dis1").hide();
//         $("#dis2").hide();
//         $("#dis3").hide();
//         $("#dis4").hide();
//         console.log('1')
//     });

//     $('#btnradio2text'+ console.log(result)).click(function () {
//         $("#dis1").hide();
//         $("#dis2").hide();
//         $("#dis3").hide();
//         $("#dis4").hide();
//         console.log('2')
//     });

//     $('#radio1text'+ console.log(result)).click(function () {
//         $("#dis3").show();
//         $("#dis4").show();
//     });

//     $('#radio2text'+ console.log(result)).click(function () {
//         $("#dis3").hide();
//         $("#dis4").hide();
//     });
    

//     });
// });

    // $('#btnradio3text').click(function () {
    //     $("#dis1").show();
    //     $("#dis2").show();
    //     $("#dis3").hide();
    //     $("#dis4").hide();
    //     console.log('3')

        
    // });

    // $('#btnradio1text').click(function () {
    //     $("#dis1").hide();
    //     $("#dis2").hide();
    //     $("#dis3").hide();
    //     $("#dis4").hide();
    //     console.log('1')
    // });

    // $('#btnradio2text').click(function () {
    //     $("#dis1").hide();
    //     $("#dis2").hide();
    //     $("#dis3").hide();
    //     $("#dis4").hide();
    //     console.log('2')
    // });

    // $('#radio1text').click(function () {
    //     $("#dis3").show();
    //     $("#dis4").show();
    // });

    // $('#radio2text').click(function () {
    //     $("#dis3").hide();
    //     $("#dis4").hide();
    // });

    $('#provinces').change(function() {
        var id_province = $(this).val();
    
          $.ajax({
          type: "POST",
          url: "ajax_db.php",
          data: {id:id_province,function:'provinces'},
          success: function(data){
              $('#amphures').html(data); 
              $('#districts').html(' '); 
              $('#districts').val(' ');  
              $('#zip_code').val(' '); 
          }
        });
      });
    
      $('#amphures').change(function() {
        var id_amphures = $(this).val();
    
          $.ajax({
          type: "POST",
          url: "ajax_db.php",
          data: {id:id_amphures,function:'amphures'},
          success: function(data){
              $('#districts').html(data);  
          }
        });
      });
    
       $('#districts').change(function() {
        var id_districts= $(this).val();
    
          $.ajax({
          type: "POST",
          url: "ajax_db.php",
          data: {id:id_districts,function:'districts'},
          success: function(data){
              $('#zip_code').val(data)
          }
        });
      
      });


})(jQuery);

