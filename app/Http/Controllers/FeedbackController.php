<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\FeedbackModel;
use Auth;
use Mail;


class FeedbackController extends Controller
{
	public function user_feedback(Request $request)
	{
		$user_name = Auth::user()->name.' '.Auth::user()->last_name;
		$this->validate($request, [
			'comment_option' => 'required',
			'comment' => 'required',
		]);

		$option = $request->get('comment_option');
		if($option == 'ontevreden')
		{
			$comment_option = 'Ontevreden';
		}
		elseif($option == 'wel_oke'){
			$comment_option = 'Wel oke';
		}
		elseif ($option == 'top_software') {
			$comment_option = 'Top software';
		}

		Mail::send('email',
			array(
				'user_name' => $user_name,
				'comment_option' => $comment_option,
				'comment' => $request->get('comment')
			), function($message)
			{
				// $message->from('abdulbasit3398@gmail.com');
				$message->to('wouter.blokhuis@gmail.com', 'Admin')->subject('User Feedback');
			});
		return redirect()->back();
	}
}
