var Script = function () {

  

    $().ready(function() { 
     
        // validate signup form on keyup and submit
       		
		

		$("#form_1").validate({
            rules: {
                
                checkin:"required",
                checkout:"required",
                firstname:"required",
                lastname:"required",
                mobile:"required",
                nubememberid:"required",
                icnumber:"required",
                passportnumber:"required",
                line1:"required",
                line2:"required",
                city:"required",
                state:"required",
                postcode:"required",
                countrys:"required",
                conditions:"required",
                roomtypeid:"required",
                dormbed:"required",
                room_no:"required",
                adults:"required",
                promocode:"required",
               

				email: {
                    required: true,
                    email: true
                },
                             
               
            },
            messages: {

                // checkin:"Please select Check-in date",
                // checkout:"Please select Check-out date",
                // firstname:"Please enter firstname",
                // lastname:"Please enter lastname",
                // mobile:"Please enter contactno",
                 nubememberid:"Please enter NUBE member id",
                // icnumber:"Please enter IC Number",
                // line1:"Please enter line 1",
                // line2:"Please enter line 2",
                // city:"Please enter city",
                // state:"Please enter state",
                // postcode:"Please enter postcode",
                // country:"Please select country",
                // conditions:"Please select terms & conditions",
                // roomtypeid:"Please Select roomtype",
                // dormbed:"Please Select dorm",
                // room_no:"Please Select number of units",
                // adults:"Please enter number of adults",
                 promocode:"Please enter promocode",
                
              
            },

            email:{

                required:"Please enter a valid email address",

                },
                       

            
                      
        });



$("#form_hall").validate({
            rules: {
                
                checkindate:"required",
                checkoutdate:"required",
                firstname:"required",
                lastname:"required",
                mobile:"required",
                nubememberid:"required",
                icnumber:"required",
                passportnumber:"required",
                line1:"required",
                line2:"required",
                city:"required",
                state:"required",
                postcode:"required",
                countrys:"required",
               auditorium:"required",
                halltype:"required",
                slot:"required",
                 conditions:"required",
                              
                 email: {
                    required: true,
                    email: true
                },
               
            },
            messages: {

                // checkindate:"Select checkin date",
                // checkoutdate:"Select checkout date",
                // firstname:"Please enter firstname",
                // lastname:"Please enter lastname",
                // mobile:"Please enter contactno",
                // nubememberid:"Please enter NUBE member id",
                // icnumber:"Please enter IC Number",
                // line1:"Please enter line 1",
                // line2:"Please enter line 2",
                // city:"Please enter city",
                // state:"Please enter state",
                // postcode:"Please enter postcode",
                // country:"Please select country",
                // auditorium:"Please select auditorium",
                // halltype:"Please select halltype",
                // slot:"Please select slot",
                //  conditions:"Please select terms & conditions",
               
                               
            },

            
            email:{

                required:"Please enter a valid email address",

                },
            

            
                      
        });




$("#form_3").validate({
            rules: {
                
                pnrnumber:"required",
                
                             
            },
            messages: {

                pnrnumber:"Please enter PNR Number",
                                              
            },

                 

            
                      
        });



    $("#get_in").validate({
            rules: {
                
                name:"required",
                message:"required",

                 email: {
                    required: true,
                    email: true
                },
                             
            },
            messages: {

                name:"Please enter name",
                message:"Please enter message",                             
            },

               email:{

                required:"Please enter a valid email address",

                },   

            
                      
        });

       $("#contact-form").validate({
            rules: {
                
                name:"required",
                message:"required",

                 email: {
                    required: true,
                    email: true
                },
                             
            },
            messages: {

                // name:"Please enter name",
                // message:"Please enter message",                             
            },

               email:{

                //required:"Please enter a valid email address",

                },   

            
                      
        });



      
    });


}();