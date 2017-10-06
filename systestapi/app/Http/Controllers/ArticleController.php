<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreArticle; 
use Illuminate\Support\Facades\Log; 

use App\User;
use App\UserRole;
use App\Article;

use Response;
use View;
use Exception;

use Facades\App\Services\APIService as APIService;

use App\Http\Resources\Article as ArticleResource;
use App\Http\Resources\ArticleCollection;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        try{ 
            return APIService::respond(new ArticleCollection(Article::orderBy('id','desc')->get()),200);
        }catch (\Exception $e) {
            return APIService::respondError($e->getMessage(), $e->getStatusCode());
        }
        
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticle $request)
    {
         try{

            $admin_user_role = UserRole::where('role', UserRole::ADMINCONST)->first();
            $admin_user = (is_null($admin_user_role) ? null : User::where('user_role_id',$admin_user_role->id)->first());

            $title = $request->input('title');
            $description = $request->input('description');
            $is_published = $request->input('is_published');

            $article = new Article();
            $article->title = $title;
            $article->description = $description;
            $article->is_published = ($is_published  == 1 ) ? $is_published  : 0;
            $article->added_user = (is_null($admin_user) ? null : $admin_user->id);
            $article->save();
            
            return APIService::respond(new ArticleResource($article),200);

        }catch (\Exception $e) {
            Log::error( $e );
            return APIService::respondError($e->getMessage(), $e->getStatusCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id){

        try{ 
            return APIService::respond(new ArticleResource(Article::find($id)),200);
        }catch (\Exception $e) {
            return APIService::respondError($e->getMessage(), $e->getStatusCode());
        }
        
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
