﻿<!DOCTYPE html>
<html ng-app="RestaurantApp">
<head>

    <meta name="keywords" content="Restaurant" />
    <meta name="description" content="Restaurant" />
    <meta content="IE=edge, chrome=1" http-equiv="X-UA-Compatible" />
    <title>Event</title>
    <link href="content/css/bootstrap.min.css" rel="stylesheet" />
    <link href="content/css/site.css" rel="stylesheet" />
    <link href="content/css/loading-bar.css" rel="stylesheet" />
    <link href="content/css/font-awesome.min.css" rel="stylesheet" />
    <link href="content/css/social-buttons.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>
<body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" data-ng-controller="indexController">
        <div class="container">
            <div class="navbar-header">
                <button class="btn btn-success navbar-toggle" data-ng-click="navbarExpanded = !navbarExpanded">
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </button>
                <a class="navbar-brand" href="#/">Home</a>
            </div>
            <div class="collapse navbar-collapse" data-collapse="!navbarExpanded">
                <ul class="nav navbar-nav navbar-right">
                    <li data-ng-hide="!authentication.isAuth"><a href="#">Welcome {{authentication.userName}}</a></li>
                    <li data-ng-hide="!authentication.isAuth"><a href="#/menu">Menu</a></li>
                    <li data-ng-hide="!authentication.isAuth"><a href="#/orders">My Orders</a></li>
                    <!--<li data-ng-hide="!authentication.isAuth"><a href="#/refresh">Refresh Token</a></li>-->
                    <li data-ng-hide="!authentication.isAuth"><a href="" data-ng-click="logOut()">Logout</a></li>
                    <li data-ng-hide="authentication.isAuth"> <a href="#/login">Login</a></li>
                    <li data-ng-hide="authentication.isAuth"> <a href="#/signup">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="jumbotron">
        <div class="container">
            <div class="page-header text-center">
                <h1>Restaurant</h1>
            </div>
            <p>
                </p>
        </div>
    </div>

    <div class="container">
        <div data-ng-view="">
        </div>
    </div>

    <hr />

    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-muted">1cinfo3 <a target="_blank" href="http://esprit.tn">Esprit</a></p>
                </div>
                <!--<div class="col-md-6">
                    <p class="text-muted">1cinfo3 <a target="_blank" href="http://esprit.tn">Esprit</a></p>
                </div>-->
            </div>
        </div>
    </div>

    <!-- 3rd party libraries -->

    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-route.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.16/angular-resource.min.js"></script>
    <script src="scripts/angular-local-storage.min.js"></script>
    <script src="scripts/loading-bar.min.js"></script>

    <!-- Load app main script -->
    <script src="app/app.js?v=2"></script>

    <!-- Load services -->
    <script src="app/services/authService.js?v=2"></script>
    <script src="app/services/ordersService.js?v=2"></script>
        <script src="app/services/personService.js?v=2"></script>

    <!-- Load controllers -->
    <script src="app/controllers/indexController.js?v=2"></script>
    <script src="app/controllers/homeController.js?v=2"></script>
    <script src="app/controllers/loginController.js?v=2"></script>
    <script src="app/controllers/signupController.js?v=2"></script>
    <script src="app/controllers/ordersController.js?v=2"></script>
        <script src="app/controllers/personController.js?v=2"></script>

    <!-- Load custom filters -->
    <!-- Load custom directives -->

</body>
</html>
