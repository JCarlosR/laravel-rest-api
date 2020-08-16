<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Withdraw from non-existing account
    // POST /event {"type":"withdraw", "origin":"200", "amount":10}
    // 404 0

    public function store(Request $request)
    {
        // Event::create(...);
        
        if ($request->input('type') === 'deposit') {
            return $this->deposit(
                $request->input('destination'),
                $request->input('amount')
            );
        } elseif ($request->input('type') === 'withdraw') {
            return $this->withdraw(
                $request->input('origin'),
                $request->input('amount')
            );        
        }
    }
    
    private function deposit($destination, $amount)
    {
        $account = Account::firstOrCreate([
            'id' => $destination
        ]);
        
        $account->balance += $amount;
        $account->save(); // UPDATE
        
        return response()->json([
            'destination' => [
                'id' => $account->id,
                'balance' => $account->balance
            ]
        ], 201);
    }
    
    private function withdraw($origin, $amount)
    {
        $account = Account::findOrFail($origin);
        
    }
}
