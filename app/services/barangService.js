'use strict';
app.factory('barangService', ['$http','$resource', 'ngRestSettings', function ($http,$resource, ngRestSettings) {
    var serviceBase = ngRestSettings.apiServiceBaseUri;

    var barangServiceFactory = {};

    var _getBarang = function () {

        return $http.get(serviceBase + 'api/barang').then(function (results) {
            return results;
        });
    };

    barangServiceFactory.getBarang = _getBarang;
    barangServiceFactory.resource = $resource(serviceBase+'api/barang/:id', { id: '@_id' }, {
        update: {
            method: 'PUT', // this method issues a PUT request
            'query': { method: 'GET',param : {}, isArray: true }
        }
    });
    return barangServiceFactory;

}]);