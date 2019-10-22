<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FeedbackModel extends Model
{
  public $table = 'user_feedback';

  public $fillable = ['user_id','comment_option','comment'];
  
}
