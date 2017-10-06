myapp.controller('ParentController' , function ($scope, $route, $rootScope, $http, $location, sysConfig) {
    $scope.base_url=sysConfig.base_url; //BASE URL FROM CONSTANTS
    $scope.api_url=sysConfig.api_url;

    $scope.getUserNotifications = function(){
            NotificationService.all(AuthService.getAuthToken()).then( function(data){
                $scope.notifications = data.data;
            });
        }
    
});
