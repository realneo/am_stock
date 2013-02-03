$(document).ready(function(){
	// Animating all the tiles at once
	$('.tile').click(function(){
		$('.tile').switchClass( "tile", "tile_small", 1000, "easeInOutQuad" );
		$('.tile_small').animate({'background-color':'#6e6e6e'});
		$('#companies').css({'float':'right'},1000);
		$('#side_bar').show("slide",{direction: 'left'}, 1000);
		$('#header_msg').animate({'padding-left':'200px'},1000);
		$('.tile_small').animate({'padding-top':'0px'});
		$(this).animate({'padding-top':'20px'});
		$(this).animate({'background-color':'#04AEDA'},200);
		$('#username_input').val('username');
		$('#password_input').val('password');
		$('.feedback').fadeOut(400);
		$('#tile_xp_col').fadeOut(300);
		$('#categories').fadeOut(400);
		$('#products').fadeOut(400);
		$('#stock').fadeOut(400);
		$('#sold').fadeOut(400);
		$('.product_list').html("<option>Select a Product</option>");
		$('.category_list').html("<option>Select Category</option>");
                $('#companies img').fadeOut(400);
		// Getting text out of the Buttons
		button_names = $(this).text();
		$('#login_box h3').fadeOut(500, function() {
			$(this).text(button_names).fadeIn(500);
		});
		
		$('#login_box').delay(500).fadeIn(500);
	});
	// Input General Animation
	$('input').focus(function(){
		input_value = $(this).val();
		$(this).val("");
	});
	$('input').focusout(function(){
		if(!$(this).val()){
			$(this).val(input_value);		
		}
	});	
	// Admin Login Form
	// Checking if both Username & Password have values
	$('#login_btn').click(function(){
		$('.login_preloader').fadeIn();
		if($('#username_input').val() == "" || $('#password_input').val() == ""){
			$('.feedback').html("Please Enter BOTH Username & Password Before Proceeding");
		}else{
			var form_action = $('#login_form').attr('action');
			var form_data = {
				username : $('#username_input').val(),
				password : $('#password_input').val()
			};
			$.ajax({
				type:'post',
				url: form_action,
				data: form_data,
				success: function(response){
					if(response == "success"){
						$('.feedback').fadeIn().html("<p class='success'>Welcome to"+button_names+"</p>");
						$('.login_preloader').fadeOut();
						$('.feedback').delay(1000).fadeOut(400);
						$('#login_box').delay(1500).fadeOut(500);
						$('#tile_xp_col').delay(2000).fadeIn(500);
						$('#categories').delay(2500).fadeIn(400);
						$('#products').delay(3000).fadeIn(400);
						$('#stock').delay(3500).fadeIn(400);
						$('#sold').delay(4000).fadeIn(400);
					}else{
						$('.feedback').fadeIn().html("<p class='error'>Either your Username or Password is incorrect</p>");
						$('.login_preloader').fadeOut();
					}
				}
			});
		return false;
		};
	});
	// Logout Button
	$('#sign_out').click(function(){
		$.ajax({
			url:"includes/logout_process.php",
			success: function(response){
				$('#container').fadeOut(1000)
				setTimeout(function(){window.location.href = "index.php"}, 2000);
			}
		});
	});
	// Back Button
	$('#back_btn').click(function(){
		$('#companies a').animate({'padding-top':'0px'});
		$('#companies a').animate({'background-color':'#6e6e6e'},200);	
		$('#side_bar').hide("slide",{direction: 'left'}, 1000);
		$('.tile_small').switchClass( "tile_small", "tile", 1000, "easeInOutQuad" );	
		$('#login_box').fadeOut(500);	
	});
	// Assigning Company ID
	$('#liwale_btn').click(function(){
		company_id = 1;
	});
	$('#high_point_btn').click(function(){
		company_id = 2;
	});
	$('#age_perfect_btn').click(function(){
		company_id = 3;
	});	
	$('#cross_rider_btn').click(function(){
		company_id = 4;
	});	
	$('#challenge_btn').click(function(){
		company_id = 5;
	});
	$('#challenger_btn').click(function(){
		company_id = 6;
	});	
	// Add Category 
	$('#category_btn').click(function(){
		$('.category_preloader').fadeIn();
			var form_action = $('#category_form').attr('action');
			var form_data = {
				name : $('#category_name').val(),
				c_id : company_id
			};
			$.ajax({
				type:'post',
				url: form_action,
				data: form_data,
				success: function(response){
					if(response == "success"){
						$('.category_preloader').fadeOut();						
						$('.category_feedback').fadeIn().html("<p class='success'>Successfully Added <b>"+form_data['name']+"</b></p>");	
                                                $('.category_list').html("<option>Select Category</option>");
                                                category_hover_id = 0;
					}else{
						$('.category_feedback').fadeIn().html("<p class='error'>There was an Error adding <b>"+form_data['name']+"</b>!</p>");
					}
				}
			});
		return false;
	});
	// Loading Category List
        category_hover_id=0;
	$(".category_list").hover(function() {
                if(category_hover_id == 1){
                    // Dont do anything
                }else{
                    category_hover_id = 1;
                    var cat_data={c_id : company_id};
                    $.ajax({
                            type:'post',
                            url: 'includes/category_list.php',
                            data:cat_data,
                            success:function(response){
                                    $('.category_list').append(response);
                            }
                    });
                }
        });
	// Loading Product List
        product_hover_id = 0;
	$(".product_list").hover(function() {   
            $('.product_preloader').fadeIn();
            if(product_hover_id ==1){
                //Do nothing
                $('.product_preloader').fadeOut();
            }else{
                product_hover_id = 1;
		var cat_data={c_id : company_id};
		$.ajax({
			type:'post',
			url: 'includes/product_list.php',
			data:cat_data,
			success:function(response){
				$('.product_list').append(response);
                                $('.product_preloader').fadeOut();
			}
		});                
            }
	});
	// Add Product 
	$('#product_btn').click(function(){
            $('.product_preloader').fadeIn();
                    var form_action = $('#product_form').attr('action');
                    var form_data = {
                            name : $('#product_name').val(),
                            quantity: $('#product_quantity').val(),
                            unit: $('#product_unit').val(),
                            product_category: $('#product_category').val(),
                            c_id : company_id
                    };
                    $.ajax({
                            type:'post',
                            url: form_action,
                            data: form_data,
                            success: function(response){
                                    if(response == "success"){
                                            $('.product_preloader').fadeOut();						
                                            $('.product_feedback').fadeIn().html("<p class='success'>Successfully Added <b>"+form_data['name']+"</b></p>");
                                            $('.product_feedback').delay(3000).fadeOut(400);	
                                            $('.product_list').html("<option>Select Category</option>");
                                            $('.product_preloader').fadeOut();
                                            product_hover_id = 0;
                                    }else{
                                            $('.product_feedback').fadeIn().html("<p class='error'>There was an Error adding <b>"+form_data['name']+"</b>!</p>");
                                            $('.product_preloader').fadeOut();
                                    }
                            }
                    });
            return false;
    });
// Add Stock 
	$('#stock_btn').click(function(){
		$('.stock_preloader').fadeIn();
			var form_action = $('#stock_form').attr('action');
			var form_data = {
				id : $('#stock_form .product_list').val(),
				qty: $('#stock_form #quantity_input').val()
			};
			$.ajax({
				type:'post',
				url: form_action,
				data: form_data,
				success: function(response){
					if(response == "success"){
						$('.stock_preloader').fadeOut();						
						$('.stock_feedback').fadeIn().html("<p class='success'>Successfully Added <b>"+form_data['qty']+"</b></p>");	
                        $('.product_list').html("<option>Select Product</option>");
                         product_hover_id = 0;
					}else{
						$('.stock_feedback').fadeIn().html("<p class='error'>There was an Error adding <b>"+form_data['qty']+"</b>!</p>");
					}
				}
			});
		return false;
	});
// Add Sold Stock 
	$('#sold_btn').click(function(){
		$('.sold_preloader').fadeIn();
			var form_action = $('#sold_form').attr('action');
			var form_data = {
				id : $('#sold_form .product_list').val(),
				qty: $('#sold_form #quantity_input').val()
			};
			$.ajax({
				type:'post',
				url: form_action,
				data: form_data,
				success: function(response){
					if(response == "success"){
						$('.sold_preloader').fadeOut();						
						$('.sold_feedback').fadeIn().html("<p class='success'>Successfully Added <b>"+form_data['qty']+"</b></p>");	
                        $('.product_list').html("<option>Select Product</option>");
                         product_hover_id = 0;
					}else{
						$('.sold_feedback').fadeIn().html("<p class='error'>There was an Error adding <b>"+form_data['qty']+"</b>!</p>");
					}
				}
			});
		return false;
	});	
        $('#view_all_categories_btn').click(function(){
            $('#sold').fadeOut(400);
            $('#stock').delay(400).fadeOut(400);
            $('#products').delay(800).fadeOut(400);
            $('#categories').delay(1200).fadeOut(400);
            $('#view_all_categories').load("includes/categories.php");
        });
});