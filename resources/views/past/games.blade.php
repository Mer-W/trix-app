<x-layout>
    <x-slot name='script'></x-slot>

    <x-slot name='title'>Past Games</x-slot>
    <h2 class="text-center my-5">Past Games</h2>

    <div class="row justify-content-center" style="margin-top: 70;">
        <div class="col-md-10">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">North</th>
                        <th scope="col">East</th>
                        <th scope="col">South</th>
                        <th scope="col">West</th>
                        <th scope="col">Progress</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($games as $game)
                            <td rowspan="2"><a href="/games/{{ $game->id }}">{{ $game->date }}</a></td>
                            <td>{{ $game->north->username }}</td>
                            <td>{{ $game->east->username }}</td>
                            <td>{{ $game->south->username }}</td>
                            <td>{{ $game->west->username }}</td>
                            <td></td>
                    </tr>
                    <tr>

                        <td>{{ $game->final_n }}</td>
                        <td>{{ $game->final_e }}</td>
                        <td>{{ $game->final_s }}</td> 
                        <td>{{ $game->final_w }}</td>
                        @if ($game->hands->count() == 20)
                        <td>Completed</td>
                        @else
                        <td>{{$game->hands->count()}}/20</td>
                        @endif

                    </tr>

                    
                    @endforeach

                </tbody>
            </table>
            <div class="col-auto my-3">
                <a href="new" class="btn btn-primary">New Game</a>
            </div>
        </div>
    </div>
</x-layout>
