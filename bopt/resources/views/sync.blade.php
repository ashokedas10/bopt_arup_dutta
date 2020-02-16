<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title></title>
  <style type="text/css" media="screen">
    table td {
      width:100px;
      height:100px;
      text-align:center;
      vertical-align:middle;
      background-color:#ccc;
    }

    table td.highlighted {
      background-color:#999;
    }
  </style>
</head>
<body onload="sendRequest();">
<div>
<?php
$timestamp = strtotime('2019-01-31');

$day = date('D', $timestamp);


$year = date('Y', $timestamp);
echo $day." ".$year;

?>


<p> <span id="value1"> </span> </p>

<p> <span id="value2"> </span> </p>

 
</div>


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" charset="utf-8">
    $(function () {
      var isMouseDown = false;
      $("#our_table td")
        .mousedown(function () {
          isMouseDown = true;
          $(this).toggleClass("highlighted");
          return false; // prevent text selection
        })
        .mouseover(function () {
          if (isMouseDown) {
            $(this).toggleClass("highlighted");
          }
        })
        .bind("selectstart", function () {
          return false; // prevent text selection in IE
        });

      $(document)
        .mouseup(function () {
          isMouseDown = false;
        });
    });
  </script>
  
  <script>

    // TODO: Replace with the URL of your WebService app

    var serviceUrl = 'https://ricedigital.org:8080/api/users';
	
    function sendRequest() {
		//alert("test"+serviceUrl);
       
	   var method = "POST";

        var apiRequest = new Object();

        apiRequest.function = 'getUsers';

        apiRequest.key = 'N131Q673YL528KT811K';

        apiRequest.secret = 'B478V847SF250BS857A';

		

        $('#value1').text("Calling API... Syncing Start");

 

        $.ajax({

            type: method,

            url: serviceUrl,

            dataType: 'json',

            data: apiRequest,

            success: function (data) {
				// alert(data);
				var jqObj = JSON.stringify(data);
				//var jqObj = jQuery.parseJSON(data); 
				//var jqObj =JSON.parse(data);
				//var jqObj = $.parseJSON(data);		
				console.log(data); 
			    alert(jqObj);
				
					$.ajax({
						type:'POST',
						async: false,
						url:'{{url('sync/get-data')}}/'+data,				
						success: function(response){
						alert(response);
						//var jqObj = jQuery.parseJSON(response); 
						//var jqObj =JSON.parse(response);
						//var jqObj = $.parseJSON(response);		
						//console.log(jqObj.reporting_person); 
						//alert(jqObj);
						//$("#browsers").html(response);
						//reporting_person= response;
						//$("#reporting_person").val(jqObj.reporting_person);
						 $('#value2').text(response);
						}
						
					});				
				
				
                // Return values. JSON format

                // [{"Full_Name": "String"}, {"EMAIL_ID": "String"}]
            },

            error: function (request, status, error) {

					alert(error + ", Response: " + JSON.stringify(request.responseJSON));

            }
        });
		
    }

    </script>
	
</body>
</html>