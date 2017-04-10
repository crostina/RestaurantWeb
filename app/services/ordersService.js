'use strict';
app.factory('ordersService', ['$http','$resource', 'ngRestSettings', function ($http,$resource, ngRestSettings) {
    var serviceBase = ngRestSettings.apiServiceBaseUri;

    var ordersServiceFactory = {};

    var _getOrders = function () {

        return $http.get(serviceBase + 'api/movies/latest').then(function (results) {
            return results;
        });
    };

    ordersServiceFactory.getOrders = _getOrders;
    // ordersServiceFactory.resource = $resource(serviceBase+'api/movies/:id', { id: '@_id' }, {
    //     update: {
    //         method: 'PUT', // this method issues a PUT request
    //         'query': { method: 'GET',param : {}, isArray: true }
    //     }
    // });
    return ordersServiceFactory;

}]);