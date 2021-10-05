<x-app-layout>
<style>
    .table-title {
        margin-top:3%;
        margin-bottom:3%;
        color:black;
        font-size:300%;
    }
</style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listes des utilisateurs
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @foreach ($groupedUsers as $status => $users)
                <h1 class="table-title">{{ $status }}s :</h1>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Photo</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Membre depuis</th>
                            <th scope="col">Description</th>
                            @if ($status != 'Admin')
                            <th scope="col">Promotion</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                @if (!empty($user->avatar))
                                    <img src="{{ asset('img/users/'.$user->avatar) }}" alt="Photo de {{$user->firstname}}"
                                    style="width:75px;width:75px;">
                                @else
                                    <img src="{{ asset('img/users/no-profile.jpg') }}" alt="Photo de profil" style="width:75px;width:75px;">
                                @endif
                                </td>
                                <td>{{ strtoupper($user->lastname) }}</td>
                                <td>{{ $user->firstname }}</td>
                                <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                                <td>{{ $user->description }}</td>
                                <td>
                                @if ($status == 'Membre')
                                    <form id="frmPromote" action="{{ route('backend.user.promote', $user->id) }}" method="post">
                                        @csrf
                                        <button name="status" value="vérifié" class="btn btn-primary">Vérifé</button>
                                        <button name="status" value="modérateur" class="btn btn-primary">Modérateur</button>
                                        <button name="status" value="admin" class="btn btn-primary">Admin</button>
                                    </form>
                                @elseif($status == 'Vérifié')
                                    <form id="frmPromote" action="{{ route('backend.user.promote', $user->id) }}" method="post">
                                        @csrf
                                        <button name="status" value="membre" class="btn btn-primary">Membre</button>
                                        <button name="status" value="modérateur" class="btn btn-primary">Modérateur</button>
                                        <button name="status" value="admin" class="btn btn-primary">Admin</button>
                                    </form>
                                @elseif($status == 'Modérateur')
                                    <form id="frmPromote" action="{{ route('backend.user.promote', $user->id) }}" method="post">
                                        @csrf
                                        <button name="status" value="membre" class="btn btn-primary">Membre</button>
                                        <button name="status" value="vérifié" class="btn btn-primary">Vérifé</button>
                                        <button name="status" value="admin" class="btn btn-primary">Admin</button>
                                    </form>
                                @elseif($status == 'Admin')
                                    <form id="frmPromote" action="{{ route('backend.user.promote', $user->id) }}" method="post">
                                        @csrf
                                        <button name="status" value="membre" class="btn btn-primary">Membre</button>
                                        <button name="status" value="vérifié" class="btn btn-primary">Vérifé</button>
                                        <button name="status" value="modérateur" class="btn btn-primary">Modérateur</button>
                                    </form>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        {{ $users->links() }}
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
