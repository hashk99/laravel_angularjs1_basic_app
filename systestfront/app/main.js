var myapp = angular.module('myapp', [
        'ngRoute',
        'ui.router'
    ])
    .constant("sysConfig", {
        "base_url": "http://localhost/systestfront/",
        "api_url": "http://localhost/systestapi/public"
        
    })

.config(function ($provide, $routeProvider, $locationProvider, $httpProvider) {
  
    //Remove hash tag in angular routing urls.
   /* $locationProvider.html5Mode({
      enabled: true,
      requireBase: false
    });*/

    //routes
    $routeProvider

    /**
     * App Routes
     * ---------------------------------------------------------
     */
       
    .when('/articles', {
        templateUrl: 'app/Modules/articles/views/index.html',
        controller: 'ArticleController',
        param_page: 'articles',
    	meta: { 
            title: 'All Articles' 
        }
    })
    .when('/new-article', {
        templateUrl: 'app/Modules/articles/views/create.html',
        controller: 'CreateArticleController' 
    })
    
    .when('/single-article/:article_id', {
        templateUrl: 'app/Modules/articles/views/singleview.html',
        controller: 'SingleArticleController' 
    })
         
});
	
myapp.directive('noSpecialChar', function() {
return {
  require: 'ngModel',
  restrict: 'A',
  link: function(scope, element, attrs, modelCtrl) {
    modelCtrl.$parsers.push(function(inputValue) {
      if (inputValue == null)
        return ''
      cleanInputValue = inputValue.replace(/[^\w\s]/gi, '');
      if (cleanInputValue != inputValue) {
        modelCtrl.$setViewValue(cleanInputValue);
        modelCtrl.$render();
      }
      return cleanInputValue;
    });
  }
}
});
    
