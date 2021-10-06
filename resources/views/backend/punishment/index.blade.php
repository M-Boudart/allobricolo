<x-app-layout>
<style>
    .btn-success {
        margin-bottom : 5px;
    }

    table a {
        color: #0d6efd;
    }
</style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listes des punitions
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
                <div>
                @if (sizeof($suspendedUsers) > 0)
                    <h1>Utilisateurs suspendu</h1>
                    <table class="table table-striped mb-6">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Utilisateur</th>
                                <th scope="col">Suspendu par</th>
                                <th scope="col">Raison</th>
                                <th scope="col">A partir de</th>
                                <th scope="col">Jusqu'au</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($suspendedUsers as $suspension)
                                <tr>
                                    <td>{{ $suspension->id }}</td>
                                    <td>
                                        {{ strtoupper($suspension->reportedUser->lastname) }}
                                        {{ $suspension->reportedUser->firstname }}
                                    
                                    </td>
                                    <td>
                                        {{ strtoupper($suspension->reportedBy->lastname) }}
                                        {{ $suspension->reportedBy->firstname }}
                                    
                                    </td>
                                    <td><a href="#" target="_blank">Consulter</a></td>
                                    <td>
                                        {{ date('d-m-Y', strtotime($suspension->from_date)) }}
                                    </td>
                                    <td>
                                        {{ date('d-m-Y', strtotime($suspension->to_date)) }}
                                    </td>
                                    <td>
                                    @if (strtotime($suspension->to_date) >= time())
                                        <form action="{{ route('backend.punishment.stopPunishment', $suspension->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="type" value="suspension">
                                        <button class="btn btn-success" onclick="return confirm('Etes vous sûr de vouloir lever la suspension n°{{$suspension->id}}')">Lever la suspension</button>
                                        </form>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col">
                            {{ $suspendedUsers->links() }}
                        </div>
                    </div>
                @endif
                @if (sizeof($bannedUsers) > 0)
                    <h1>Utilisateurs bannis</h1>
                    <table class="table table-striped mb-6">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Utilisateur</th>
                                <th scope="col">Banni par</th>
                                <th scope="col">Raison</th>
                                <th scope="col">A partir de</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($bannedUsers as $banned)
                                <tr>
                                    <td>{{ $banned->id }}</td>
                                    <td>
                                        {{ strtoupper($banned->reportedUser->lastname) }}
                                        {{ $banned->reportedUser->firstname }}
                                    
                                    </td>
                                    <td>
                                        {{ strtoupper($banned->reportedBy->lastname) }}
                                        {{ $banned->reportedBy->firstname }}
                                    
                                    </td>
                                    <td><a href="#" target="_blank">Consulter</a></td>
                                    <td>
                                        {{ date('d-m-Y', strtotime($banned->from_date)) }}
                                    </td>
                                    <td>
                                        <form action="{{ route('backend.punishment.stopPunishment', $banned->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="type" value="ban">
                                        <button class="btn btn-success" onclick="return confirm('Etes vous sûr de vouloir lever la lever le bannissement n°{{$banned->id}}')">Deban</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col">
                            {{ $bannedUsers->links() }}
                        </div>
                    </div>
                @endif
                @if (sizeof($unBannedUsers) > 0)
                    <h1>Utilisateurs unban</h1>
                    <table class="table table-striped mb-6">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Utilisateur</th>
                                <th scope="col">Banni du</th>
                                <th scope="col">Au</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($unBannedUsers as $unbanned)
                                <tr>
                                    <td>{{ $unbanned->id }}</td>
                                    <td>
                                        {{ strtoupper($unbanned->reportedUser->lastname) }}
                                        {{ $unbanned->reportedUser->firstname }}
                                    
                                    </td>
                                    <td>
                                        {{ date('d-m-Y', strtotime($unbanned->from_date)) }}
                                    </td>
                                    <td>
                                        {{ date('d-m-Y', strtotime($unbanned->to_date)) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col">
                            {{ $unBannedUsers->links() }}
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
