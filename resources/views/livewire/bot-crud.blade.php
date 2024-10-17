<div class="pcoded-content">
    <style>
        .btn-group {
            border: 1px solid #263544;
            background: rgba(241, 240, 240, 0.733);
        }

        .btn-tabs:hover {
            background-color: white;
        }

        .btn-check:checked+.btn-tabs {
            background-color: white;
        }
        .btn-tabs {
            background-color: #263544;
            color: aliceblue
        }
    </style>
    <div class="page-header ">
    </div>

    <div class="pcoded-inner-content">
        @if (!$ListMode)
        @include('livewire.bot-create')

        @else
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2>Bot List</h2>
                    <button type="button" wire:click="createMode" class="btn btn-dark">Create Bot</button>
                </div>
                <div class="card-body">

                    <table class="table ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Bot Name</th>
                                <th>Market Type</th>
                                <th>Strategy</th>
                                <th>Bot Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bots as $bot)
                                <tr>
                                    <td>{{ $bot->id }}</td>
                                    <td>{{ $bot->bot_name }}</td>
                                    <td>{{ $bot->market_type }}</td>
                                    <td>{{ $bot->strategy }}</td>
                                    <td>{{ $bot->bot_type }}</td>
                                    <td>{{ $bot->deal_start_conditions }}</td>
                                    <td>
                                        <button wire:click="edit({{ $bot->id }})">Edit</button>
                                        <button wire:click="delete({{ $bot->id }})"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        @endif
    </div>

</div>
