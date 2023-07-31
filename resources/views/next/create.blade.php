<x-layout>
    <x-slot name='script'>

    </x-slot>
    <script src={{ asset('script.js') }}></script>

    <x-slot name='title'>Next Hand</x-slot>
    <h2 class="text-center mt-5">Next Hand</h2>

    <div class="row justify-content-center" style="margin-top: 70;">
        <div class="col-md-10">
            @foreach ($game as $game)
                @if ($game->hands->count() < 20)
                    <form action="/games/{{ $game->id }}/next" method="post">
                        @csrf
                        <div class="form-group">
                            <div id="gameInfo">
                                <div class="row justify-content-center">
                                    <label class="col-auto">Game ID: {{ $game->id }}</label>
                                    <input type="hidden" class="col-auto" required name="game_id"
                                        value={{ $game->id }}>
                                </div>
                                <div class="row justify-content-center mb-2">
                                    <div class="col-auto">Hand: {{ $game->hands->count() + 1 }} / 20</div>
                                </div>

                                {{-- DEALER --}}
                                <div class="row justify-content-center">
                                    @if ($game->hands->count() < 5)
                                        @php $dealer = $game->north @endphp
                                        <label class="col-auto my-2">Dealer: {{ $game->north->username }}</label>
                                        <input type="hidden" class="col-auto" required name="dealer_id"
                                            value={{ $game->north->id }}>
                                    @elseif ($game->hands->count() < 10)
                                        @php $dealer = $game->east @endphp
                                        <label class="col-auto my-2">Dealer: {{ $game->east->username }}</label>
                                        <input type="hidden" class="col-auto" required name="dealer_id"
                                            value={{ $game->east->id }}>
                                    @elseif ($game->hands->count() < 15)
                                        @php $dealer = $game->south @endphp
                                        <label class="col-auto my-2">Dealer: {{ $game->south->username }}</label>
                                        <input type="hidden" class="col-auto" required name="dealer_id"
                                            value={{ $game->south->id }}>
                                    @else
                                        @php $dealer = $game->west @endphp
                                        <label class="col-auto my-2">Dealer: {{ $game->west->username }}</label>
                                        <input type="hidden" class="col-auto" required name="dealer_id"
                                            value={{ $game->west->id }}>
                                    @endif
                                </div>
                                {{-- AVAILABLE CONTRACTS --}}
                                <div id="chooseContract">
                                    <div class="row justify-content-center">
                                        <label class="col-auto">Contract:</label>
                                    </div>

                                    @if ($game->jacks($dealer) === 0)
                                        <div class="row justify-content-center">
                                            <div class="col-auto">

                                                <label for="j">Jacks</label>

                                                <input type="radio" name="contract" value='j'>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($game->queens($dealer) === 0)
                                        <div class="row justify-content-center">
                                            <div class="col-auto">

                                                <label for="q">Queens</label>

                                                <input type="radio" name="contract" value='q'>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($game->king($dealer) === 0)
                                        <div class="row justify-content-center">
                                            <div class="col-auto">

                                                <label for="k">King of Hearts</label>

                                                <input type="radio" name="contract" value='k'>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($game->nt($dealer) === 0)
                                        <div class="row justify-content-center">
                                            <div class="col-auto">

                                                <label for="nt">No Tricks</label>

                                                <input type="radio" name="contract" value='nt'>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($game->diamonds($dealer) === 0)
                                        <div class="row justify-content-center">
                                            <div class="col-auto">

                                                <label for="d">Diamonds</label>

                                                <input type="radio" name="contract" value='d'>
                                            </div>
                                        </div>
                                    @endif
                                    <button id="btnScores" class="col-auto btn btn-primary mt-5">Enter Scores</button>
                                </div>
                            </div>

                            {{-- JACKS PLACES / NUMBER OF QUEENS --}}
                            <div id="scoreJacks">
                                <div class="row justify-content-center">
                                    <div class="col-auto">Enter Jacks places by player</div>
                                </div>
                            </div>

                            <div id="scoreQueens">
                                <div class="row justify-content-center">
                                    <div class="col-auto">Enter Queens count by player</div>
                                </div>
                            </div>


                            {{-- KING LOSER --}}
                            <div id="scoreKing">
                                <div class="row justify-content-center">
                                    <div class="col-auto">Who took the King?</div>
                                </div>
                                <div class="row justify-content-center">

                                    <div class="col-auto">
                                        <button id="btnKingN" class="btn">{{ $game->north->username }}</button>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-auto">

                                        <button id="btnKingE" class="btn">{{ $game->east->username }}</button>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-auto">

                                        <button id="btnKingS" class="btn">{{ $game->south->username }}</button>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-auto">

                                        <button id="btnKingW" class="btn">{{ $game->west->username }}</button>
                                    </div>
                                </div>
                            </div>

                            {{-- NUMBER OF TRICKS --}}
                            <div id="scoreTricks">
                                <div class="row justify-content-center">
                                    <div class="col-auto">Enter trick count by player:</div>
                                </div>
                            </div>

                            <div id="input">
                                <div class="row justify-content-center">
                                    <label class="col-auto">{{ $game->north->username }}: </label>
                                    <input class="col-auto" type="number" min="0" max="13"
                                        name="north" required>
                                </div>
                                <div class="row justify-content-center">
                                    <label class="col-auto">{{ $game->east->username }}: </label>
                                    <input class="col-auto" type="number" min="0" max="13"
                                        name="east" required>
                                </div>
                                <div class="row justify-content-center">
                                    <label class="col-auto">{{ $game->south->username }}: </label>
                                    <input class="col-auto" type="number" min="0" max="13"
                                        name="south" required>
                                </div>
                                <div class="row justify-content-center">
                                    <label class="col-auto">{{ $game->west->username }}: </label>
                                    <input class="col-auto" type="number" min="0" max="13"
                                        name="west" required>
                                </div>
                            </div>

                            <div id="save" class="row mt-3 justify-content-center">
                                <div class="col-auto">
                                    <input id="btnSubmit" type="submit" name="send" value="Save"
                                        class="btn btn-primary">
                                </div>
                            </div>
                    </form>
                    <div id="btnBack" class="row justify-content-center">
                        <div class="col-auto my-3">
                            <a href="/games" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                @else
                    game complete. start new or go back
                    <div>
                        <div class="col-auto my-3">
                            <a href="/new" class="btn btn-primary">New Game</a>
                        </div>
                        <div class="col-auto my-3">
                            <a href="/games" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-layout>
