myapp.factory('DataFactory', ['$http', '$q', 'sysConfig', '$rootScope', function ($http, $q, sysConfig,$rootScope) {

    var base_url = sysConfig.api_url;
    var url_prefix = "/api/v1";

    return {

        'getFullUrl' : function(url){
            return base_url + url_prefix + '/' + url;
        },

        'post' : function (url, data, headers) {

            var deferred = $q.defer();

            $http({
                headers: headers,
                method: 'POST',
                data: $.param(data),
                url:  this.getFullUrl(url)

            }).success(function (data) {

                //Check response status
                if (data.status_string == 'success') {

                    deferred.resolve(data);

                } else if (data.status_string == 'fail') {
                    deferred.reject(data);

                } else {
                    deferred.reject();
                }

            }).error(function (httpError) {
                deferred.reject(httpError);
            });

            return deferred.promise;

        },
 
        'put' : function (url, data, headers) {

            var deferred = $q.defer();

            $http({
                headers: headers,
                method: 'PUT',
                data: $.param(data),
                url:  this.getFullUrl(url)

            }).success(function (data) {

                //Check response status
                if (data.status_string == 'success') {

                    deferred.resolve(data);

                } else if (data.status_string == 'fail') {
                    deferred.reject(data);

                } else {
                    deferred.reject();
                }

            }).error(function (httpError) {
                deferred.reject(httpError);
            });

            return deferred.promise;

        },

        'get' : function (url, headers) {

            var deferred = $q.defer();

            $http({
                headers: headers,
                method: 'GET',
                url:  this.getFullUrl(url)

            }).success(function (data) {

                //Check response status
                if (data.status_string == 'success') {

                    deferred.resolve(data);

                } else if (data.status_string == 'fail') {
                    deferred.reject(data);

                } else {
                    deferred.reject();
                }

            }).error(function (httpError) {
                deferred.reject(httpError);
            });

            return deferred.promise;

        },

        'delete' : function (url, headers) {

            var deferred = $q.defer();

            $http({
                headers: headers,
                method: 'DELETE',
                url:  this.getFullUrl(url)

            }).success(function (data) {

                //Check response status
                if (data.status_string == 'success') {

                    deferred.resolve(data);

                } else if (data.status_string == 'fail') {
                    deferred.reject(data);

                } else {
                    deferred.reject();
                }

            }).error(function (httpError) {
                deferred.reject(httpError);
            });

            return deferred.promise;

        }
    };
}])