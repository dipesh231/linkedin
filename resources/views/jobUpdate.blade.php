<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>
<form action="{{route('updateJob', $job->id)}}" method="POST">@csrf
    <label>Job Name</label>
    <input type="text" name="name" value="{{$job->name}}"><br>
    <label>Description</label>
    <input type="text" name="description" value="{{$job->description}}"><br>
    <label>Category Name</label>
    <select id="job_category_id" class="block mt-1" name="job_category_ID" required autofocus>
        <option value="">Select a job category</option>
        @foreach($job_category as $item)
            <!-- <option value="{{ $item->id }}" @if($item->id == $job->job_category_ID) selected @endif> {{ $item->name }}</option> -->
            <option value="{{ $item->id }}" {{$item->id == $job->job_category_ID ? 'selected' : ''}}> {{ $item->name }}</option>
        @endforeach

    </select>
    <label>Number of seats</label>
    <input type="text" name="total_seats" value="{{$job->total_seats}}">
    <button type="submit">Update</button>
    
</form>
</x-app-layout>