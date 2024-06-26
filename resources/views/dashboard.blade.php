<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <img src="{{auth()->user()->avatar}}">
                    <p>Name: {{auth()->user()->name}}</p>
                    <p>Email: {{auth()->user()->email}}</p>
                    <p>Phone Number:</p>
                    <p>Title: {{auth()->user()->linkedin_headline}}</p>
                    <p>Designation:</p>
{{--                    <a href="{{route('linkedin.connections')}}">Connection Detail</a>--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
