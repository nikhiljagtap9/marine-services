(function($) {
    "use strict";

    /*-------------------------------------
	Background image
	-------------------------------------*/
    $("[data-bg-image]").each(function() {
        var img = $(this).data("bg-image");
        $(this).css({
            backgroundImage: "url(" + img + ")"
        });
    });

    /*-------------------------------------
    After Load All Content Add a Class
    -------------------------------------*/
    window.onload = addNewClass();

    function addNewClass() {
        $('.fxt-template-animation').imagesLoaded().done(function(instance) {
            $('.fxt-template-animation').addClass('loaded');
        });
    }

    /*-------------------------------------
    Toggle Class
    -------------------------------------*/
    $(".toggle-password").on('click', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    /*-------------------------------------
    Youtube Video
    -------------------------------------*/
    if ($.fn.YTPlayer !== undefined && $("#fxtVideo").length) {
        $("#fxtVideo").YTPlayer({ useOnMobile: true });
    }

    /*-------------------------------------
    Vegas Slider
    -------------------------------------*/
    if ($.fn.vegas !== undefined && $("#vegas-slide").length) {
        var target_slider = $("#vegas-slide"),
            vegas_options = target_slider.data('vegas-options');
        if (typeof vegas_options === "object") {
            target_slider.vegas(vegas_options);
        }
    }

    /*-------------------------------------
    OTP Form (Focusing on next input)
    -------------------------------------*/
    $("#otp-form .otp-input").keyup(function() {
        if (this.value.length == this.maxLength) {
            $(this).next('.otp-input').focus();
        }
    });

    /*-------------------------------------
	Social Animation
	-------------------------------------*/
    $('#fxt-login-option >ul >li').hover(function() {
        $('#fxt-login-option >ul >li').removeClass('active');
        $(this).addClass('active');
    });

    /*-------------------------------------
    Preloader
    -------------------------------------*/
    $('#preloader').fadeOut('slow', function() {
        $(this).remove();
    });

    /*-------------------------------------
    Multi Steps
    -------------------------------------*/
    var current_fs, next_fs, previous_fs; //form
    var opacity;
    var current = 1;
    var steps = $(".fxt-form-step").length;

    $('.fxt-current-step').html(current);
    $('.fxt-total-step').html(steps);

    setProgressBar(current);

    $(".next").on('click', function(e) {
        e.preventDefault();

        let currentStep = $(this).closest(".fxt-form-step"); // Get current step only
        let inputs = currentStep.find("input, textarea, select"); // Validate only this step
        let valid = true;

        inputs.each(function () {
            if ($(this).prop('required')) {
                let value = $(this).val();

                // Check for empty string or null
                if (value === '' || value === null) {
                    $(this).addClass("is-invalid");
                    valid = false;
                } else {
                    $(this).removeClass("is-invalid");
                }
            }

            // Company logo file size check (if this is the logo input)
            if ($(this).attr('type') === 'file' && this.files.length > 0) {
                const maxSize = 1024 * 1024; // 1MB
                const file = this.files[0];

                if (file.size > maxSize) {
                    $(this).addClass("is-invalid");
                    $('#formErrors').removeClass('d-none').html("Company logo must be less than 1MB.");
                    valid = false;
                } else {
                    // Clear previous file error if any
                    $(this).removeClass("is-invalid");
                    $('#formErrors').addClass('d-none').html('');
                }
            }
        });


     
        if (!valid) {
          //  alert("Please fill all required fields.");
            return;
        }

        // Transition to next step
        current_fs = currentStep;
        next_fs = current_fs.next();

        next_fs.show();
        current_fs.animate({ opacity: 0 }, {
            step: function(now) {
                let opacity = 1 - now;
                current_fs.css({ 'display': 'none', 'position': 'relative' });
                next_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });

        setProgressBar(++current);
        $('.fxt-current-step').html(current);
    });

    $(".previous").click(function() {

        current_fs = $(this).parents(".fxt-form-step");
        previous_fs = $(this).parents(".fxt-form-step").prev();

        //show the previous step
        previous_fs.show();

        //hide the current step with style
        current_fs.animate({ opacity: 0 }, {
            step: function(now) {
                // for making step appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });
        setProgressBar(--current);
        $('.fxt-current-step').html(current);
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }

})(jQuery);


    document.getElementById('photos').addEventListener('change', function(event) {
        const files = event.target.files;
        if (files.length > 50) {
            alert("You can only upload up to 50 images.");
            event.target.value = '';  // Reset the input
        }
    });


  


// Get radio buttons and the contact div
const yesRadio = document.getElementById('yes');
const noRadio = document.getElementById('no');
const contactDiv = document.getElementById('contactDiv');

// Event listeners for radio buttons
yesRadio.addEventListener('change', function() {
  if (yesRadio.checked) {
    contactDiv.style.display = 'block'; // Show the contact div
  }
});

noRadio.addEventListener('change', function() {
  if (noRadio.checked) {
    contactDiv.style.display = 'none'; // Hide the contact div
  }
});


function openModal() {
    document.getElementById('mapModal').classList.add('show');
  }

  function closeModal() {
    document.getElementById('mapModal').classList.remove('show');
  }

  function closeOnClickOutside(event) {
    const modalBox = document.getElementById('modalBox');
    if (!modalBox.contains(event.target)) {
      closeModal();
    }
  }

  document.getElementById('locationInput').addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
      const query = this.value.trim();
      if (query) {
        const mapFrame = document.getElementById('mapFrame');
        mapFrame.src = `https://www.google.com/maps?q=${encodeURIComponent(query)}&output=embed`;
      }
    }
  });

  function confirmLocation() {
    alert("Location confirmed!");
    // Add your logic here (e.g., pass location data to form or server)
  }
