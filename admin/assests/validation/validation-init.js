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
                roomtypeid:"required",
                icnumber:"required",
                room_no:"required",
                adults:"required",
                children:"required",
                extra_bed:"required",
               line1:"required",
                 line2:"required",
                 city:"required",
                state:"required",
                postcode:"required",
                country:"required",
                 email: {
                    required: true,
                    email: true
                },
               
            },
            messages: {

                checkin:"Select checkin date",
                checkout:"Select checkout date",
                firstname:"Enter firstname ",
				lastname:"Enter lastname",
                mobile:"Enter mobileno",
                icnumber:"Enter IC number",
                roomtypeid:"Select room type",
                room_no:"Select no of units",
                adults:"Select no of adults",
                children:"Select no of children",
                extra_bed:"Select number of extra bed",
                line1:"Enter Line 1",
                line2:"Enter line 2",
                city:"Enter city",
                town:"Enter town",
                state:"Enter state",
                postcode:"Enter postcode",
                country:"Select country",
            },

            
            email:{

                required:"Please enter a valid email address",

                },
            

            
                      
        });



$("#form_hall").validate({
            rules: {
                
                checkindate:"required",
                checkoutdate:"required",
                auditorium:"required",
                 halltype:"required",
                slot:"required",
                icnumber:"required",
                line1:"required",
                firstname:"required",
                lastname:"required",
                mobile:"required",
                line2:"required",
                city:"required",
                state:"required",
                postcode:"required",
                country:"required",
               
               
                 email: {
                    required: true,
                    email: true
                },
               
            },
            messages: {

                checkindate:"Select checkin date",
                checkoutdate:"Select checkout date",
                auditorium:"Select auditorium",
                 halltype:"Select hall type",
                slot:"Select slot",
                icnumber:"Enter IC number",
                line1:"Enter Line 1",
                firstname:"Enter firstname ",
                lastname:"Enter lastname",
                mobile:"Enter mobileno",
                line2:"Enter line 2",
                city:"Enter city",
                town:"Enter town",
                state:"Enter state",
                postcode:"Enter postcode",
                country:"Select country",
               
                
            },

            
            email:{

                required:"Please enter a valid email address",

                },
            

            
                      
        });










      
    });


}();