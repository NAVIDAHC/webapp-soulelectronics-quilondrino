<x-app-layout>
    <x-slot name="header">
        <div class="panel">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
        <a class="add-user" href="{{ route('announcement.store')}}">add announcement</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-nav overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto">
                        <thead>
                            <tr class="table-header">
                                <th class="user">Title</th>
                                <th class="email">Description</th>
                                <th class="email">Image</th>
                                <th class="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($announcements as $announcement)
                            <tr>
                                    <td class="user">{{$announcement->title}}</td>
                                    <td class="email">{{$announcement->body}}</td>
                                    <td class="email">{{$announcement->image}}</td>
                                    <td class="action">
                                        <a href="{{ route('announcement.edit', $announcement->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('announcement.destroy', $announcement->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
