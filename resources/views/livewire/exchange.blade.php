
<div>

    @if ($isModalOpened)
  <form action="" >
    <div class="card">
        <div class="card-header">Exchange Details</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                   @if ($messageAlert)
                   <div class="alert alert-primary text-center">
                    Exchange Data has been saved
                </div>
                   @endif
                </div>
                <div class="col-sm-6">
                    <div class="form-group form-primary">
                        <label class="form-label float-label">Api Key</label>
                        <input type="text" wire:model='api_key' name="api_key" class="form-control" >
                        <span class="form-bar"></span>
                        @error('api_key')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                 <div class="col-sm-6">
                     <div class="form-group form-primary">
                        <label class="form-label float-label">Api Secrect</label>
                        <input wire:model='api_secrect' type="text" name="api_secrect" class="form-control" >
                        <span class="form-bar"></span>
                        @error('api_secrect')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                 </div>
                 <div class="col-sm-12 d-flex justify-content-between">
                    <button type="button" wire:click="back"  class="btn btn-primary float-right">Back </button>
                    <button type="button" wire:click="saveExchange"  class="btn btn-dark float-right">Save </button>
                 </div>
               </div>
               .
        </div>
      </div>
  </form>
@else
<div class="row">

    @if ($exchangeOld!="")
    <h4 class="mb-1">Seclect Exchange</h4>
    <div class="col-3 mb-3">
        <button wire:click='updateExchange()' class="btn exchange-btn w-100" >
            <img src="{{url('guest/currencies/'.ucfirst($exchangeOld).'.svg')}}" />
        </button>
    </div>
    @endif

</div>
<hr>
<div class="row">
    <!-- Exchange buttons -->
    <div class="col-3 mb-3">
        <button wire:click='setExchange("binance")' class="btn exchange-btn w-100" >
            <img src="{{url('guest/currencies/Binance.svg')}}" />
        </button>
    </div>
    <div class="col-3 mb-3">
        <button wire:click='setExchange("binance.us")' class="btn exchange-btn w-100" >
            <img src="{{url('guest/currencies/Binance.us.svg')}}" />
        </button>
    </div>
    <div class="col-3 mb-3">
        <button wire:click='setExchange("coinbase")' class="btn exchange-btn w-100" >
            <img src="{{url('guest/currencies/Coinbase.svg')}}" />
        </button>
    </div>
    <div class="col-3 mb-3">
        <button wire:click='setExchange("gate")' class="btn exchange-btn w-100" >
            <img src="{{url('guest/currencies/Gate.svg')}}" />
        </button>
    </div>
    <div class="col-3 mb-3">
        <button wire:click='setExchange("huobi")' class="btn exchange-btn w-100" >
            <img src="{{url('guest/currencies/Huobi.svg')}}" />
        </button>
    </div>
    <div class="col-3 mb-3">
        <button wire:click='setExchange("kucoin")' class="btn exchange-btn w-100" >
            <img src="{{url('guest/currencies/Kucoin.svg')}}" />
        </button>
    </div>
    <div class="col-3 mb-3">
        <button wire:click='setExchange("okx")' class="btn exchange-btn w-100" >
            <img src="{{url('guest/currencies/Okx.svg')}}" />
        </button>
    </div>
    <div class="col-3 mb-3">
        <button wire:click='setExchange("pionex")' class="btn exchange-btn w-100">
            <img src="{{url('guest/currencies/Pionex.svg')}}" />
        </button>
    </div>
</div>

@endif
</div>


