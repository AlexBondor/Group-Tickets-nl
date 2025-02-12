<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Guzzle\Http\Client as Guzzle;

class AdminController extends Controller {

	private $users;

	public function __construct()
	{
		$this->middleware('auth');

		$this->users = User::all();
	}

	public function composeMessage()
	{
		if (Auth::user()->provider_id != getenv('ADMIN_ID'))
		{
			return view('errors.503');
		}
		return view('admin.compose');
	}

	public function sendMessage()
	{
		if (Auth::user()->provider_id != getenv('ADMIN_ID'))
		{
			return view('errors.503');
		}
	 	$message = Request::get('message');
	 	$callback = "updates";
        $access_token = getenv('FACEBOOK_CLIENT_ID') . "|" . getenv('FACEBOOK_CLIENT_SECRET');

        // Send admin message as FB notification to each
        // DB user
        foreach ($this->users as $user)
        {
            $url =  "https://graph.facebook.com/" . $user->provider_id .
                "/notifications?access_token=" . $access_token .
                "&template=" . $message .
                "&href=" . $callback;
            $client = new Guzzle($url);
            $client->post()->send();
        }
	}

	public function showUpdates()
	{
		return view('admin.updates');
	}
}
