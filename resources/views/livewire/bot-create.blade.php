<form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
<div class="row">
    <div class="col-8">
        <div class="card-header d-flex justify-content-between">
            <h2>{{ $updateMode ? 'Edit Bot' : 'Create New Bot' }}</h2>

        </div>
        <div class="">


            @if (session()->has('message'))
                <div class="alert alert-dark">
                    {{ session('message') }}
                </div>
            @endif



                <div class="card">
                    <div class="card-header">
                        Main
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="bot_name">Bot Name:</label>
                                <input type="text" class="form-control" id="bot_name" wire:model="bot_name">
                                @error('bot_name')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="exchange">Exchange:</label>
                                <div class="input-group input-group-button">
                                    <input type="text" class="form-control" value="{{auth()->user()->exchange}}" placeholder="Right Button">
                                    <button class="btn btn-dark" type="button">Change</button>
                                    </div>

                                @error('exchange')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror

                            </div>
                            {{-- end of row --}}
                            <div class="row mt-2">
                                <div class="col-6">
                                    <h6>Strategy</h6>
                                    <div class="btn-group" role="group">
                                        <input type="radio" {{($strategy=="long")?"checked":""}} wire:click='changeStrategy("long")' class="btn-check" name="strategy" value="long" id="btnLong"
                                            checked>
                                        <label class="btn btn-tabs px-5" for="btnLong">Long</label>

                                        <input type="radio" {{($strategy=="short")?"checked":""}} wire:click='changeStrategy("short")' class="btn-check" name="strategy" id="btnShort">
                                        <label class="btn btn-tabs px-5" for="btnShort">Short</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h6>Bot Pair</h6>
                                    <div class="btn-group" role="group">
                                        <input type="radio" class="btn-check" name="bot_type" wire:click='changePair("single")' id="btnsingle-pair"
                                        {{($bot_type=="single")?"checked":""}}>
                                        <label class="btn btn-tabs px-5" for="btnsingle-pair">Single </label>

                                        <input type="radio" class="btn-check" name="bot_type" wire:click='changePair("multi")' id="btnmulti-pair" {{($bot_type=="multi")?"checked":""}}>
                                        <label class="btn btn-tabs px-5" for="btnmulti-pair">Multi </label>
                                    </div>
                                </div>
                            </div>
                            {{-- end of row --}}
                        </div>
                    </div>
                </div>
                {{-- end of card --}}
                <hr>
                <div class="card  my-2">
                    <div class="card-header">
                        Entry Point
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-6">
                                <label for="base_order">Base Order:</label>
                                <div class="input-group input-group-dropdown mt-1">
                                    <input type="number" min="0" wire:model="base_order" class="form-control"
                                        aria-label="Text input with dropdown button">
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">USDT</button>
                                    <div class="dropdown-menu" style="">
                                        <a class="dropdown-item" href="#!">USDT</a>
                                    </div>
                                </div>

                                @error('base_order')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <h6>Start Order Type</h6>
                                <div class="btn-group" role="group">
                                    <input wire:click='changeOrder("limit")' value="limit" type="radio" class="btn-check" name="order_type" id="btnLimit" {{($order_type=="limit")?"checked":""}}>
                                    <label class="btn btn-tabs px-5"  for="btnLimit">Limit</label>

                                    <input type="radio" wire:click='changeOrder("market")' value="market" class="btn-check" name="order_type" id="btnMarket" {{($order_type=="market")?"checked":""}}>
                                    <label class="btn btn-tabs px-5" for="btnMarket">Market</label>
                                </div>
                            </div>
                        </div>
                        {{-- end of row --}}
                    </div>

                </div>
                {{-- end of card --}}

                <div class="card  my-2">
                    <div class="card-header">
                        Deal Start Conditions
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-12">
                                <label for="deal_start_condition">Condition:</label>
                                <select class="form-control" wire:model='deal_start_condition' name="deal_start_condition" id="">
                                    <option value="cqs">CQS Condition</option>
                                    <option value="qfl">QFL Condition</option>
                                </select>

                                @error('deal_start_condition')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                               {{-- <button class="btn btn-dark ">Add Condition</button> --}}
                            </div>
                        </div>
                        {{-- end of row --}}
                    </div>

                </div>
                {{-- end of card --}}





                @if ($updateMode)
                    <button type="button" class="btn btn-dark" wire:click="cancel">Cancel</button>
                @endif

        </div>

    </div>
    <div class="col-4 mt-3">
        <div class=" d-flex justify-content-end">

            <button type="button" wire:click="listMode" class="btn btn-dark">Bot Lists</button>
        </div>
        <div class="card ">

            <div class="card-body">
                <div class="row bg-white mb-1">
                    <div class="col-sm-12 ">
                        <h6>Exchange : <b>{{auth()->user()->exchange}}</b> </h6>
                        <h6>Status : <b>Pending</b> </h6>
                        <h6>Bot Pair : <b>{{$bot_type}}</b> </h6>
                        <h6>Strategy : <b>{{$strategy}}</b> </h6>
                        <hr>
                        <button type="submit" class="btn waves-effect waves-light btn-primary btn-outline-primary w-100"><i class="icofont icofont-user-alt-3"></i>
                            {{ $updateMode ? 'Update' : 'Create' }}
                            Bot
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
