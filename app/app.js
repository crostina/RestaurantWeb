
var app = angular.module('RestaurantApp', ['ngRoute','ngResource', 'LocalStorageModule', 'angular-loading-bar']);

app.config(function ($routeProvider) {

    $routeProvider.when("/home", {
        controller: "homeController",
        templateUrl: "./app/views/home.html"
    });

    $routeProvider.when("/login", {
        controller: "loginController",
        templateUrl: "./app/views/login.html"
    });

    $routeProvider.when("/signup", {
        controller: "signupController",
        templateUrl: "./app/views/signup.html"
    });

    $routeProvider.when("/orders", {
        controller: "ordersController",
        templateUrl: "./app/views/orders.html"
    });
    $routeProvider.when("/person", {
        controller: "personController",
        templateUrl: "./app/views/person.html"
    });

    $routeProvider.otherwise({ redirectTo: "/home" });

});

var serviceBase = 'http://localhost:8090/RestaurantWeb/';
//var serviceBase = 'http://192.168.1.17/'
//var serviceBase = 'http://localhost:26264/';
//var serviceBase = 'http://ngauthenticationapi.azurewebsites.net/';
app.constant('ngRestSettings', {
    apiServiceBaseUri: serviceBase,
    // clientId: 'ngAuthApp'
});

// app.config(function ($httpProvider) {
//     $httpProvider.interceptors.push('authInterceptorService');
// });

app.run(['authService', function (authService) {
    authService.fillAuthData();
}]);


