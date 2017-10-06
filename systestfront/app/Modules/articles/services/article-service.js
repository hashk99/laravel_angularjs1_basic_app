myapp.service('ArticleService', ['DataFactory', '$q', function (DataFactory, $q) {

    var headers = {'Content-Type': 'application/x-www-form-urlencoded' , 'Accept' : 'application/json'};
  
    return {

        'getHeaders' : function(){
            return headers;
        },

        'setHeaders' : function(header) {
            headers = header;
        },
 
        'allArticles' : function () {
            this.setHeaders({  
            });
            var deferred = $q.defer();

            var url = 'articles';

            var response = DataFactory.get(url , this.getHeaders());

            deferred.resolve(response);

            return deferred.promise;
        },
        
        'getArtcleById' : function(article_id)
        {
            this.setHeaders({  });

            var deferred = $q.defer();

            var url = "articles/" + article_id;

            var response = DataFactory.get(url , this.getHeaders());

            deferred.resolve(response);

            return deferred.promise;
        }, 

        'addArticle' : function (title,description,is_published) { 
            var deferred = $q.defer();

            var url = 'article';

            var response = DataFactory.post(url, {
                title: title,
                description: description,
                is_published: is_published 
            }, this.getHeaders());

            deferred.resolve(response);

            return deferred.promise;
        },

       
    };
}])