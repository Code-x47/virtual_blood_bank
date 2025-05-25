<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\BloodInventory;
use Symfony\Component\HttpFoundation\Response;

class BloodBankMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $bloodInventoryId = (int) $request->route('id');

        $bloodInventory = BloodInventory::where("blood_bank_id",$bloodInventoryId)
        ->firstOrFail();
         $bank_id     =   $bloodInventory->blood_bank_id;  

        if(!$user || !$user->blood_bank || $user->blood_bank->id !== $bank_id) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
