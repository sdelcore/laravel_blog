<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('homepage')->with('posts', Post::paginate(10));
	}

    public function showLogin()
    {
        return View::make('login');
    }

    public function doLogin()
    {
        //makes sure info is present
        $rules = array(
            'username' => 'required',
            'password' => 'required|alphaNum|min:3'
        );

        $validator = Validator::make(Input::all(), $rules);

        //redirects if validation fails
        if ($validator->fails()){
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'))
                ->with('flash_error', 'Login Failed');
        } else {

            //takes input
            $userdata = array(
                'username'  => Input::get('username'),
                'password'  => Input::get('password')
            );

            //attempt to do login
            if (Auth::attempt($userdata, true)){

                return Redirect::to('/')
                    ->with('flash_notice', 'Login Successful');

            } else {

                return Redirect::to('login')
                    ->withErrors($validator)
                    ->with('flash_error', 'Login Failed')
                    ->withInput(Input::except('password'));
            }
        }
    }

    public function showRegister()
    {
        return View::make('register');
    }

    public function doRegister()
    {
        $data = Input::all();

        $rules = array(
            'username' => 'required|unique:users',
            'email' => 'email|unique:users',
            'password' => 'required|alphaNum|min:3',
            'first_name' => 'required|alphaNum',
            'surname' => 'required|alphaNum',
            'retype_password' => 'required|same:password',
            'retype_email' => 'required|same:email'
        );

        $validator = Validator::make($data, $rules);

        if ($validator->passes())
        {
            $user = new User;
            $user->username = Input::get('username');
            $user->password = Hash::make(Input::get('password'));
            $user->email = Input::get('email');
            $user->first_name = Input::get('first_name');
            $user->surname = Input::get('surname');
            $user->save();

            return Redirect::to('/')
                ->with('flash_notice', 'Registration Successful!');
        }
        else
        {
            return Redirect::to('register')
                ->withErrors($validator)
                ->withInput(Input::except('password'))
                ->with('flash_error', 'Registration Failed');
        }
    }

    public function doLogout()
    {
        Auth::logout();
        //return Redirect::to('login');
        return Redirect::to('/');
    }

    public function showPost()
    {
        return View::make('post');
    }

    public function doPost()
    {
        if (Auth::check())
        {
            $data = Input::all();

            $rules = array(
                'title' => 'required',
                'body' => 'required',
            );

            $validator = Validator::make($data, $rules);

            if ($validator->passes())
            {
                $post = new Post;
                $post->poster_id = Auth::id();
                $post->title = Input::get('title');
                $post->body = Input::get('body');
                $post->save();

                return Redirect::to('/');
            }
            else
            {
                return Redirect::to('post')
                    ->withErrors($validator);
            }
        }
        else
        {
            return Redirect::to('login');
        }
    }

    public function showComment($post_id)
    {
        return View::make('comment')
            ->with('posts', Post::findOrFail($post_id));
    }

    public function doComment($post_id)
    {
        if (Auth::check())
        {
            $data = Input::all();

            $rules = array(
                'comment' => 'required'
            );

            $validator = Validator::make($data, $rules);

            if ($validator->passes())
            {
                $comment = new Comment;
                $comment->body = Input::get('comment');
                $comment->commenter_id = Auth::id();
                $comment->post_id = $post_id;
                $comment->save();

                return Redirect::to('/comment/'.$post_id);
            }
            else
            {
                return Redirect::to('/comment/'.$post_id)
                    ->withErrors($validator);
            }
        }
        else
        {
            return Redirect::to('login');
        }
    }
}
