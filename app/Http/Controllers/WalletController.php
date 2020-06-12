<?php

namespace App\Http\Controllers;

use App\Http\Requests\WalletRequest;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets = Auth::user()->wallets;
        $totalBalances[Wallet::CASH] = 0;
        $totalBalances[Wallet::CREDIT_CARD] = 0;
        $totalBalances[Wallet::CRYPTO_CURRENCY] = 0;
        foreach ($wallets as $wallet) {
            switch ($wallet->type) {
                case Wallet::CASH:
                    $totalBalances[Wallet::CASH] += $wallet->amount;
                    break;
                case  Wallet::CREDIT_CARD:
                    $totalBalances[Wallet::CREDIT_CARD] += $wallet->amount;
                    break;
                case  Wallet::CRYPTO_CURRENCY:
                    $totalBalances[Wallet::CRYPTO_CURRENCY] += $wallet->amount;
                    break;
            }
        }

        return view('wallet.index',
            compact(['wallets', 'totalBalances']));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WalletRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $item = (new Wallet())->create($data);

        if ($item) {
            return redirect()
                ->route('wallet.index')
                ->with(['success' => 'Success']);
        } else {
            return back()
                ->withErrors(['msg' => 'Saving Error'])
                ->withInput();
        }
    }

}
