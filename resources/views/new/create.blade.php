<x-layout>
    <x-slot name='script'></x-slot>

    <x-slot name='title'>New Game</x-slot>
    <h2 class="text-center my-5">New Game</h2>

    <div class="row justify-content-center"">
        <div class="col-md-10">
            <form action="/new" method="post">
                @csrf
                <div class="form-group">

                    <div class="row m-3">
                        <label for='north_id'>Who has the 2 of clubs?</label>
                        <div class="col">

                            <select class="col-auto" required name="north_id">

                                @foreach ($users as $player)
                                    <li>
                                        <option value={{ $player->id }} selected>{{ $player->username }}</option>
                                    </li>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row m-3">
                        <div class="col">
                            <label for='east_id'>East: </label>

                            <select required name="east_id">
                                @foreach ($users as $player)
                                    <li>
                                        <option value={{ $player->id }} selected>{{ $player->username }}</option>
                                    </li>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col">

                            <label for="south">South: </label>

                            <select required name="south_id">

                                @foreach ($users as $player)
                                    <li>
                                        <option value={{ $player->id }} selected>{{ $player->username }}</option>
                                    </li>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col">
                            <label for="west_id">West: </label>
                            <select required name="west_id">
                                @foreach ($users as $player)
                                    <li>
                                        <option value={{ $player->id }} selected>{{ $player->username }}</option>
                                    </li>
                                @endforeach
                            </select>
                        </div>


                    </div>
                </div>




                <input type="submit" name="send" value="Begin Game" class="btn btn-primary mt-5">

            </form>
            <div id="btnBack" class="row justify-content-center">
                <div class="col-auto my-3">
                    <a href="/games" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
