myapp.filter('sanitizer', ['$sce', function($sce) {
    return function(url) {
        return $sce.trustAsResourceUrl(url);
    };
}]);

myapp.filter('removeHtmlTags', ['$sce', function($sce) {
    return function(html) {
        return  html ? String(html).replace(/<[^>]+>/gm, '') : '';//STRIP HTML TAGS
    };
}]);
  
myapp.filter('capitalize', function() {
 
    return function(input, all) {
        var reg = (all) ? /([^\W_]+[^\s-]*) */g : /([^\W_]+[^\s-]*)/;
        return (angular.isString(input) && input.length > 0) ? input.replace(reg, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();}) : '';
      }
});

