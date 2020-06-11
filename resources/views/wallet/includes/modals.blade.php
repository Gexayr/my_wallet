<!-- Modal -->
<div class="modal fade" id="addWallet" tabindex="-1" role="dialog" aria-labelledby="addWalletLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('wallet.store')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addWalletLabel">Add Wallet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="wallet-name" class="col-form-label">Name</label>
                        <input type="text" class="form-control" id="wallet-name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="wallet-type" class="col-form-label">Type</label>
                        <select class="custom-select" id="wallet-type" name="type">
                            <option selected>Choose...</option>
                            <option value="{{\App\Wallet::CASH}}">{{\App\Wallet::TYPES[\App\Wallet::CASH]}}</option>
                            <option value="{{\App\Wallet::CREDIT_CARD}}">{{\App\Wallet::TYPES[\App\Wallet::CREDIT_CARD]}}</option>
                            <option value="{{\App\Wallet::CRYPTO_CURRENCY}}">{{\App\Wallet::TYPES[\App\Wallet::CRYPTO_CURRENCY]}}</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addRecord" tabindex="-1" role="dialog" aria-labelledby="addRecordLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('record')}}" method="post">
                @csrf
                <input type="hidden" name="wallet_id" id="wallet_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRecordLabel">Add Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="wallet-name" class="col-form-label">Amount</label>
                        <input type="text" class="form-control" id="wallet-name" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="wallet-type" class="col-form-label">Type</label>
                        <select class="custom-select" id="wallet-type" name="type">
                            <option value="">Choose...</option>
                            <option value="{{\App\Record::CREDIT}}">{{\App\Record::TYPES[\App\Record::CREDIT]}}</option>
                            <option value="{{\App\Record::DEBIT}}">{{\App\Record::TYPES[\App\Record::DEBIT]}}</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
