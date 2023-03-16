<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>

	<head>
		<title>Food Store</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="placeholder.css">
	</head>

    <body ng-app="myApp">
        <h1 class="tClass">Placeholder Text</h1>

        <ul>
            <li><a href="#/!">Home</a></li>
            <li><a href="#!about">About Us</a></li>
            <li><a href="#!contact">Contact Us</a></li>
            <li><a href="#!reviews">Reviews</a></li>
            <li><a href="#!services">Services</a></li>

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
                    templateUrl : "home.php",
                })
                .when("/about", {
                    templateUrl : "aboutus.htm",
                    
                })
                .when("/contact", {
                    templateUrl : "contact.htm",
                    
                })
                .when("/reviews", {
                    templateUrl : "reviews.htm",
                    
                })
                .when("/services", {
                    templateUrl : "services.htm",
                    
                })
            
                .when("/signIn", {
                    templateUrl : "signIn.php",
                    
                })
                .when("/signUp", {
                    templateUrl : "signUp.php",
                    
                }) 
            
                .when("/signOut", {
                    templateUrl : "signOut.php",
                    controller : "reviewCtrl"
                })
                .when("/cart", {
                    templateUrl : "cart.php",
                    
                });
            });

        </script>
    </body>
</html>