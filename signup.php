<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body class="align-items-center">
    <div class="card w-100 m-auto form-signin">
        <div class="card-header padding-0">
            <img src="https://fjwp.s3.amazonaws.com/blog/wp-content/uploads/2020/01/11140027/send-email-1024x512.png" class="w-100">
        </div>
        <div class="card-body">
            <center>
                <h2>Sign Up</h2>
            </center>
            
                <div class="form-group mb-2">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
                    <span id="nameerr" style="display:none;"></span>
                </div>
                <div class="form-group mb-2">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email id" id="email" oninput="check_email();" required>
                    <span id="emailerr" style="display:none;"></span>
                </div>
                <div class="form-group mb-2">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" min="6" required>
                    <span id="passworderr" style="display:none;"></span>
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-primary w-100" type="submit" onclick="submit();">Sign Up</button>
                </div>
            
        </div>
    </div>
    <center>
        <a href="signin.php">Sign In</a>
    </center>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <script>
        function check_email(){
            // Get the modal
            var email = document.getElementById("email").value;
            
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            
            if(email.match(mailformat)){
                $.ajax({
            	    type: 'GET',
            		data: {email:email},
            		url: 'includes/email_check.php',
            		success: function(data){
            		    if(data=="Email Already Added!"){
            		        document.getElementById("email").style.borderColor="red";
            		        document.getElementById("emailerr").style.display="block";
            		        document.getElementById("emailerr").style.color="red";
            		        document.getElementById('emailerr').innerHTML=data;
            		    }else if(data=="Username Available!"){
            		        document.getElementById("email").style.borderColor="green";
            		        document.getElementById("emailerr").style.display="block";
            		        document.getElementById("emailerr").style.color="green";
            		        document.getElementById('emailerr').innerHTML=data;
            		    }else{
            		        document.getElementById("email").style.borderColor="grey";
            		        document.getElementById("emailerr").style.display="none";
            		    }
                    }
                });
            }else{
                document.getElementById("email").style.borderColor="red";
            	document.getElementById("emailerr").style.display="block";
            	document.getElementById("emailerr").style.color="red";
            	document.getElementById('emailerr').innerHTML="Enter valid email id";
            }
        }
    </script>
    <script>
        function submit(){
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var result = 0;
            
            if(name==null || name==""){
                document.getElementById("nameerr").style.display="block";
            	document.getElementById("nameerr").style.color="red";
            	document.getElementById('nameerr').innerHTML="Please fill details!";
            	var result = 1;
            }
            
            if(password==null || password=="" || password.length<6){
                document.getElementById("passworderr").style.display="block";
            	document.getElementById("passworderr").style.color="red";
            	document.getElementById('passworderr').innerHTML="Please fill details!";
            	var result = 1;
            }
            
            if(result==0){
                $.ajax({
            	    type: 'GET',
            		data: {email:email,name:name,password,password},
            		url: 'includes/add_user.php',
            		success: function(data){
            		    if(data=="Data added successfully"){
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