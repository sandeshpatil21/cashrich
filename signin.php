<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body class="align-items-center">
    <div class="card w-100 m-auto form-signin">
        <div class="card-header padding-0">
            <img src="https://cdn.pixabay.com/photo/2020/02/17/18/12/office-4857268_640.jpg" class="w-100">
        </div>
        <div class="card-body">
            <center>
                <h2>Sign In</h2>
            </center>
            
                <div class="form-group mb-2">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Your Email" id="email" required>
                </div>
                <div class="form-group mb-2">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Your Password" id="password" required>
                    <span id="passworderr" style="display:none;"></span>
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-secondary w-100" type="submit" onclick="submit();">Sign In</button>
                </div>
            
        </div>
    </div>
    <center>
        <a href="signup.php">Sign Up</a>
    </center>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <script>
        function submit(){
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var result = 0;
            
            if(password==null || password=="" || password.length<6){
                document.getElementById("passworderr").style.display="block";
            	document.getElementById("passworderr").style.color="red";
            	document.getElementById('passworderr').innerHTML="Please fill details!";
            	var result = 1;
            }
            
            if(result==0){
                $.ajax({
            	    type: 'GET',
            		data: {email:email,password,password},
            		url: 'includes/login.php',
            		success: function(data){
            		    if(data=="Login Success"){
            		        window.location = "index.php";
            		    }else{
            		        alert(data);
            		    }
            		}
                });
            }
        }
    </script>
</body>

</html>