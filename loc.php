
<?php
ob_start();
session_start();
include ("dbconnection.php");
$homeAddress= '';
$officeAddress = '';
$isRegistered = false;
if(!isset($_SESSION['user'])){
  $isRegistered = "false";
}else{
  $isRegistered = "true";
  $homeAddress = $_SESSION['homeAddress'];
  $officeAddress = $_SESSION['officeAddress'];
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Pikin Listing Page</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/style2.css">
  <link rel="stylesheet" href="css/owl.carousel.css">

  <!-- Google Font -->
  <link href='//fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

  <!--[if IE 9]>
    <script src="js/media.match.min.js"></script>
  <![endif]-->
  <style>

      html, body {
        height: 100%;
        width: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        width: 100%;
      }
      
    </style>

  </head>
  <body>

  <div  class="container-fluid">
    
  </div>

    <div class='container-fluid'>
    
      <div class="row">

        <div style="height: 700px;  position: relative; overflow: hidden;"  class="col-md-6 col-xs-12">
          <div id="map" ></div>
        </div>
        <!-- Start Page-Content -->
        <div class="col-md-6 col-xs-12">
        <header id="header">
      <div class="header-inner">



        <div class="">

          <!-- Start Utility-Nav-->
          <nav class="utility-nav clearfix">
            <ul class="utility-user custom-list">
              <li id="login">
                <a href="signin.php" id="login-link" class="btn btn-default">
                  <i class="fa fa-power-off"></i>
                  <span>Login</span>
                </a>
              </li>

              <li id="register">
                <a href="signup.php" class="btn btn-default">
                  <i class="fa fa-plus-circle"></i>
                  <span>Register</span>
                </a>
              </li>
            </ul>

            <div class="utility-social">
              <ul class="social-inner custom-list">
                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a></li>
              </ul>
            </div>
          </nav>
          <!-- End Utility Nav -->

          <!-- Start Search Nav -->
          <nav class="search-nav">
            <button class="advanced-search-button">
              <i class="fa fa-align-justify"></i>
            </button>

            <ul class="sub-menu custom-list">
              <li><a href="#"><i class="fa fa-globe"></i>General Search</a></li>
              <li><a href="#"><i class="fa fa-file-o"></i>Search for Keywords</a></li>
            </ul>

            <form action="index.php" class="default-form">
              <input type="text" placeholder="Search...">
              <button><i class="fa fa-search"></i></button>
            </form>
          </nav>
          <!-- End Search Nav -->

          <!-- Start Menu Nav -->
          <div class="menu-nav row">

            <!-- Start Logo -->
            <div class="logo col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <a href="index.php"><img src="img/logo.png" alt="logo"></a>
            </div>
            <!-- End Logo -->


            <!-- Start Search Nav Mobile -->
            <nav class="search-nav mobile col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
              <button class="advanced-search-button">
                <i class="fa fa-align-justify"></i>
              </button>

              <ul class="sub-menu custom-list">
                <li><a href="#"><i class="fa fa-globe"></i>General Search</a></li>
                <li><a href="#"><i class="fa fa-file-o"></i>Search for Keywords</a></li>
              </ul>

              <form action="index.php" class="default-form">
                <input type="text" placeholder="Search...">
                <button><i class="fa fa-search"></i></button>
              </form>
            </nav>
            <!-- End Search Nav Mobile -->

            <!-- Start Nav-Wrapper Mobile -->
            <nav class="nav-wrapper-mobile col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <ul class="utility-user custom-list">
                <li class="login">
                  <a href="signin.php" class="login-link btn btn-default">
                    <i class="fa fa-power-off"></i>
                    <span>Login</span>
                  </a>

                </li>

                <li class="register">
                  <a href="signup.php" class="btn btn-default">
                    <i class="fa fa-plus-circle"></i>
                    <span>Register</span>
                  </a>
                </li>
              </ul>
            </nav>
            <!-- End Nav-Wrapper Mobile -->

          </div>
          <!-- End Menu Nav -->

          <!-- Responsive Menu Buttons -->
          <button class="search-toggle button"><i class="fa fa-search"></i></button>

          <button class="navbar-toggle button"><i class="fa fa-bars"></i></button>
          <!-- End Responsive Menu Buttons -->

        </div>
      </div>
    </header>
          <?php
            if(isset($_POST["search"]) != "") {
              $location = $_POST ['location'];
              $sql = "SELECT * from educators where postcode ='$location' or suburb like '%$location' ";
              
              $result = mysqli_query ($connection, $sql);
              if ($result->num_rows > 0) {
          ?>

          <h5 class="listing-title">Showing <strong><?=$result->num_rows?></strong> results of Educators in: <strong><?=$location?></strong> &nbsp;</h5>

          <div class="row">
            <?php
              while ($row = mysqli_fetch_assoc ($result)) {
            ?>

            <div class="listing-box col-lg-4 col-md-4 col-sm-4" style="margin-bottom: 20px;">
              
              <div class="company-rating">
                <?php
                $user_rating = $row['rating'];

                for ($available_rating = 0; $available_rating < $user_rating; $available_rating++) {
                  ?>

                  <i class="fa fa-star" style="color: orange"></i>
                  <?php
                }

                $no_rating = 5 - $user_rating;

                for ($absent_rating = 0; $absent_rating < $no_rating; $absent_rating++) {
                  ?>
                  <i class="fa fa-star" style="color: #ddd"></i>
                  <?php
                }
                ?>
              </div>
              
              <div class="overlay">
                <img src="images/<?=$row['avatar']?>" alt="">
                <?php if($isRegistered) { ?>
                <div class="overlay-shadow">
                  <div class="overlay-content">
                    <button class="btn btn-success pull-right" name="book"> <a href="booking.php?EducatorID=<?=$row['EducatorID']?>">
                    Book </a><i class="fa fa-check-circle" style="color: rgba(0,0,0,.4)"></i>
                  </button>
                  </div>
                </div>
                <?php } ?>
              </div>

              <div class="gray-bottom">
                <h6 class="company-title"><a href="#"> <?php echo $row["firstname"]." ".$row["lastname"]; ?></a></h6>
                <ul class="company-tags custom-list clearfix">
                  <li><a href="#"><?php echo $row["suburb"]; ?></a></li>
                </ul>
                <?php
                  $educatorAddress = $row['address'] .' '. $row['suburb'];
                  $educatorId = $row['EducatorID'];
                ?>
                <button 
                  style="margin-left: 0px; padding: 5px; 
                  border-radius: 5px; box-shadow: 2px 2px 4px grey;"
                  onclick='startDistanceMatrixService(
                    <?php echo json_encode(array($officeAddress, $homeAddress)); ?>,
                    <?php echo json_encode(array($educatorAddress)); ?>,
                    <?php echo $educatorId ?>,
                    <?php echo $isRegistered ?> )' >
                      Show Distance
                </button>
                <div id='<?php echo 'output'.''.$educatorId; ?>' >

              </div>


              </div>
            </div>
            
            <?php
              }
                mysqli_free_result ($result);
                mysqli_close ($connection);
              }
              else{
                header("location:index.php?NoCode=true&reason=wrongarea");
              }
            }
            else{
              header("location:index.php?NoCode=true&reason=blank");
            }
            ?>
          </div>

        </div>
      
      </div>
    </div>

    <footer id="footer">
      <div class="footer-copyrights">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"><p>Copyright © 2017 Pikin</p></div>
            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
              <ul class="social pull-right custom-list">
                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Start Back-To-Top Button -->
