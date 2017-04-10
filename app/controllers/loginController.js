'use strict';
app.controller('loginController', ['$scope', '$location', 'authService', 'ngRestSettings', function ($scope, $location, authService, ngRestSettings) {

    $scope.loginData = {
        userName: "",
        password: "",
        useRefreshTokens: false
    };

    $scope.message = "";

    $scope.login = function () {

        authService.login($scope.loginData).then(function (response) {

            $location.path('/orders');

        },
         function (err) {
             $scope.message = err.error_description;
         });
    };

    $scope.authExternalProvider = function (provider) {

        var redirectUri = location.protocol + '//' + location.host + '/authcomplete.html';
        //var redirectUri = "http%3A%2F%2Flocalhost%3A32150%2Fauthcomplete.html" ;

        var externalProviderUrl = ngRestSettings.apiServiceBaseUri + "api/Account/ExternalLogin?provider=" + provider
                                                                    + "&response_type=token&client_id=" + ngRestSettings.clientId
                                                                    + "&redirect_uri=" + redirectUri;
        window.$windowScope = $scope;

        var oauthWindow = window.open(externalProviderUrl, "Authenticate Account", "location=0,status=0,width=600,height=750");
    };

    $scope.authCompletedCB = function (fragment) {

        $scope.$apply(function () {
            console.log(fragment);
            if (fragment.haslocalaccount == 'False') {

                authService.logOut();
                console.log(fragment);
                authService.externalAuthData = {
                    provider: fragment.provider,
                    userName: fragment.external_user_name,
                    externalAccessToken: fragment.external_access_token,
                    externalAccessTokenSecret: fragment.external_access_token_secret
                };
                console.log(authService.externalAuthData);

                $location.path('/associate');

            }
            else {
                //Obtain access token and redirect to orders
                var externalData = {
                    provider: fragment.provider,
                    externalAccessToken: fragment.external_access_token,
                    externalAccessTokenSecret: fragment.external_access_token_secret
                };
                authService.obtainAccessToken(externalData).then(function (response) {

                    $location.path('/orders');

                },
             function (err) {
                 $scope.message = err.error_description;
             });
            }

        });
    }
}]);
