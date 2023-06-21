<?php
    session_start();
    if($_SESSION['login']!=1){
        header("Location: signin.php");
    }
    
    include "includes/conn.php";
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body class="align-items-center">
    <div class="nav">    
        <div class="container">
            <header class="d-flex justify-content-center py-3">
                <h2>Home Page</h2>
            </header>
        </div>
    </div>
    <div class="container m-t-10">
        <div class="card m-auto shadow">
            <div class="card-body w-100">
                <div class="d-flex w-60 m-auto">
                    <input type="text" name="search" class="form-control search-field" id="search" placeholder="Enter Coin Symbols">
                    <button class="btn btn-primary search-btn" type="submit" onclick="search();">Search</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row" id="data">
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <script>
        function search(){
            var search1 = document.getElementById("search").value;
            var search = search1.toUpperCase();
            
            $.ajax({
                type: 'GET',
            	data: {search:search},
            	url: 'includes/search.php',
            	success: function(data){
                    document.getElementById('data').innerHTML = data;
            	}
            });
        }
    </script>
</body>

</html>