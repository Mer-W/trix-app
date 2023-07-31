<x-layout>
    <x-slot name='script'></x-slot>

    <x-slot name='title'>Game Details</x-slot>

    <h2 class="text-center my-5">Game Details</h2>

    <div class="row justify-content-center" style="margin-top: 70;">
        <div class="col-md-10">


            @foreach ($games as $game)
                @if ($game->hands->count() == 0)
                    <div class="col-auto my-3">
                        <a href="/games/{{ $game->id }}/next" class="btn btn-primary">Enter Hands</a>
                    </div>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Dealer</th>
                                <th scope="col">Contract</th>
                                @foreach ($hands as $hand)
                                    @if ($loop->first)
                                        <td>{{ $hand->game->north->username }}</td>
                                        <td>{{ $hand->game->east->username }}</td>
                                        <td>{{ $hand->game->south->username }}</td>
                                        <td>{{ $hand->game->west->username }}</td>

                            </tr>
                        </thead>
                        <tbody>
                @endif
                @endforeach
                @endif
                @endforeach

                @foreach ($games as $game)
                @unless ($game->hands->count() == 0)
                @foreach ($hands as $hand)
                <tr>

                    @if ($loop->index % 5 == 0)
                        <th rowspan="5">{{ $hand->dealer->username }}</th>
                    @endif
                    @switch($hand->contract)
                        @case('j')
                            <td>J</td>
                        @break

                        @case('q')
                        <td>Q</td>
                        @break

                        @case('k')
                            <td>K&#x2661</td>
                        @break

                        @case('nt')
                            <td>NT</td>
                        @break

                        @case('d')
                            <td>&#x2662</td>
                        @break

                        @default
                        @break
                    @endswitch
                    {{-- <td>{{ $hand->contract }}</td> --}}
                    <td>{{ $hand->north }}</td>
                    <td>{{ $hand->east }}</td>
                    <td>{{ $hand->south }}</td>
                    <td>{{ $hand->west }}</td>
                </tr>
                @endforeach
                @endunless
                @endforeach

                @foreach ($games as $game)
                @unless ($game->hands->count() == 0)
                @foreach ($hands as $hand)
                @if ($loop->first)
                    <td></td>
                    <th>Totals:</th>
                    <td>{{ $hand->game->score_n() }}</td>
                    <td>{{ $hand->game->score_e() }}</td>
                    <td>{{ $hand->game->score_s() }}</td>
                    <td>{{ $hand->game->score_w() }}</td>
                    </tbody>
                    </table>
                    <div>
                @endif
                @endforeach
                @endunless
                @endforeach

                @foreach ($games as $game)
                @unless ($game->hands->count() == 0)
                @foreach ($hands as $hand)
                @if ($hand->game->hands->count() < 20 && $loop->first)
                    <div class="col-auto my-3">
                        <a href="games/{{ $hand->game_id }}/next" class="btn btn-primary">Next Hand</a>
                    </div>
                @endif
            @endforeach
            @endunless
            @endforeach


            <div class="col-auto my-3">
                <a href="/games" class="btn btn-primary mt-5">Back</a>
            </div>
        </div>
    </div>
    </div>
</x-layout>
