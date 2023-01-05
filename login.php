<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault(); 
          $.ajax({
            type: 'post',
            url: 'login-action.php',
            dataType:'json',
            data: $('form').serialize(),
            success: function (data) {
                if(data.code==1)
                {
                    alert("Success");
                    window.location.href = "page.php";
                } 
                else
                {
                    alert("Error");
                } 
                
              
            }
          });
          alert(data.msg)
        });

      });
    </script>


<form method="post" >
    Username:
    <input type="text" name="username"><br>
    Password
    <input type="password" name="password"><br>
    <input type="submit" name="submit" value="Login">
</form>
<?php
?>