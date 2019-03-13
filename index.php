<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- Page title -->
    <title>PHP Test | Concepta</title>


    <!-- App styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />


</head>
<body>

<div id="content">

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Code</th>
      <th scope="col">Destination</th>
      <th scope="col">Name</th>
      <th scope="col">Photos Type S</th>
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>

</div>    


</body>

<!-- App scripts -->
<script src="assets/js/jquery.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>


<script>

//Request AJAX in page load
$(document).ready(function() {
    $.ajax({
        type:"POST", 
        url:"src/api.php", 
        dataType: "json",   
        beforeSend:function(){
           $("tbody").append('<h3>Please wait, requesting the API...</h3>'); 
        },
        success:function(response){

            $("tbody").empty();
            for(var i=0;i<response['Result'].length;i++){

                  //Checks quantity of images in JSON
                  var lengthImageList = response['Result'][i]['TicketInfo']['ImageList'].length;

                  //Consults all images with type "S" and insert to array
                  var arr = [];
                      for(var x=0;x<lengthImageList;x++){
                          var typeimg = response['Result'][i]['TicketInfo']['ImageList'][x]['Type'];
                          if(typeimg == 'S'){
                             arr.push("<button type='button' class='button' value='"+response['Result'][i]['TicketInfo']['ImageList'][x]['Url']+"'>"+x+"</button>");
                          }
                      }

                  //Inserts lines in table
                  $("tbody").append('<tr><td scope="row">'+response['Result'][i]['TicketInfo']['Code']+'</td><td>'+response['Result'][i]['TicketInfo']['Destination']['Code']+'</td><td>'+response['Result'][i]['TicketInfo']['Name']+'</td><td>'+arr.join().replace(/,/g, " ")+'</td></tr>'); 
            }

                  //Handles the popup to open image
                  $("button").click(function(){
                     var imageUrl = $(this).val();
                     window.open(imageUrl, "popupImage", "width=800, height=750, left=500, scrollbars=auto, location=no, directories=no, status=no, menubar=no, toolbar=no, resizable=no");

                  });
        
        },
        error:function(error){
           alert(error);
        }

     });



});


</script>    

</html>