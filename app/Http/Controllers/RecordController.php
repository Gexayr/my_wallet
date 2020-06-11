<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordRequest;
use App\Record;
use App\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecordRequest $request)
    {
        $data = $request->validated();
        DB::transaction(function () use ($data) {
            $wallet = Wallet::find($data['wallet_id']);
            if (Auth::user()->id != $wallet->user_id) {
                return back()
                    ->withErrors(['msg' => "wrong wallet id"])
                    ->withInput();
            }
            $record = new Record();
            $record->create($data);

            $data['type'] == Record::CREDIT ? $data['amount'] = ($data['amount'] * -1) : $data['amount'] = abs($data['amount']);
            $wallet->amount += $data['amount'];
            $wallet->save();
        });

        return redirect()
            ->route('wallet.index')
            ->with(['success' => 'Success']);
    }

}
