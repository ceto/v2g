/* ---------------------------------------------
 Contact form
 --------------------------------------------- */
jQuery(document).ready(function(){
    jQuery("#submit_btn").click(function(){

        //get input field values
        var user_name = jQuery('input[name=name]').val();
        var user_email = jQuery('input[name=email]').val();
        var user_tel = jQuery('input[name=tel]').val();
        var user_msg = jQuery('input[name=msg]').val();

        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        if (user_name === "") {
            jQuery('input[name=name]').css('border-color', '#434444');
            proceed = false;
        }
        if (user_email === "") {
            jQuery('input[name=email]').css('border-color', '#434444');
            proceed = false;
        }

        if (user_tel === "") {
            jQuery('input[name=tel]').css('border-color', '#434444');
            proceed = false;
        }

        //everything looks good! proceed...
        if (proceed) {
            //data to be sent to server
            post_data = {
                'userName': user_name,
                'userEmail': user_email,
                'userTel': user_tel,
                'userMsg': user_msg
            };

            //Ajax post data to server

            jQuery.post(jQuery('#contact_form').attr('action'), post_data, function(response){

                //load json data from server and output message
                if (response.type === 'error') {
                    output = '<div class="error">' + response.text + '</div>';
                }
                else {

                    output = '<div class="success">' + response.text + '</div>';

                    //reset values in all input fields
                    jQuery('#contact_form input').val('');
                    jQuery('#contact_form textarea').val('');
                }

                jQuery("#result").hide().html(output).slideDown();
            }, 'json');

        }

        return false;
    });

    //reset previously set border colors and hide all message on .keyup()
    jQuery("#contact_form input, #contact_form textarea").keyup(function(){
        jQuery("#contact_form input, #contact_form textarea").css('border-color', '');
        jQuery("#result").slideUp();
    });

});
