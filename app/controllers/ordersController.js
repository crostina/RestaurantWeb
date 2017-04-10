'use strict';
app.controller('ordersController', ['$scope', 'ordersService', function ($scope, ordersService) {

    $scope.orders = [];

    ordersService.getOrders().then(function (results) {
        console.log(results.data);
        //$scope.orders = results.data;

    }, function (error) {
        //alert(error.data.message);
    });

    var onem = ordersService.resource.get({ id: 1 }, function () {
        console.log(onem);
    });

    var allm = ordersService.resource.query(function () {
        console.log(allm);
    });
    $scope.orders = allm;
    //$scope.oneMovie = ordersService.resource.get({ id: 1 }, function () {
    //    // $scope.entry is fetched from server and is an instance of Entry
    //    console.log($scope.oneMovie.data);
    //    //$scope.oneMovie.data = 'something else';
    //    $scope.oneMovie.$update(function () {
    //        //updated in the backend
    //    });
    //});


}]);