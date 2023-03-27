<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<head>
		<title>Smart Customer Services</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="css/style.css">
	</head>
    

<div style="display:none;" id="adminMenu" class="topRight">
<p class="dropButton">Database Maintain</p>
        <div class="dropdown">
            <a class="database" href="#!insert">Insert</a>
            <a class="database" href="#!delete">Delete</a>
            <a class="database" href="#!select">Select</a>
            <a class="database" href="#!update">Update</a>
            <a class="database" href="#!search">Search</a>
        </div>
    </div>

    <div class="header">
               <div class="container-fluid">
                     <div class="row">
                        <!--logo-->
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                           <div class="full">
                              <div class="center-desk">
                                 <div>
                                    <img src="img/logo.png" class="logo standard"/>
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
            <li id="signIn"><a href="#!signIn">Sign In</a></li>
            <li id="signUp"><a href="#!signUp">Sign Up</a></li>
            <li id="signOut" style="display:none;"><a href="#!signOut">Sign Out</a></li>
            <li id="premium" style="display:none;"><a href="#!premium">Premium</a></li>
            <li><a ondrop="drop(event)" ondragover="allowDrop(event)" href="#!cart">Cart</a></li>
        </ul>

        <div ng-view>
        </div>

        <script>
            var app = angular.module("myApp", ["ngRoute"]);
            app.config(function($routeProvider) {
                $routeProvider
                .when("/", {
                    templateUrl : "routePages/home.html",
                    controller: "homeCtrl"
                })
                .when("/about", {
                    templateUrl : "routePages/aboutus.html",
                    
                })
                .when("/contact", {
                    templateUrl : "routePages/contact.html",
                    
                })
                .when("/reviews", {
                    templateUrl : "routePages/reviews.php",
                    
                })
                .when("/signIn", {
                    templateUrl : "routePages/loginPage.html",
                    controller: "loginCtrl"
                })
                .when("/signUp", {
                    templateUrl : "routePages/signup.html",
                    controller: "signupCtrl"
                    
                }) 
                .when("/signOut", {
                    templateUrl : "routePages/signout.html",
                    controller: "logoutCtrl"
                }) 
                .when("/cart", {
                    templateUrl : "routePages/cart.html",
                    controller : "cartCtrl"
                    
                })
                .when("/insert", {
                    templateUrl : "routePages/insert.html",
                    controller : "inCtrl"
                }) 
                .when("/delete", {
                    templateUrl : "routePages/delete.html",
                    controller: "delCtrl"
                }) 
                .when("/update", {
                    templateUrl : "routePages/update.html",
                    controller : "upCtrl"
                    
                }) 
                .when("/select", {
                    templateUrl : "routePages/select.html",
                    controller: "selCtrl"
                    
                }) 
                .when("/search", {
                    templateUrl : "routePages/search.html",
                    controller: "searchCtrl"
                }) 
                .when("/premium", {
                    templateUrl : "routePages/premium.html",
                    controller: "premCtrl"
                }) 
            });
            app.controller("cartCtrl", ['$scope', '$route', function($scope, $route) {
                $scope.initMap = function(){
                    var warehouseLoc = document.getElementById("warehouse").value;
                    var uLocation = document.getElementById("uLocation").value;
                    var wPostalCode = "";
                    
                    if (warehouseLoc == "350 Victoria Street, Toronto, ON"){
                        var location = {lat: 43.657, lng: -79.378};
                        wPostalCode = "M5B0A1";
                    } else if (warehouseLoc == "220 Yonge Street, Toronto, ON"){
                        var location = {lat: 43.654, lng: -79.380};
                        wPostalCode = "M5B2H1";
                    } else if (warehouseLoc == "290 Brenmer Blvd, Toronto, ON"){
                        var location = {lat: 43.642, lng: -79.387};
                        wPostalCode = "M5V2T6";
                    }
                    var newMap = new google.maps.Map(document.getElementById("map"), {zoom: 13, center: location, mapTypeId: google.maps.MapTypeId.ROADMAP});
                    var marker = new google.maps.Marker({position: location, map: newMap});
                    var infoWindow = new google.maps.InfoWindow({ content: "<h5>Warehouse Location</h5>"});
                    marker.addListener("click", function(){ infoWindow.open(newMap, marker); });

                    if (uLocation){
                        var geocoder = new google.maps.Geocoder();
                        geocoder.geocode({'address': uLocation}, function(results, status){
                            if (status == google.maps.GeocoderStatus.OK){
                                for (j = 0; j<results[0].address_components.length; j++){
                                    if (results[0].address_components[j].types[0] == 'postal_code'){
                                        var postalCode = results[0].address_components[j].short_name;
                                        postalCode = postalCode.replace(/\s/g, '');
                                        document.getElementById("address").innerHTML = postalCode;
                                        
                                    }
                                }
                                var lati = results[0].geometry.location.lat();
                                var long = results[0].geometry.location.lng();
                                var directionsDisplay = new google.maps.DirectionsRenderer();
                                var directionsService = new google.maps.DirectionsService();
                                var location2 = {lat: lati, lng: long};
                                var marker2 = new google.maps.Marker({position: location2, map: newMap});
                                var infoWindow = new google.maps.InfoWindow({ content: "<h5>Your Location</h5>"});
                                marker.addListener("click", function(){ infoWindow.open(newMap, marker2); });

                                var R = 6371;
                                var x1 = location2.lat - location.lat;
                                var dLat = x1.toRad();
                                var x2 = location2.lng - location.lng;
                                var dLng = x2.toRad();
                                var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(location.lat.toRad()) * Math.cos(location2.lat.toRad()) * Math.sin(dLng/2) * Math.sin(dLng/2);
                                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
                                var d = R * c;
                                d = Math.round(d);

                                document.getElementById("distance").innerHTML = d;

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
                    
                    document.getElementById("branch").innerHTML = wPostalCode;
                    document.getElementById("dayDelivered").innerHTML = document.getElementById("deliveryDate").value;
                    document.getElementById("deliveryTime").innerHTML = document.getElementById("delTime").value;
                    document.getElementById("invoice").style.display = "none";
                    document.getElementById("input").style.display = "none";
                    document.getElementById("printInvoice").style.display = "block";

                }

                $scope.readCookies = function(){
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/isLoggedIn.php",
                    success: function(phpAsJson){
                        var arr = JSON.parse(JSON.stringify(phpAsJson));
                        if (arr[1] == 1){
                            document.getElementById("invoice").style.display = "block";
                            document.getElementById("input").style.display = "block";
                            document.getElementById("warning").style.display = "none";
                            
                        } else {
                            document.getElementById("invoice").style.display = "none";
                            document.getElementById("input").style.display = "none";
                            document.getElementById("warning").style.display = "block";
                        }
                    }
                    });
                    let x = document.cookie.split(';');
                    let arr = [];
                    let keys={};
                    var count=0;
                    for (var i=0; i<x.length; i++){
                        let y = x[i].split('=')[1];
                        if (y.length < 5){
                        arr.push(y);
                        }
                    }
                    document.cookie.split(';').forEach(function(e){
                        
                        let[key,value] = e.split('=');
                        if (value.length < 5){
                        keys[count] = "itemId" + key.replace(/\D/g,'');
                        count = +count + 1;
                        }
                    });
                    console.log(keys);
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/handleItems.php",
                        dataType: "json",
                        data: {tablename : 'items',
                            values : arr
                        },  success: function(phpAsJson){
                            var count=0;
                            var container = document.getElementById("invoice");
                            var container2 = document.getElementById("outInv");
                            var arr = JSON.parse(JSON.stringify(phpAsJson));
                            var total = 0;
                            console.log(arr);
                            arr.forEach((item)=>{
                                
                                let para = document.createElement("p");
                                let vals = Object.values(item);
                                para.innerText = "Product Id: " + vals[0] + " Product: " + vals[1] + " Price: " + vals[2];
                                total = +total + +vals[2];
                                
                                container.appendChild(para);

                                let para2 = document.createElement("p");
                                para2.innerText = "Product Id: " + vals[0] + " Product: " + vals[1] + " Price: " + vals[2];
                                container2.appendChild(para2);
                                let check = document.createElement("input");
                                check.type = "checkbox";
                                check.name = "delete";
                                check.id = keys[count];
                                count = +count + 1;
                                container.appendChild(check);
                                
                             });
                             let para = document.createElement("p");
                             total = +total + 5.49;
                             total = total.toFixed(2);
                             para.innerText = "Total: " + total;
                             container.appendChild(para);
                             let para2 = document.createElement("p");
                             para2.innerText = "Total: " + total;
                             para2.id = "total";
                             container2.appendChild(para2);
                        }
                    });

            }
                $scope.deleteCookie = function(){
                    var array = [];
                    var checkboxes = document.querySelectorAll('input[name="delete"]:checked');
                    for (var i=0; i<checkboxes.length;i++){
                        array.push(checkboxes[i].id);
                    }
                    console.log(array);
                    for (var j=0; j<array.length;j++){
                        document.cookie = array[j] + "=; Path=/CPS630Project; expires=Thu, 01 Jan 1970 00:00:00 GMT; domain=localhost;";
                    }
                    $route.reload();
                }

                $scope.confirmOrder = function(){
                    var creditRe = new RegExp("[0-9]{4}(-?[0-9]{4}){3}$");
                    var dateRe = new RegExp("/^(0[1-9]|1[0-2])\/?([0-9]{2})$/");
                    var cvcRe = new RegExp("[0-9]{3}");
                    var creditNum = document.getElementById("cNum").value;
                    var expDate = document.getElementById("eDate").value
                    var cvc = document.getElementById("cvc_code").value;
                    var warehouseLoc = document.getElementById("warehouse").value;
                    var warehousePostal = document.getElementById("branch").innerHTML;
                    var uLocation = document.getElementById("address").innerHTML;
                    var date = document.getElementById("dayDelivered").innerHTML;
                    var distance = document.getElementById("distance").innerHTML;
                    if (warehouseLoc == "350 Victoria Street, Toronto, ON"){
                        var store_code=859;
                    } else if (warehouseLoc == "220 Yonge Street, Toronto, ON"){
                        var store_code=2909;
                    } else if (warehouseLoc == "290 Brenmer Blvd, Toronto, ON"){
                        var store_code=1002;
                    }
                    var totalPrice = document.getElementById("total").innerHTML;
                    totalPrice = totalPrice.match(/[0-9]*\.[0-9]*/, "");
                    totalPrice = parseFloat(totalPrice);
                    totalPrice = totalPrice + 5.49;
                   


                    if (creditRe.test(creditNum) && dateRe.test(expDate) && cvcRe.test(cvc)){
                        jQuery.ajax({
                        type: "POST",
                        url: "functions/newOrder.php",
                        data: { distance: distance,
                                store_code: store_code,
                                total_price: totalPrice,
                                source_code: warehousePostal,
                                destination_code: uLocation,
                                trip_price: 5.49,
                                date_issued: date,
                        }
                    });
                }

                }
            }]);
            app.controller("inCtrl", function($scope){
                $scope.inTruck = function(){
                    var truckId = document.getElementById("truck_id").value;
                    var truckCode = document.getElementById("truck_code").value;
                    var availCode = document.getElementById("avail_code").value;
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/insert.php",
                        data: {funcName: 'Truck',
                                truckId: truckId,
                                truckCode: truckCode,
                                availCode: availCode
                        }
                    });
                }
                
                $scope.inShop = function(){
                    var rec_id = document.getElementById("rec_id").value;
                    var st_code = document.getElementById("st_code").value;
                    var price = document.getElementById("price").value;
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/insert.php",
                        data: {funcName: 'Shop',
                                rec_id: rec_id,
                                st_code: st_code,
                                price: price
                        }
                    });
                }

                $scope.inTrip = function(){
                    var tripId = document.getElementById("tripId").value;
                    var srcCode = document.getElementById("srcCode").value;
                    var destCode = document.getElementById("destCode").value;
                    var dist = document.getElementById("dist").value;
                    var tTruckId = document.getElementById("tTruck_id").value;
                    var tPrice = document.getElementById("tPrice").value;
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/insert.php",
                        data: {funcName: 'Trip',
                                tripId: tripId,
                                srcCode: srcCode,
                                tPrice: tPrice,
                                destCode: destCode,
                                tTruckId: tTruckId,
                                dist: dist
                        }
                    });
                }

                $scope.inUser = function(){
                    var uName = document.getElementById("uName").value;
                    var uLogin = document.getElementById("uLogin").value;
                    var phone = document.getElementById("phone").value;
                    var uAddress = document.getElementById("uAddress").value;
                    var uCity = document.getElementById("uCity").value;
                    var uProvince = document.getElementById("uProvince").value;
                    var uPost = document.getElementById("uPost").value;
                    var uPassword = document.getElementById("uPassword").value;
                    var uBalance = document.getElementById("uBalance").value;
                    var uAcc = document.getElementById("uAcc").value;
                    var uEmail = document.getElementById("uEmail").value;
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/insert.php",
                        data: {funcName: 'User',
                                uName: uName,
                                uLogin : uLogin,
                                phone : phone,
                                uAddress : uAddress,
                                uCity : uCity,
                                uProvince : uProvince,
                                uPost : uPost,
                                uPassword : uPassword,
                                uBalance : uBalance, 
                                uAcc : uAcc,
                                uEmail : uEmail
                        }
                    });
                }

                $scope.inOrder = function(){
                    var orderId = document.getElementById("orderId").value;
                    var dIssued = document.getElementById("dIssued").value;
                    var dReceived = document.getElementById("dReceived").value;
                    var totPrice = document.getElementById("totPrice").value;
                    var payment = document.getElementById("payment").value;
                    var oUId = document.getElementById("oUId").value;
                    var oTId = document.getElementById("oTId").value;;
                    var rTId = document.getElementById("rTId").value;;
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/insert.php",
                        data: {funcName: 'Order',
                                orderId : orderId,
                                dIssued: dIssued,
                                dReceived : dReceived,
                                totPrice : totPrice,
                                payment : payment,
                                oUId : oUId,
                                oTId : oTId,
                                rTId : rTId 
                        }
                    });
                }

                $scope.inItem = function(){
                    var fd = document.getElementById('itemForm');
                    var formData = new FormData();
                    formData.append("funcName", "Item");
                    formData.append("itemId", fd[0]['value']);
                    formData.append("itemName", fd[1]['value']);
                    formData.append("price", fd[2]['value']);
                    formData.append("discount_price", fd[3]['value'])
                    formData.append("madeIn", fd[4]['value']);
                    formData.append("dept", fd[5]['value']);
                    formData.append("qty", fd[6]['value']);
                    formData.append("itemImg", fd[7].files[0]['name']);
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/insert.php",
                        data: formData,
                        contentType: false,
                        processData: false
                    });
                }
            });

            app.controller("upCtrl", function($scope){
                $scope.upTruck = function(){
                    var truckId = document.getElementById("truck_id").value;
                    var truckCode = document.getElementById("truck_code").value;
                    var availCode = document.getElementById("avail_code").value;
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/update.php",
                        data: {funcName: 'Truck',
                                truckId: truckId,
                                truckCode: truckCode,
                                availCode: availCode
                        }
                    });
                }
                
                $scope.upShop = function(){
                    var rec_id = document.getElementById("rec_id").value;
                    var st_code = document.getElementById("st_code").value;
                    var price = document.getElementById("price").value;
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/update.php",
                        data: {funcName: 'Shop',
                                rec_id: rec_id,
                                st_code: st_code,
                                price: price
                        }
                    });
                }
                $scope.upTrip = function(){
                    var tripId = document.getElementById("tripId").value;
                    var srcCode = document.getElementById("srcCode").value;
                    var destCode = document.getElementById("destCode").value;
                    var dist = document.getElementById("dist").value;
                    var tTruckId = document.getElementById("tTruck_id").value;
                    var tPrice = document.getElementById("tPrice").value;
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/update.php",
                        data: {funcName: 'Trip',
                                tripId: tripId,
                                srcCode: srcCode,
                                tPrice: tPrice,
                                destCode: destCode,
                                tTruckId: tTruckId,
                                dist: dist
                        }
                    });
                }
                $scope.upUser = function(){
                    var uId = document.getElementById("uId").value;
                    var uName = document.getElementById("uName").value;
                    var uLogin = document.getElementById("uLogin").value;
                    var phone = document.getElementById("phone").value;
                    var uAddress = document.getElementById("uAddress").value;
                    var uCity = document.getElementById("uCity").value;
                    var uProvince = document.getElementById("uProvince").value;
                    var uPost = document.getElementById("uPost").value;
                    var uPassword = document.getElementById("uPassword").value;
                    var uBalance = document.getElementById("uBalance").value;
                    var uAcc = document.getElementById("uAcc").value;
                    var uEmail = document.getElementById("uEmail").value;
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/update.php",
                        data: {funcName: 'User',
                                uId : uId,
                                uName: uName,
                                uLogin : uLogin,
                                phone : phone,
                                uAddress : uAddress,
                                uCity : uCity,
                                uProvince : uProvince,
                                uPost : uPost,
                                uPassword : uPassword,
                                uBalance : uBalance, 
                                uAcc : uAcc,
                                uEmail : uEmail
                        }
                    });
                }
                $scope.upOrder = function(){
                    var orderId = document.getElementById("orderId").value;
                    var dIssued = document.getElementById("dIssued").value;
                    var dReceived = document.getElementById("dReceived").value;
                    var totPrice = document.getElementById("totPrice").value;
                    var payment = document.getElementById("payment").value;
                    var oUId = document.getElementById("oUId").value;
                    var oTId = document.getElementById("oTId").value;;
                    var rTId = document.getElementById("rTId").value;;
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/update.php",
                        data: {funcName: 'Order',
                                orderId : orderId,
                                dIssued: dIssued,
                                dReceived : dReceived,
                                totPrice : totPrice,
                                payment : payment,
                                oUId : oUId,
                                oTId : oTId,
                                rTId : rTId 
                        }
                    });
                }
                $scope.upItem = function(){
                    var fd = document.getElementById('updateItemForm');
                    var formData = new FormData();
                    formData.append("funcName", "Item");
                    formData.append("itemId", fd[0]['value']);
                    formData.append("itemName", fd[1]['value']);
                    formData.append("price", fd[2]['value']);
                    formData.append("discount_price", fd[3]['value']);
                    formData.append("madeIn", fd[4]['value']);
                    formData.append("dept", fd[5]['value']);
                    formData.append("qty", fd[6]['value']);
                    formData.append("itemImg", fd[7].files[0]['name']);
                    console.log(fd);
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/update.php",
                        data: formData,
                        contentType: false,
                        processData: false
                    });
                }
            });

            app.controller("delCtrl", function ($scope) {
                $scope.deleteItem = function(){
                    var id = document.getElementById("id").value;
                    var tableSelected = document.getElementById("tableSelect").value;
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/delete.php",
                        data: { id : id,
                                tableSelect : tableSelected
                        }
                    });
               }
             });
            
             app.controller("searchCtrl", function ($scope) {
                $scope.searchVal = function(){
                    var id = document.getElementById("idVal").value;
                    var type = document.getElementById("valConfirm").value;
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/search.php",

                        data: { id : id,
                                type : type
                        },
                        success: function(phpAsJson){
                            var container = document.getElementById("conTable");
                            let table = document.createElement("table");
                            var arr = JSON.parse(phpAsJson)
                            let cols = Object.keys(arr[0]);
                            let tr = table.insertRow();

                            cols.forEach((item) => {
                                let th = document.createElement("th");
                                th.innerText = item;
                                tr.appendChild(th);
                            });

                            arr.forEach((item) => {
                                let tr = document.createElement("tr");
                                let vals = Object.values(item);
                            

                            vals.forEach((elem) => {
                                let td = document.createElement("td");
                                td.innerText = elem;
                                tr.appendChild(td);
                            });

                            table.appendChild(tr);
                        });
                        container.appendChild(table);
                        }
                        
                        
                    });
               }
             });

            app.controller("loginCtrl", ['$scope', '$location', function($scope, $location){
                $scope.login = function(){
                    var username = document.getElementById("username").value;
                    var password = document.getElementById("password").value;
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/login.php",
                        dataType: "json",
                        data: {username: username,
                                password: password
                        }, 
                        success: function(logCheck){
                            var arr = JSON.parse(JSON.stringify(logCheck));
                            if (arr[0] == 1){
                                document.getElementById("signIn").style.display = "none";
                                document.getElementById("signUp").style.display = "none";
                                document.getElementById("signOut").style.display = "block";
                                if (arr[1] == 0) {
                                    document.getElementById("adminMenu").style.display = "block";
                                    document.getElementById("premium").style.display = "none";
                                } else if (arr[1] == 1){
                                    document.getElementById("premium").style.display = "block";
                                } else {
                                    document.getElementById("premium").style.display = "none";
                                }
                                $scope.$apply(() => { $location.path('/');});
                            } else {
                                document.getElementById("username").value = "";
                                document.getElementById("password").value = "";
                                document.getElementById("inc").innerHTML = "Invalid Username or Password";
                            }

                        }
                        
                    });
                }
            }]);

            app.controller("signupCtrl", ['$scope', '$location', function($scope, $location){
                $scope.signup = function() {
                    var uName = document.getElementById("name").value;
                    var uLogin = document.getElementById("username").value;
                    var phone = document.getElementById("phone").value;
                    var uAddress = document.getElementById("address").value;
                    var uCity = document.getElementById("city").value;
                    var uProvince = document.getElementById("province").value;
                    var uPost = document.getElementById("postalCode").value;
                    var uPassword = document.getElementById("pass").value;
                    var uBalance = 0.0;
                    var uEmail = document.getElementById("email").value;

                    var confirmPassword = document.getElementById("confirmPass").value;
                    var account = document.getElementsByName("account");
                    var creditCard = document.getElementById("cc").value;
                    var expiryDate = document.getElementById("expiryDate").value;
                    var cvc = document.getElementById("cvc").value;

                    for (var type of account) {
                        if (type.checked) {
                            var accountType = type.value;
                        }
                    }

                    const phoneCheck = new RegExp("[1-9][0-9]{2}[ -]?[0-9]{3}[ -]?[0-9]{4}");
                    const postalCodeCheck = new RegExp(/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVXY][ -]?\d[ABCEGHJKLMNPRSTVXY]\d$/i);
                    const creditCheck = new RegExp("[0-9]{4}(-?[0-9]{4}){3}$");
                    const expiryCheck = new RegExp("^(0[1-9]|1[0-2])\/?([0-9]{2})$");
                    const cvcCheck = new RegExp("[0-9]{3}");
                    
                    var verifyPhone = phoneCheck.test(phone);
                    var verifyPostalCode = postalCodeCheck.test(uPost);
                    var verifyPass = uPassword == confirmPassword 
                    var verifyPassLength = uPassword.length >= 6;
                    var verifyCC = creditCheck.test(creditCard);
                    var verifyExp = expiryCheck.test(expiryDate);
                    var verifyCvc = cvcCheck.test(cvc);
                    
                    if (!verifyPhone) {
                        document.getElementById("inc").innerHTML = "";
                        document.getElementById("inc").innerHTML = "Invalid phone number!";
                    } else if (!verifyPostalCode) {
                        document.getElementById("inc").innerHTML = "";
                        document.getElementById("inc").innerHTML = "Invalid postal code!";
                    } else if (!verifyPass) {
                        document.getElementById("inc").innerHTML = "";
                        document.getElementById("inc").innerHTML = "Passwords do not match!";
                    } else if (!verifyPassLength) {
                        document.getElementById("inc").innerHTML = "";
                        document.getElementById("inc").innerHTML = "Password must be at least 6 characters!";
                    } else if (!verifyCC || !verifyExp || !verifyCvc) {
                        document.getElementById("inc").innerHTML = "";
                        document.getElementById("inc").innerHTML = "Invalid payment information!";
                    } else {
                        phone = phone.replace(/-|\s/g,"");
                        uPost = uPost.replace(/-|\s/g,"");

                        jQuery.ajax({
                            type: "POST",
                            url: "functions/signup.php",
                            data: {
                                uName: uName,
                                uLogin : uLogin,
                                phone : phone,
                                uAddress : uAddress,
                                uCity : uCity,
                                uProvince : uProvince,
                                uPost : uPost,
                                uPassword : uPassword,
                                uBalance : uBalance, 
                                uAcc : accountType,
                                uEmail : uEmail
                            }, success: function(signUpCheck) {
                                var arr = JSON.parse(JSON.stringify(signUpCheck));
                                if (arr[1] == 1){
                                    document.getElementById("inc").innerHTML = "Sign up successful!";
                                } else if (arr[1] == 0) {
                                    document.getElementById("inc").innerHTML = "Error in signing up.";
                                }
                            }
                        });
                    }
                }
            }]);
            
            app.controller("selCtrl", function($scope){
                $scope.selUser = function(){
                    var array = [];
                    var checkboxes = document.querySelectorAll('input[name="user"]:checked');
                    for (var i=0; i<checkboxes.length;i++){
                        array.push(checkboxes[i].value);
                    }
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/select.php",
                        dataType: "json",
                        data: {tablename: 'users',
                                values : array
                        }, 
                        success: function(phpAsJson){
                            var container = document.getElementById("conTable");
                            let table = document.createElement("table");
                            var arr = JSON.parse(JSON.stringify(phpAsJson));
                            let cols = Object.keys(arr[0]);
                            let tr = table.insertRow();

                            cols.forEach((item) => {
                                let th = document.createElement("th");
                                th.innerText = item;
                                tr.appendChild(th);
                            });

                            arr.forEach((item) => {
                                let tr = document.createElement("tr");
                                let vals = Object.values(item);
                            

                            vals.forEach((elem) => {
                                let td = document.createElement("td");
                                td.innerText = elem;
                                tr.appendChild(td);
                            });

                            table.appendChild(tr);
                        });
                        container.appendChild(table);
                        }
                    });
                }

                $scope.selOrders = function(){
                    var array = [];
                    var checkboxes = document.querySelectorAll('input[name="order"]:checked');
                    for (var i=0; i<checkboxes.length;i++){
                        array.push(checkboxes[i].value);
                    }
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/select.php",
                        dataType: "json",
                        data: {tablename: 'orders',
                                values : array
                        }, 
                        success: function(phpAsJson){
                            var container = document.getElementById("conTable");
                            let table = document.createElement("table");
                            var arr = JSON.parse(JSON.stringify(phpAsJson));
                            let cols = Object.keys(arr[0]);
                            let tr = table.insertRow();

                            cols.forEach((item) => {
                                let th = document.createElement("th");
                                th.innerText = item;
                                tr.appendChild(th);
                            });

                            arr.forEach((item) => {
                                let tr = document.createElement("tr");
                                let vals = Object.values(item);
                            

                            vals.forEach((elem) => {
                                let td = document.createElement("td");
                                td.innerText = elem;
                                tr.appendChild(td);
                            });

                            table.appendChild(tr);
                        });
                        container.appendChild(table);
                        }
                    });
                }

                $scope.selShopping = function(){
                    var array = [];
                    var checkboxes = document.querySelectorAll('input[name="shops"]:checked');
                    for (var i=0; i<checkboxes.length;i++){
                        array.push(checkboxes[i].value);
                    }
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/select.php",
                        dataType: "json",
                        data: {tablename: 'shopping',
                                values : array
                        }, 
                        success: function(phpAsJson){
                            var container = document.getElementById("conTable");
                            let table = document.createElement("table");
                            var arr = JSON.parse(JSON.stringify(phpAsJson));
                            let cols = Object.keys(arr[0]);
                            let tr = table.insertRow();

                            cols.forEach((item) => {
                                let th = document.createElement("th");
                                th.innerText = item;
                                tr.appendChild(th);
                            });

                            arr.forEach((item) => {
                                let tr = document.createElement("tr");
                                let vals = Object.values(item);
                            

                            vals.forEach((elem) => {
                                let td = document.createElement("td");
                                td.innerText = elem;
                                tr.appendChild(td);
                            });

                            table.appendChild(tr);
                        });
                        container.appendChild(table);
                        }
                    });
                }

                $scope.selTruck = function(){
                    var array = [];
                    var checkboxes = document.querySelectorAll('input[name="truck"]:checked');
                    for (var i=0; i<checkboxes.length;i++){
                        array.push(checkboxes[i].value);
                    }
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/select.php",
                        dataType: "json",
                        data: {tablename: 'trucks',
                                values : array
                        }, 
                        success: function(phpAsJson){
                            var container = document.getElementById("conTable");
                            let table = document.createElement("table");
                            var arr = JSON.parse(JSON.stringify(phpAsJson));
                            let cols = Object.keys(arr[0]);
                            let tr = table.insertRow();

                            cols.forEach((item) => {
                                let th = document.createElement("th");
                                th.innerText = item;
                                tr.appendChild(th);
                            });

                            arr.forEach((item) => {
                                let tr = document.createElement("tr");
                                let vals = Object.values(item);
                            

                            vals.forEach((elem) => {
                                let td = document.createElement("td");
                                td.innerText = elem;
                                tr.appendChild(td);
                            });

                            table.appendChild(tr);
                        });
                        container.appendChild(table);
                        }
                    });
                }

                $scope.selTrip = function(){
                    var array = [];
                    var checkboxes = document.querySelectorAll('input[name="trip"]:checked');
                    for (var i=0; i<checkboxes.length;i++){
                        array.push(checkboxes[i].value);
                    }
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/select.php",
                        dataType: "json",
                        data: {tablename: 'trips',
                                values : array
                        }, 
                        success: function(phpAsJson){
                            var container = document.getElementById("conTable");
                            let table = document.createElement("table");
                            var arr = JSON.parse(JSON.stringify(phpAsJson));
                            let cols = Object.keys(arr[0]);
                            let tr = table.insertRow();

                            cols.forEach((item) => {
                                let th = document.createElement("th");
                                th.innerText = item;
                                tr.appendChild(th);
                            });

                            arr.forEach((item) => {
                                let tr = document.createElement("tr");
                                let vals = Object.values(item);
                            

                            vals.forEach((elem) => {
                                let td = document.createElement("td");
                                td.innerText = elem;
                                tr.appendChild(td);
                            });

                            table.appendChild(tr);
                        });
                        container.appendChild(table);
                        }
                    });
                }

                $scope.selItem = function(){
                    var array = [];
                    var checkboxes = document.querySelectorAll('input[name="item"]:checked');
                    for (var i=0; i<checkboxes.length;i++){
                        array.push(checkboxes[i].value);
                    }
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/select.php",
                        dataType: "json",
                        data: {tablename: 'items',
                                values : array
                        }, 
                        success: function(phpAsJson){
                            var container = document.getElementById("conTable");
                            let table = document.createElement("table");
                            var arr = JSON.parse(JSON.stringify(phpAsJson));
                            let cols = Object.keys(arr[0]);
                            let tr = table.insertRow();

                            cols.forEach((item) => {
                                let th = document.createElement("th");
                                th.innerText = item;
                                tr.appendChild(th);
                            });

                            arr.forEach((item) => {
                                let tr = document.createElement("tr");
                                let vals = Object.values(item);
                            

                            vals.forEach((elem) => {
                                let td = document.createElement("td");
                                td.innerText = elem;
                                tr.appendChild(td);
                            });

                            table.appendChild(tr);
                        });
                        container.appendChild(table);
                        }
                    });
                }

            });
            app.controller("homeCtrl", function($scope){

                $scope.createListings = function(){
                    var array=["item_id", "item_name", "price","item_img"];
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/getItems.php",
                        dataType: "json",
                        data: {tablename : 'items',
                            values : array
                        }, success: function(phpAsJson){
                            var arr = JSON.parse(JSON.stringify(phpAsJson));
                            var container = document.getElementById("conListings");
                            console.log(arr);
                            arr.forEach((item) => {
                                let itemFig = document.createElement("figure");
                                let vals = Object.values(item);
                                console.log(".".concat(vals[3]));
                                let img = document.createElement("img");
                                img.src = ".".concat(vals[3]);
                                img.className = "standard";
                                img.draggable = "true";
                                img.addEventListener('dragstart', function (ev){ev.dataTransfer.setData("id", ev.currentTarget.id)});
                                img.id = vals[0];
                                itemFig.appendChild(img);
                                let figcaption = document.createElement("figcaption");
                                figcaption.className = "figText";
                                figcaption.innerText = "Id: " + vals[0]+ " Product: " + vals[1] + " Price: " +  vals[2];
                                itemFig.appendChild(figcaption);
                                container.appendChild(itemFig);
                            });
                        }

                        
                    });
                }
            });

            app.controller("logoutCtrl", ['$scope', '$location', function($scope, $location){
                $scope.logout = function(){
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/logout.php"
                     });
                    document.getElementById("signIn").style.display = "block";
                    document.getElementById("signUp").style.display = "block";
                    document.getElementById("adminMenu").style.display = "none";
                    document.getElementById("signOut").style.display = "none";
                    document.getElementById("premium").style.display = "none";
                    $scope.$applyAsync(() => { $location.path('/');});
                }
            }]);

            app.controller("premCtrl", ['$scope', '$location', function($scope, $location){
                $scope.becomePremium = function(){
                    var creditRe = new RegExp("[0-9]{4}(-?[0-9]{4}){3}$");
                    var dateRe = new RegExp("^(0[1-9]|1[0-2])\/?([0-9]{2})$");
                    var cvcRe = new RegExp("[0-9]{3}");
                    var creditNum = document.getElementById("cNum").value;
                    var expDate = document.getElementById("eDate").value;
                    var cvc = document.getElementById("cvc_code").value;
                    if (creditRe.test(creditNum) && dateRe.test(expDate) && cvcRe.test(cvc)){
                    jQuery.ajax({
                        type: "POST",
                        url: "functions/premium.php"
                     });
                    document.getElementById("premium").style.display = "none";
                    $scope.$applyAsync(() => { $location.path('/');});
                } else {
                    document.getElementById("cNum").value = "";
                    document.getElementById("eDate").value = "";
                    document.getElementById("cvc_code").value = "";
                    document.getElementById("inc").innerHTML = "Please Enter Valid Payment Information";
                }
            }
            }]);
            

        </script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAw7m7GDGvIn9S8Tx_4jEYRtScBt5tN9pM&callback=initMap"></script>
<script>
    var count = 1;
    function allowDrop(ev) {
        ev.preventDefault();
    }
    function drag(ev) {
        ev.dataTransfer.setData("id", event.currentTarget.id);
    }
    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("id");
        console.log(data)
        document.cookie = "itemId" + count + "=" + data;
        count = count + 1;
    }

    Number.prototype.toRad = function(){
        return this * Math.PI / 180;
    }
</script>    

</body>
<footer>
    <h6 id="browser" class="f1"></h6>
</footer>
<script>
    			var res = window.navigator.userAgent;
			if (res.includes("Edg") == true){
				newStr = "Browser: Microsoft Edge";
				document.getElementById("browser").innerHTML = newStr;	
			} else if (res.includes("Firefox") == true){
				newStr = "Browser: Firefox";
				document.getElementById("browser").innerHTML = newStr;	
			} else if (res.includes("Chrome") == true){
				newStr = "Browser: Google Chrome";
				document.getElementById("browser").innerHTML = newStr;	
			} else {
                newStr = "Browser Type Not Detected";
				document.getElementById("browser").innerHTML = newStr;	
            }
</script>

</html>
