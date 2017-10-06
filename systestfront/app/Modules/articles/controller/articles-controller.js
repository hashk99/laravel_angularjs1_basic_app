myapp.controller('ArticleController', function ($scope, $rootScope,$routeParams, $http, $location, ArticleService ) {
	$scope.articles = null;

	$scope.$on('$routeChangeSuccess', function () {
 
		  
	}); 

	$scope.getAllArticles = function(){
  		console.log("working");
       //get all articles
    	ArticleService.allArticles().then(function(response){
			console.log(response.data.articles);
          	$scope.articles = response.data.articles;
        });      

    }
});