<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
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
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'content' => 'required|string|max:255',
      'article_id' => 'required|integer',
    ]);

    $comment = Comment::create([
      'content' => $request->content,
      'article_id' => $request->article_id,
      'user_id' => auth()->id(),
    ]);

    return response()->json([
      'message' => 'Votre commentaire a été ajouté avec succès!',
      'comment' => $comment,
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Comment  $comment
   * @return \Illuminate\Http\Response
   */
  public function show(Comment $comment)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Comment  $comment
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Comment $comment)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Comment  $comment
   * @return \Illuminate\Http\Response
   */
  public function destroy(Comment $comment)
  {
    //
  }
}
