﻿'use strict';
app.controller('barangController', ['$scope', 'barangService', function ($scope, barangService) {

    $scope.barang = [];

    barangService.getBarang().then(function (results) {
        console.log(results.data);
        //$scope.orders = results.data;

    }, function (error) {
        //alert(error.data.message);
    });

    var onem = barangService.resource.get({ id: 14 }, function () {
        console.log("onem",onem);
    });

    var allm = barangService.resource.query(function () {
        console.log("allm",allm);
    });
    $scope.barang = allm;
    //$scope.oneMovie = ordersService.resource.get({ id: 1 }, function () {
    //    // $scope.entry is fetched from server and is an instance of Entry
    //    console.log($scope.oneMovie.data);
    //    //$scope.oneMovie.data = 'something else';
    //    $scope.oneMovie.$update(function () {
    //        //updated in the backend
    //    });
    //});


}]);