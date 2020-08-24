
$(document).ready(function(){
    // Prepare the preview for profile picture
        $("#wizard-picture").change(function(){
            readURL(this);
        });
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
}

$(document).ready(function one(){
    // Prepare the preview for profile picture
        $("#wizard-picture1").change(function one(){
            readURL1(this);
        });
    });
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('#wizardPicturePreview1').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
}

$(document).ready(function two(){
    // Prepare the preview for profile picture
        $("#wizard-picture2").change(function two(){
            readURL2(this);
        });
    });
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('#wizardPicturePreview2').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
}

$(document).ready(function three(){
    // Prepare the preview for profile picture
        $("#wizard-picture3").change(function three(){
            readURL3(this);
        });
    });
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('#wizardPicturePreview3').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
}

$(document).ready(function four(){
    // Prepare the preview for profile picture
        $("#wizard-picture4").change(function four(){
            readURL4(this);
        });
    });
    function readURL4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('#wizardPicturePreview4').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
}

$(document).ready(function five(){
    // Prepare the preview for profile picture
        $("#wizard-picture5").change(function five(){
            readURL5(this);
        });
    });
    function readURL5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('#wizardPicturePreview5').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
}

$(document).ready(function six(){
    // Prepare the preview for profile picture
        $("#wizard-picture6").change(function six(){
            readURL6(this);
        });
    });
    function readURL6(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('#wizardPicturePreview6').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
}
