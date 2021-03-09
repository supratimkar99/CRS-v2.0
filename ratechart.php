<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
 {
  box-sizing: border-box;
}

.columns {
  float: left;
  width: 33.3%;
  padding: 8px;
}

.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
  background-color: #111;
  color: white;
  font-size: 25px;
}

.price li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
}

.price .grey {
  background-color: #eee;
  font-size: 20px;
}

.button {
  background-color: blue;
  border: 1px;
  color: white;
  padding: 25px 50px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
  border-radius:4px;
}

@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
}
body{
background-image:url('bookingpic.jpg');
background-size:cover;
}
</style>
</head>
<body>

<h2 style="text-align:center"><b><u><font color="white" size=8 style=Times New Roman>Rate Chart</font></b></u></h2>
<div class="columns">
  <ul class="price">
    <li class="header">Compact</li>
    <li class="grey"> Rs.700 / day</li>
 
  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="header" style="background-color:black">Sedan</li>
    <li class="grey"> Rs.900/ day</li>
  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="header">SUV</li>
    <li class="grey">Rs.1200/ day</li>
  </ul>
</div>
<div class="columns">
  <ul class="price">
    <li class="header">Luxury</li>
    <li class="grey">Rs.2000/ day</li>
  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="header">Van</li>
    <li class="grey">Rs.1500/ day</li>
  </ul>
</div>
<div class="columns">
  <ul class="price">
    <li class="header">Convertible</li>
    <li class="grey">Rs.1800/ day</li>
  </ul>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<form action="bookingpage.php" method="post">
<button class="button"> Proceed To Booking</button>
</form>


</body>
</html>
