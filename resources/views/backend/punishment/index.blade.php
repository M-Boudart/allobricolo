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
                                        <form action="#" method="post">
                                        @csrf
                                        <button class="btn btn-success">Lever la suspension</button>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h1>Utilisateurs bannis</h1>
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
                                        {{ date('d-m-Y', strtotime($banned->to_date)) }}
                                    </td>
                                    <td>
                                        <form action="#" method="post">
                                        @csrf
                                        <button class="btn btn-success">Deban</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