<a href="#" id="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- End Back-To-Top Button -->

<!-- Scripts -->
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.tweet.js"></script>
<script src="js/jflickrfeed.min.js"></script>
<script src="js/jquery.matchHeight-min.js"></script>
<script src="js/jquery.ba-outside-events.min.js"></script>

  <script>
    // center: {lat: 133.7751, lng: 25.2744},
      var map;
      var markersArray = [];
      
        function initMap() {
          map = new google.maps.Map(document.getElementById('map'), {
            center: {lat:-25.2744, lng: 133.7751},
            zoom: 4
          });
          // getLocation();
        }

        var origin1 = {lat: 55.930, lng: -3.118};

       function getLocation() {
            if (navigator.geolocation) {
              Notification.requestPermission(function(result) {  
                navigator.geolocation.getCurrentPosition(function(position) {  
                  console.log('Geolocation permissions granted');  
                  console.log('Latitude:' + position.coords.latitude);  
                  console.log('Longitude:' + position.coords.longitude);  
                });
                if (result === 'denied') {  
                  console.log('Permission wasn\'t granted. Allow a retry.');  
                  return;  
                } else if (result === 'default') {  
                  console.log('The permission request was dismissed.');  
                  return;  
                }  
                console.log('Permission was granted for notifications');  
                 
              });
                
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        }
        

        function showPosition(position) {
            alert(position);
            var latlon = position.coords.latitude + "," + position.coords.longitude;
            console.log("latlon: "+ latlon)
        }
        
        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    console.log("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    console.log("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    console.log("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    console.log("An unknown error occurred.");
                    break;
            }
        }

       function startDistanceMatrixService( userLoc, educatorLoc, id, registeredUser) {
        try{
          getLocation();
          var locationType = ['Office Address', 'Home Address'];
          console.log("a registered user: "+registeredUser);
          if(registeredUser === "false") {
            locationType = ["Your  Location"];
            navigator.geolocation.getCurrentPosition(showPosition, showError, 10000);
          }
        //console.log('markersstdm: '+JSON.stringify(markersArray));
        console.log('userloc '+JSON.stringify(userLoc));
        console.log('educatorLoc '+JSON.stringify(educatorLoc));
        var service = new google.maps.DistanceMatrixService;
        service.getDistanceMatrix({
          origins: userLoc,
          destinations: educatorLoc,
          travelMode: 'DRIVING',
          unitSystem: google.maps.UnitSystem.METRIC,
          avoidHighways: false,
          avoidTolls: false
        }, function(response, status) {
          if (status !== 'OK') {
            alert('An error occured');
          } else {
            deleteMarkers(markersArray);  
            // console.log('response: '+JSON.stringify(response));
            responsePrinter(response, map, markersArray, id, locationType);
            console.log('markersstdmafter resprinter: '+JSON.stringify(markersArray));
        
          }
        });
        }catch(error){
          console.log('Error in startDistMatrix'+error);
        }
      }

      function showGeocodedAddressOnMap( asDestination, markersArray, title) {
        var destinationIcon = 'https://chart.googleapis.com/chart?' +
            'chst=d_map_pin_letter&chld=D|FF0000|000000';
        var originIcon = 'https://chart.googleapis.com/chart?' +
            'chst=d_map_pin_letter&chld=O|FFFF00|000000';
        var icon = asDestination ? destinationIcon : originIcon;
        var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
                 
        var bounds = new google.maps.LatLngBounds;
              return function(results, status) {
                if (status === 'OK') {
                  map.fitBounds(bounds.extend(results[0].geometry.location));
                  map.setZoom(5);
                  marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    animation: google.maps.Animation.DROP,
                    title: title,
                    icon: icon
                  });
                  markersArray.push(marker);
                  marker.addListener('click', toggleBounce);
                } else {
                  document.getElementById('mapError').innerHTML = "An Error occurred the address could not be retrieved";
                  console.log('Geocode was not successful due to: ' + status);
                }
              };
      }

      function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }

      function responsePrinter(response, map, markersArray, id, locationType) {
        var geocoder = new google.maps.Geocoder;
        var originList = response.originAddresses;
        var destinationList = response.destinationAddresses;
        var outputDiv = document.getElementById('output'+id);
        outputDiv.innerHTML = '';
        try{
        for (var i = 0; i < originList.length; i++) {
              var results = response.rows[i].elements;
              geocoder.geocode({'address': originList[i]},
                  showGeocodedAddressOnMap(false, markersArray, locationType[i]));
              for (var j = 0; j < results.length; j++) {
                geocoder.geocode({'address': destinationList[j]},
                    showGeocodedAddressOnMap(true, markersArray, "Instructor Location"));
                  if(results[j].status === 'OK') {
                    outputDiv.innerHTML += '<div>'+ destinationList[j]+ ' to ' +  locationType[i] +
                    ': \n' + results[j].distance.text + ' in ' +
                    results[j].duration.text + '<br>';
                  }
                
              }
            }

            } catch(e) {
              console.log(e.message);
        }
      }

      function deleteMarkers(markersArray) {
        for (var i = 0; i < markersArray.length; i++) {
          markersArray[i].setMap(null);
        }
        markersArray = [];
      }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHFxOTD67yoaKT4d1kpGoMICxdXkVGFNE&callback=initMap">
    </script>

  </body>
  
</html>
