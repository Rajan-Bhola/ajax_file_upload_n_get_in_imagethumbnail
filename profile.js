    /* Profile Update */
jQuery(document).ready(function(){
	jQuery('#profile_update').click(function(){
			var input_value;
			var error = 0;
			var email_filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		  jQuery('input').each(function(){
			  if(jQuery(this).hasClass('required')){
				   input_value = jQuery(this).val();
				   if(input_value == ''){
					   jQuery(this).addClass('error');
					   jQuery(this).next().text( 'This field is requied...!!!' );
						jQuery(this).next().css( 'display', 'block' );
						jQuery(this).next().css( 'color', 'red' );
						error = 1;
				   }else{
					   jQuery(this).removeClass('error');
						jQuery(this).next().css( 'display', 'none' );
				   }
						  if( input_value != '' && jQuery(this).hasClass('email')){
							if (!email_filter.test(input_value)) {
									jQuery(this).addClass('error');
									jQuery(this).next().css( 'display', 'block' );
									jQuery(this).next().css( 'color', 'red' );
									jQuery(this).next().text( 'Please Enter Valid Email !!!' );
									error = 1;
								}else{
									jQuery(this).removeClass('error');
									jQuery(this).next().css( 'display', 'none' );
								}
						}
						if( input_value != '' && jQuery(this).hasClass('phone')){
							if (!jQuery.isNumeric(input_value) ) {
									jQuery(this).addClass('error');
									jQuery(this).next().css( 'display', 'block' );
									jQuery(this).next().css( 'color', 'red' );
									jQuery(this).next().text( 'Please Enter Valid Phone Number !!!' );
									
									error = 1;
								}
							if ( input_value.length < 10)
							{
								jQuery(this).addClass('error');
									jQuery(this).next().css( 'display', 'block' );
									jQuery(this).next().css( 'color', 'red' );
									jQuery(this).next().text( 'Mobile Number contain atleast 10 Characterts.' );
									
									error = 1;
							}
								else{
									jQuery(this).removeClass('error');
									jQuery(this).next().css( 'display', 'none' );
								}
						} 

			  }
		  });
			  if(error){
				  return false;
			  }
			  else{
				 
						  
						   jQuery.ajax({
						   url: ajax_object.ajax_url,
						   type: 'post',
						   data: {
							   action: 'update_profile',
							   name:  jQuery('#first_name').val(),
							   sdw:  jQuery('#sdw').val(),
							   sdw_name:  jQuery('#sdw_name').val(),
							   address:  jQuery('#address').val(),
							   pin_code:  jQuery('#pin_code').val(),
							   mobile_no:  jQuery('#mobile_no').val(),
							   state:  jQuery('#state').val(),
							   city:  jQuery('#city').val(),
							   date_of_birth:  jQuery('#date_of_birth').val(),
							   gender:  jQuery('#gender').val(),
							   e_mail_id:  jQuery('#e-mail_id').val(),
							   nominee_name:  jQuery('#nominee_name').val(),
							   nominee_relation:  jQuery('#nominee_relation').val(),
						   },
						   beforeSend: function( ){
							   jQuery('#profile_update').attr('disabled','disabled');
						   },
						   success: function(res){
							  // alert ('success');
							 jQuery('.success_message').css('display','block');
							setTimeout(function() { 
							  jQuery('.success_message').css('display','none');
							}, 5000); 
						   },
							

						 }); 
						  
				 return false;  
	}
	return false;  
		});
		
		/*Bank Update */
		
		jQuery('#update_bank_accno').click(function(){
			var input_value;
			var error = 0;
			var email_filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		  jQuery('input').each(function(){
			  if(jQuery(this).hasClass('required')){
				   input_value = jQuery(this).val();
				   if(input_value == ''){
					   jQuery(this).addClass('error');
					   jQuery(this).next().text( 'This field is requied...!!!' );
						jQuery(this).next().css( 'display', 'block' );
						jQuery(this).next().css( 'color', 'red' );
						error = 1;
				   }else{
					   jQuery(this).removeClass('error');
						jQuery(this).next().css( 'display', 'none' );
				   }
						  if( input_value != '' && jQuery(this).hasClass('email')){
							if (!email_filter.test(input_value)) {
									jQuery(this).addClass('error');
									jQuery(this).next().css( 'display', 'block' );
									jQuery(this).next().css( 'color', 'red' );
									jQuery(this).next().text( 'Please Enter Valid Email !!!' );
									error = 1;
								}else{
									jQuery(this).removeClass('error');
									jQuery(this).next().css( 'display', 'none' );
									error = 0;
								}
						}
						if( input_value != '' && jQuery(this).hasClass('acc_no')){
							if (!jQuery.isNumeric(input_value) ) {
									jQuery(this).addClass('error');
									jQuery(this).next().css( 'display', 'block' );
									jQuery(this).next().css( 'color', 'red' );
									jQuery(this).next().text( 'Please Enter Valid Phone Number !!!' );
									
									error = 1;
								}
							/* if ( input_value.length < 10)
							{
								jQuery(this).addClass('error');
									jQuery(this).next().css( 'display', 'block' );
									jQuery(this).next().css( 'color', 'red' );
									jQuery(this).next().text( 'Mobile Number contain atleast 10 Characterts.' );
									
									error = 1;
							} */
								else{
									jQuery(this).removeClass('error');
									jQuery(this).next().css( 'display', 'none' );
									error = 0;
								}
						} 

			  }
		  });
			  if(error){
				  return false;
			  }
			  else{
				  
				  
				    jQuery("form#bank_data").submit(function(){
				    var formDataa = new FormData();
				    var file = jQuery("#attach_account_no");
				    var individual_filee = file[0].files[0];
				    var holder_name = jQuery("#holder_name").val();
				    var account_no = jQuery("#account_no").val();
				    var bank_name = jQuery("#bank_name").val();
				    var bank_branch = jQuery("#bank_branch").val();
				    var ifsc_code = jQuery("#ifsc_code").val();
				    formDataa.append("file", individual_filee);
				    formDataa.append("action", "update_bank");
				    formDataa.append("holder_name",holder_name );
				    formDataa.append("account_no",account_no );
				    formDataa.append("bank_name",bank_name );
				    formDataa.append("bank_branch",bank_branch );
				    formDataa.append("ifsc_code",ifsc_code );
				    jQuery.ajax({
				        url: ajax_object.ajax_url,
				        type: 'POST',
				        data: formDataa,
				        async: false,
						beforeSend: function( ){
							   jQuery('#update_bank_accno').attr('disabled','disabled');
						   },
				        success:
						   function (data) {
				        	var result = JSON.parse(data);
				             if(result.error){
				             	alert('Pleas try again later');
				            }else{
				             	jQuery(".img-thumbnail").attr('src',result.img_url);
								 jQuery('.success_message').css('display','block');
							setTimeout(function() { 
							  jQuery('.success_message').css('display','none');
							}, 5000); 
				             }
				        },
				        cache: false,
				        contentType: false,
				        processData: false
				    });

				    return false;
					});
				 
				}			
	  
		});
		
		/*Pan Update */
			jQuery('#update_pan_Card').click(function(){
			var input_value;
			var error = 0;
			var email_filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		  jQuery('input').each(function(){
			  if(jQuery(this).hasClass('required')){
				   input_value = jQuery(this).val();
				   if(input_value == ''){
					   jQuery(this).addClass('error');
					   jQuery(this).next().text( 'This field is requied...!!!' );
						jQuery(this).next().css( 'display', 'block' );
						jQuery(this).next().css( 'color', 'red' );
						error = 1;
				   }else{
					   jQuery(this).removeClass('error');
						jQuery(this).next().css( 'display', 'none' );
						error = 0;
				   }
				   
				   }

			  });
			  if(error){
				  return false;
			  }
			  else
			  {
					jQuery("form#pan_data").submit(function(){
				    var formData = new FormData();
				    var file = jQuery("#attach_pan_card");
				    var individual_file = file[0].files[0];
				    var pan_number = jQuery("#pan_number").val();
				    formData.append("file", individual_file);
				    formData.append("action", "update_pan");
				    formData.append("pan_number",pan_number );
				    jQuery.ajax({
				        url: ajax_object.ajax_url,
				        type: 'POST',
				        data: formData,
				        async: false,
						beforeSend: function( ){
							   jQuery('#update_pan_Card').attr('disabled','disabled');
						   },
				        success: function (data) {
				        	var result = JSON.parse(data);
				             if(result.error){
				             	alert('Pleas try again later');
				            }else{
				             	jQuery(".img-thumbnaill").attr('src',result.img_url);
								jQuery('.success_message').css('display','block');
							setTimeout(function() { 
							  jQuery('.success_message').css('display','none');
							}, 5000);
				             }
				        },
				        cache: false,
				        contentType: false,
				        processData: false
				    });

				    return false;
				});
			}
	  
		});
				


		});