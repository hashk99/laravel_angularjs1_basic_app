myapp.controller('CreateCommentController', function ($scope,$window,  $route, $rootScope,$routeParams, $http, $location, CommentService ) {
	 
 
   	// process the form
    $scope.processCommentForm = function() {
    	$scope.message = '';
 
		CommentService.addComment($scope.article.id, $scope.comment_text, $scope.user_email, $scope.display_name, $scope.show_email).then(function(response){
			console.log(response.data);
			$scope.comment_message = 'Successfully added !';
			$window.scrollTo(0, 0);
			$route.reload();
        }); 

    };
 



});