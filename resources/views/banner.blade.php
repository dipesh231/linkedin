<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Banner
        </h2>
    </x-slot>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Name -->
                <form method="POST" action="{{ route('addBanner') }}" enctype='multipart/form-data'> @csrf
                <div>
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" class="block mt-1" type="text" name="banner_title" :value="old('name')" required autofocus />

                    <x-label for="fileupload" :value="__('Photo')" />

                    <x-input id="fileupload" name="banner_image" type="file" />

                </div>
                <br>
                <x-button class="ml-4">
                    {{ __('Add') }}
                </x-button>
                </form>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($banner as $bannerItem)
                    <tr>
                        <td>{{ $bannerItem->banner_title }}</td>
                        <td><img src="{{ asset('uploads/' . $bannerItem->banner_image) }}" alt="{{ $bannerItem->banner_title }}" width="200px"></td>
                        <td>
                            <button><a href="{{ route('editBanner',$bannerItem->id) }}">Edit</a></button>
                            <button><a href="{{ route('deleteJob',$bannerItem->id) }}">Delete</a></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
    </div>
</x-app-layout>
