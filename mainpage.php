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
                                    <a href="index.html"><img src="img/logo.png" class="logo"/></a>
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
            <li><a href="#!signOut">Sign Out</a></li>
            <li><a href="#!cart">Cart</a></li>
        </ul>

        <div ng-view></div>

        <script>
            var app = angular.module("myApp", ["ngRoute"]);
            app.config(function($routeProvider) {
                $routeProvider
                .when("/", {
                    templateUrl : "home.htm",
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
            
                .when("/signOut", {
                    templateUrl : "signOut.php",
                    
                })
                .when("/cart", {
                    templateUrl : "cart.php",
                    
                });
            });

        </script>
    </body>
</html>