@extends('layouts.app')

@section('content')
    <div class="container">
        @include('wallet.includes.result_messages')

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My wallets</div>

                    <div class="card-body">
                        @if(!$wallets->isEmpty())
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Balance</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($wallets as $key => $wallet)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td><a href="#" class="add-record" data-toggle="modal" data-target="#addRecord" data-id="{{$wallet->id}}">{{$wallet->name}}</a></td>
                                    <td>{{\App\Wallet::TYPES[$wallet->type]}}</td>
                                    <td>{{$wallet->amount}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addWallet">
                            + Add
                        </button>
                    </div>
                </div>

                @if(!$wallets->isEmpty())
                    <div class="card balance_section">
                        <div class="card-header">Total Balance</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    @foreach(\App\Wallet::TYPES as $walletType)
                                    <th scope="col">{{$walletType}}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    @foreach ($totalBalances as $total)
                                        <td>{{$total}}</td>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>

    @include('wallet.includes.modals')

@endsection
