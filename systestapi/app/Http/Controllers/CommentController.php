<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreComment; 
use Illuminate\Support\Facades\Log; 
 
use App\Article;
use App\Comment;

use Response; 
use Exception;

use Facades\App\Services\APIService as APIService;

use App\Http\Resources\Comment as CommentResource;
use App\Http\Resources\CommentCollection;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreComment $request)
    {
         try{ 

             
            $comment_text = $request->input('comment_text');
            $user_email = $request->input('user_email');
            $display_name = $request->input('display_name');
            $show_email = $request->input('show_email');
            $article_id = $request->input('article_id');

            $comment = new Comment();
            $comment->comment_text = $comment_text;
            $comment->user_email = $user_email;
            $comment->display_name = $display_name;
            $comment->show_email = ($show_email == 1) ? $show_email : 0;
            $comment->article_id = $article_id;
            $comment->save();
            
            return APIService::respond(new CommentResource($comment),200);

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
    public function show($id)
    {
        //
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
