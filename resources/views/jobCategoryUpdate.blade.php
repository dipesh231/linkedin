<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>
<form action="{{route('update', $job_category->id)}}" method="POST">@csrf
    <label>Category Name</label>
    <input type="text" name="name" value="{{$job_category->name}}">
    <button type="submit">Update</button>
</form>
</x-app-layout>