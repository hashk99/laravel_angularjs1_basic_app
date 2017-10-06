myapp.controller('CreateArticleController', function ($scope, $rootScope,$routeParams, $http, $location, ArticleService ) {
	 
 
   	// process the form
    $scope.processForm = function() {
    	$scope.message = '';
    	
		ArticleService.addArticle($scope.title, $scope.description, $scope.is_published).then(function(response){
			console.log(response.data);
			$scope.message = 'Successfully added !';

        }); 

    };

    	 
	 
});