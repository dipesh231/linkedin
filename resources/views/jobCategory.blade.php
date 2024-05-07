<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Category List
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">            <!-- Name -->
                <form method="POST" action="{{ route('addJobCategory') }}"> @csrf
                <div>
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" class="block mt-1" type="text" name="name" :value="old('name')" required autofocus />
                </div>
                <br>
                <x-button class="ml-4">
                    {{ __('Add') }}
                </x-button>
                </form>
                </div>
            </div>
        </div>
    </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <table>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            @foreach($job_category as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                    <button><a href="{{ route('editJobCategory',$item->id) }}">Edit</a></button>
                    <button><a href="{{ route('deleteCategory',$item->id) }}">Delete</a></button>
                    </td>
                </tr>
            @endforeach
        </table>
        </div>
    </div>

    
    
</x-app-layout>
