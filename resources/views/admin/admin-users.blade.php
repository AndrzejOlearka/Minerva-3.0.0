@extends('admin/admin')

@section('title', 'Minerva - Admin Panel')

@section('content')

<header>
    <br><h1>Zarządzanie użytkownikami</h1>
</header>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Użytkownik</th>
        <th>Level</th>
        <th>Exp</th>
        <th>Monety</th>
        <th>Premium</th>
        <th>Czas Banu</th>
        <th colspan="2">Zbanowanie</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->user }}</td>
            <td>{{ $user->level }}</td>
            <td>{{ $user->exp }}</td>
            <td>{{ $user->coins }}</td>
            <td>   
                @if($user->premium_end > date('Y-m-d'))
                    Yes
                @else
                    No
                @endif
            </td>
            
            @if(!empty($user->bans->last()))
                <td><input class="date form-control" value="{{ date('Y-m-d', strtotime($user->bans->last()->date_end)) }}" type="text" style="width:160px"></td>
                <td>
                    <select data-id="{{ $user->id }}" name="banReason">
                        <option value="1" @if($user->bans->last()->reason == 1) {{'selected'}} @endif>Behaviour</option>
                        <option value="1" @if($user->bans->last()->reason == 2) {{'selected'}} @endif>Nickname</option>
                    </select>
                </td>
                <td><button class="unbanUser btn btn-primary" data-id="{{ $user->id }}" name="userUnban">Unban User</button></td>
            @else
                <td><input class="date form-control" data-id="{{ $user->id }}" value="" type="text" style="width:160px"></td>
                <td>
                    <select data-id="{{ $user->id }}" name="banReason">
                        <option value="1">Behaviour</option>
                        <option value="1">Nickname</option>
                    </select>
                </td>
                <td><button class="banUser btn btn-primary" data-id="{{ $user->id }}" name="userBan">Ban User</button></td>
            @endif
        </tr>
    @endforeach

</table>

<br>

<div class="d-flex">
    <div class="mx-auto">
        {{ $users->links() }}
    </div>
</div>

<header>
    <br><h1>Miłej pracy!</h1>
</header>

@endsection
