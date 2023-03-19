<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<head>
		<title>Smart Customer Services</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="style.css">
	</head>


    <div class="header">
               <div class="container-fluid">
                     <div class="row">
                        <!--logo-->
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                           <div class="full">
                              <div class="center-desk">
                                 <div>
                                    <a href="index.html"><img src="img/logo.png" class="logo standard"/></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                            <h1 class="tClass">Smart Customer Services</h1>
                            </div>
                    </div>
                </div>
    <body ng-app="myApp">

        <ul>
            <li><a href="#/!">Home</a></li>
            <li><a href="#!about">About Us</a></li>
            <li><a href="#!contact">Contact Us</a></li>
            <li><a href="#!reviews">Reviews</a></li>

            <!-- I'm assuming at some point we'll be able to check if a user is logged in
            Then in that case we can only show the Cart and a hypothetical Sign Out button
            but I don't know if that part is required.
            For now I'm just leaving all those buttons here but we can fix it later
            -->
            <li><a href="#!signIn">Sign In</a></li>
            <li><a href="#!signUp">Sign Up</a></li>
            <li><a href="#!cart" ondrop="drop(event)" ondragover="allowDrop(event)">Cart</a></li>
        </ul>

        <div ng-view>
        </div>

        <script>
            var app = angular.module("myApp", ["ngRoute"]);
            app.config(function($routeProvider) {
                $routeProvider
                .when("/", {
                    templateUrl : "services.php",
                })
                .when("/about", {
                    templateUrl : "aboutus.html",
                    
                })
                .when("/contact", {
                    templateUrl : "contact.html",
                    
                })
                .when("/reviews", {
                    templateUrl : "reviews.php",
                    
                })
                .when("/signIn", {
                    templateUrl : "signIn.php",
                    
                })
                .when("/signUp", {
                    templateUrl : "signUp.php",
                    
                }) 
                .when("/cart", {
                    templateUrl : "cart.php",
                    controller : "cartCtrl"
                    
                });
            });
            app.controller("cartCtrl", function ($scope) {
                $scope.initMap = function(){
                    var warehouseLoc = document.getElementById("warehouse").value;
                    var uLocation = document.getElementById("uLocation").value;
                    if (warehouseLoc == "350 Victoria Street, Toronto, ON"){
                        var location = {lat: 43.657, lng: -79.378};
                    } else if (warehouseLoc == "220 Yonge Street, Toronto, ON"){
                        var location = {lat: 43.654, lng: -79.380};
                    } else if (warehouseLoc == "290 Brenmer Blvd, Toronto, ON"){
                        var location = {lat: 43.642, lng: -79.387};
                    }
                    var newMap = new google.maps.Map(document.getElementById("map"), {zoom: 13, center: location, mapTypeId: google.maps.MapTypeId.ROADMAP});
                    var marker = new google.maps.Marker({position: location, map: newMap});
                    var infoWindow = new google.maps.InfoWindow({ content: "<h5>Warehouse Location</h5>"});
                    marker.addListener("click", function(){ infoWindow.open(newMap, marker); });

                    if (uLocation){
                        var geocoder = new google.maps.Geocoder();
                        geocoder.geocode({'address': uLocation}, function(results, status){
                            if (status == google.maps.GeocoderStatus.OK){
                                var lati = results[0].geometry.location.lat();
                                var long = results[0].geometry.location.lng();
                                var directionsDisplay = new google.maps.DirectionsRenderer();
                                var directionsService = new google.maps.DirectionsService();
                                var location2 = {lat: lati, lng: long};
                                var marker2 = new google.maps.Marker({position: location2, map: newMap});
                                var infoWindow = new google.maps.InfoWindow({ content: "<h5>Your Location</h5>"});
                                marker.addListener("click", function(){ infoWindow.open(newMap, marker2); });

                                directionsService.route( {
                                    origin: location,
                                    destination: location2,
                                    provideRouteAlternatives: false,
                                    travelMode: 'DRIVING'
                                }, function(result, status) {if (status == google.maps.DirectionsStatus.OK){
                                    directionsDisplay.setDirections(result);
                                    directionsDisplay.setMap(newMap);
                                }});
                            }
                        });
                    }
                }
            });

        </script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAw7m7GDGvIn9S8Tx_4jEYRtScBt5tN9pM&callback=initMap"></script>
<script>
    function allowDrop(ev) {
        ev.preventDefault();
    }
    function drag(ev) {
        ev.dataTransfer.setData("text",ev.target.id);
    }
    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
    }
</script>    
</body>
</html>