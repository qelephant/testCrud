@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    <p><a href="{{ route('users.create') }}">Create new user</a></p>
    @if($users->isNotEmpty())
    <div class="container mt-5">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr class="table-info">
                    <th scope="col">#</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Name</th>
                    <th scope="col">Patronymic</th>
                    <th scope="col">B day</th>
                    <th scope="col">City</th>
                    <th scope="col">Work</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->patronymic }}</td>
                    <td>{{ $user->getAge() }} лет</td>
                    <td>{{ $user->city->name }}</td>
                    <td>{{ $user->work->name }}</td>
                    <td>
                        <a href="{{ route('users.show', $user) }}" class="btn btn-primary" >Show</a>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary" >Edit</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        {{ $users->links() }}
    @else
    <h3>Базы данных пуст</h3>
    @endif
@endsection
