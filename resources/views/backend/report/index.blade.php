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
            Listes des signalements
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
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Type</th>
                                <th scope="col">Date du signalement</th>
                                <th scope="col">Signaler par</th>
                                <th scope="col">Auteur de l'objet</th>
                                <th scope="col">Lien vers l'objet</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->id }}</td>
                                    <td>{{ $report->type }}</td>
                                    <td>{{ date('d-m-Y', strtotime($report->reported_at)) }}</td>
                                    <td>
                                        <a href="{{ route('user.show', $report->reportedBy->id) }}" target="_blank">
                                        {{ strtoupper($report->reportedBy->lastname) }}
                                        {{ $report->reportedBy->firstname }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" target="_blank">
                                            Personne concernée
                                        </a>
                                    </td>
                                    <td>
                                    @if ($report->type == 'announcement')
                                        <a href="{{ route('announcement.show', $report->object_id) }}" target="_blank">Consulter</a>
                                    @elseif ($report->type == 'profile')
                                        <a href="{{ route('user.show', $report->object_id) }}" target="_blank">Consulter</a>
                                    @else
                                        <a href="#" target="_blank">A faire review</a>
                                    @endif
                                    </td>
                                    <td>{{ $report->description }}</td>
                                    <td>
                                        <form action="{{ route('backend.report.destroy', $report->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-success">Signalement non pertinant</a>
                                        </form>
                                        <form action="#" method="post">
                                            @csrf
                                            <button class="btn btn-danger">Suspendre l'auteur</a>
                                        </form>
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
