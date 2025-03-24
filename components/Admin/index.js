
$(document).ready(function () {
    var trigger = $('.hamburger'),
        overlay = $('.overlay'),
       isClosed = false;
  
      trigger.click(function () {
        hamburger_cross();      
      });
  
      function hamburger_cross() {
  
        if (isClosed == true) {          
          overlay.hide();
          trigger.removeClass('is-open');
          trigger.addClass('is-closed');
          isClosed = false;
        } else {   
          // overlay.show();
          trigger.removeClass('is-closed');
          trigger.addClass('is-open');
          isClosed = true;
        }
    }
    
    $('[data-toggle="offcanvas"]').click(function () {
          $('#wrapper').toggleClass('toggled');
    });
    
    setTimeout(function() {
      $('#success-alert').fadeOut('slow');
      $('#error-alert').fadeOut('slow');
  }, 2000);

  function ValidateForm(event){
    let isValid = true;
    console.log("form validation");
    $(".field").each(function () {
        if (!$(this).val()){
          
          isValid = false;
        };
    });

    if (!isValid) {
        alert("Please fill all input");
        event.preventDefault(); 
    }
    
    return isValid ;
  }
  
  $("form").on("submit", function(event) {
    //event.preventDefault(); 

    console.log("Form submission prevented for debugging.");

    if (ValidateForm(event)) {
      console.log("Validation passed. Proceeding with form submission.");
      
    } else {
      console.log("Validation failed. Form not submitted.");
    }
    return true;
  });

  });