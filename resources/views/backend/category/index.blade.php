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
            Listes des catégories
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
                    <form action=" {{ route('backend.category.store') }}" method="post">
                        @csrf
                        <label for="category">Nom<input id="category" type="text" name="category" class="form-control" placeholder="Nouvelle catégorie" required></label>
                        @error('category')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <button class="btn btn-success">Ajouter</button>
                    </form> 
                </div>
                <div>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Catégorie</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->category }}</td>
                                    <td>
                                        <form id="frmDelete" action="{{ route('backend.category.destory', $category->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"
                                            onclick="confirm('Voulez vous vraiment supprimer cette catégorie?')">X</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
