myapp.controller('SingleArticleController', function ($scope, $rootScope,$routeParams, $http, $location, ArticleService ) {
	$scope.articles = null;

	$scope.$on('$routeChangeSuccess', function () {
 		$scope.single_article_id=$routeParams.article_id;
        $scope.getArticleById(); 
	}); 

	$scope.getArticleById = function(){
		console.log("working2");
        //get all articles
    	ArticleService.getArtcleById($scope.single_article_id).then(function(response){
			console.log(response.data);
          	$scope.article = response.data;
        });      

	}
});