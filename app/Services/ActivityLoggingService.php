<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ActivityLoggingService {

 public function LoginLog() {
   Log::info('User updated profile', [
        'user_id' => Auth::id(),
        'ip' => request()->ip(),
    ]);
 }



}
