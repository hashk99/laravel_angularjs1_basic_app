myapp.service('CommentService', ['DataFactory', '$q', function (DataFactory, $q) {

    var headers = {'Content-Type': 'application/x-www-form-urlencoded' , 'Accept' : 'application/json'};
  
    return {

        'getHeaders' : function(){
            return headers;
        },

        'setHeaders' : function(header) {
            headers = header;
        },
 
         
        'addComment' : function (article_id, comment_text,user_email,display_name, show_email) { 
            var deferred = $q.defer();

            var url = 'comment'; 
        
            var response = DataFactory.post(url, {
                article_id : article_id,
                comment_text: comment_text,
                user_email: user_email,
                display_name: display_name ,
                show_email: show_email ,
            }, this.getHeaders());

            deferred.resolve(response);

            return deferred.promise;
        },

       
    };
}])