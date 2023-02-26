<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thank you</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.jumbotron {
    
    background-color: #fff;
    
}
.text-part {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.continue-page {
    background-color: #000;
    border: 1px solid #000;
    padding: 11px;
}
.continue-page:hover {
    background-color: #000;
    border: 1px solid #000;
    padding: 11px;
}
  </style>
</head>
<body>
<div class="jumbotron text-center">
	<div class="text-part">
    <img src="{{asset('images/bag.png')}}">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead" style="font-size: 19px;"><strong>Thank you for choosing e-medical, Your order has been placed</p>
  
  
 <!--  <p class="lead">
    <a class="btn btn-dark continue-page" href="#" role="button">Continue to homepage</a>
  </p> -->
</div>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
  setTimeout(function(){
   window.location.href = "{{Url('/')}}";
  },2000)
</script>