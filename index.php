<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact-us</title>

  <!-- fontawesome -->

  <script src="https://kit.fontawesome.com/ade0d1ba89.js" crossorigin="anonymous"></script>

  <!-- CSS only -->
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <link rel="stylesheet" href="style.css">
</head>
<body>
  <input type="text" name="id" id="id" style="display:none">
                <input type="name" name="name" id="name" placeholder = "name" class="input-feild" required>
                <input type="text" name="email" id="email" placeholder = "email" class="input-feild text-white" required>
                 <input type="tel" name="mobile" id="mobile" placeholder = "mobile" class="input-feild text-white" required>
                  <textarea name="query" id="query" placeholder = "query" class="input-feild text-white" required></textarea>

                  <input class="submit-btn" type="button" name="submit" id="submit" value="Submit" />

<script src="jquery.js"></script>

<script>
$(document).ready(function(){
    $("#submit").on("click",function(e){
        e.preventDefault();
 
 let id = $("#id").val();
        let name = $("#name").val();
        let email = $("#email").val();
        let mobile = $("#mobile").val();
        let query = $("#query").val();

        custData = {
          id: id,
          name: name,
          email: email,
          mobile: mobile,
          query: query,
        };
        console.log(custData);

        $.ajax({
             url: "contact.php",
          method: "POST",
          data: JSON.stringify(custData),
           beforeSend: function () {
            $('.loading').fadeIn();
            // $('#msg').removeClass('error-msg success-msg').addClass('process-msg').html(
            // 'Loading response...');
          },
          success: function(data){
              console.log(data)
              $(".loading").fadeOut().hide();
            if (data == 1) {
              msg = "<div>You are already with us!!</div>";
              $("#msg").fadeIn();
              $('#msg').removeClass('success-msg').addClass('error-msg').html(msg);
              // $("#msg").html(msg);
              $("#contact-form").trigger("reset");
              setTimeout(function () {
                $('#msg').fadeOut("slow");
              }, 4000);
              setInterval('location.reload()', 4000);
            } else if (data == 2) {
              $("#submit").attr("disabled", true);
              msg = "<div>Enter a Valid email id!!</div>";
              $("#msg").fadeIn();
              $('#msg').removeClass('success-msg').addClass('error-msg').html(data);
              $("#msg").html(msg);
              $("#contact-form").trigger("reset");
              setTimeout(function () {
                $('#msg').fadeOut("slow");
              }, 4000);
              setInterval('location.reload()', 4000);
            }

          }
        })

    })
})
</script>

</body>
</html>