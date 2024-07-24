<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Back\UserRequest;
use App\Http\Requests\MessagePost;
use App\Notifications\PostMessage;

use App\Repositories\ { PostRepository, MessageRepository };

class UserController extends ResourceController
{
    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\Back\UserRequest  $request
     * @param  integer $id
     * @return \Illuminate\Http\Response
    */
    public function update($id)
    {
        $request = app()->make(UserRequest::class);

        $request->merge([
            'valid' => $request->has('valid'),
        ]);

        User::findOrFail($id)->update($request->all());

        return back()->with('ok', __('The user has been successfully updated'));
    }

    /**
     * Valid the user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function valid(User $user)
    {
        $user->valid = true;
        $user->save();

        return response()->json();
    }

    /**
     * Unvalid the user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function unvalid(User $user)
    {
        $user->valid = false;
        $user->save();

        return response()->json();
    }
/*

    protected $postRepository;
    protected $messagerepository;
    public function __construct(PostRepository $postRepository, MessageRepository $messagerepository)
    {
        $this->postRepository = $postRepository;
        $this->messagerepository = $messagerepository;
    }
    public function message(MessagePost $request)
    {
        $post = $this->postRepository->getById($request->id);
        if(auth()->check()) {
            $post->notify(new PostMessage($post, $request->message, auth()->user()->email));
            return response()->json(['info' => 'Votre message va être rapidement transmis.']);
        }
        $this->messagerepository->create([
            'texte' => $request->message,
            'email' => $request->email,
            'post_id' => $post->id,
        ]);
        return response()->json(['info' => 'Votre message a été mémorisé et sera transmis après modération.']);
    }*/

}
