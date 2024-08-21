<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Caffeinated-Canvas</title>
  <link rel="icon" href="admin.png" type="image/icon type">
  <style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    :root {
        --main-color: #443;
        --border-radius: 95% 4% 97% 5% / 4% 94% 3% 95%;
        --border-radius-hover: 4% 95% 6% 95% / 95% 4% 92% 5%;
        --border: .2rem solid var(--main-color);
        --border-hover: .2rem dashed var(--main-color);
    }
    html {
        background-image: url(./image/book-bg.jpg);
        display: flex;
        justify-content: center;
        background-color: black;
    }

    h1 {
        font-size: 5.5rem;
    }

    body {
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    .container {
        display: flex;
        justify-content: flex-start; /* Align the content to the left */
        margin-top: auto; /* Push the container to the bottom */
        margin-bottom: 1rem; /* Add some space between the container and the content */
    }

    .btn {
        padding: .9rem 1.5rem;
        border: var(--border);
        border-radius: var(--border-radius);
        color: var(--main-color);
        background: none;
        cursor: pointer;
        font-size: 1.7rem;
        margin-top: 1rem;
    }

    .btn:hover {
        border-radius: var(--border-radius-hover);
        border: var(--border-hover);
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
    }

    .info {
        font-weight: bold;
        font-size: 18px;
    }
    #back{
      position: relative;
      margin-left: -550px;
      margin-top: 20px;
    }
  </style>
</head>

<body>


  <div class="container">
    <a href="./login.html" id="back" class="btn">Sign Out</a>
  </div>
  <div id="main-collapse" class="collapse">
    <h1>Hello ! </h1>
    <div class="row">
      <div class="col-sm-3">
        <a href="./viewClient.php"> <button id="clients-button" class="btn btn-success">View Client Info</button></a> 
      </div>
      <div class="col-sm-3">
      <div class="col-sm-3">
        <a href="./deleteClient.php"> <button id="clients-button" class="btn btn-success">Delete Client Info</button></a> 
      </div>
      <div class="col-sm-3">
        <a href="views/locateView.html">  <button id="client-log-button" class="btn btn-primary">View Menu</button> </a> 
      </div>
      <class="col-sm-3">
       <a href="./viewBarista.php"><button id="push-button" class="btn btn-warning">View Barista</button></a> 
      </div>
      <class="col-sm-3">
       <a href="./deleteBarista.php"><button id="push-button" class="btn btn-warning">Delete Barista</button></a> 
      </div>
      <div class="col-sm-3">
        <a href="./addBarista.php"><button id="workout-button" class="btn btn-info">Add Barista</button></a>
      </div>
      <div class="col-sm-3">
        <a href="./viewReserved.php"><button id="workout-button" class="btn btn-info">View Reserved</button></a>
      </div>
      <div class="col-sm-3">
        <a href="./deleteReservation.php"><button id="push-button" class="btn btn-warning">Delete Reservation</button></a>
      </div>
      
    </div>
  </div>
</body>
</html>