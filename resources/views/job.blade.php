<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Job List
        </h2>
    </x-slot>
    @if(Auth::user()->role==1)
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">            <!-- Name -->
                        <form method="POST" action="{{ route('addJob') }}"> @csrf
                            <div>

                                <x-label for="name" :value="__('Name')" />

                                <x-input id="name" class="block mt-1" type="text" name="name" :value="old('name')" required autofocus />
                            </div>
                            <div>
                                <x-label for="name" :value="__('Description')" />

                                <x-input id="name" class="block mt-1" type="text" name="description" :value="old('name')" required autofocus />
                            </div>
                            <div>
                                <x-label for="job_category_id" :value="__('Job Category ID')" />

                                <select id="job_category_id" class="block mt-1" name="job_category_ID" required autofocus>
                                    <option value="">Select a job category</option>
                                    @foreach($job_category as $item)
                                        <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-label for="name" :value="__('Number Of Seats')" />

                                <x-input id="name" class="block mt-1" type="number" name="total_seats" :value="old('name')" required autofocus />
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
    @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Description</th>
                <th>Job Category</th>
                <th>Total Seats</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Applicants</th>
            </tr>
            </thead>
            <tbody>
            @foreach($job as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{@$item->getJobCategory->name}}</td>
                    <td>{{$item->total_seats}}</td>
                    @if(Auth::user()->role==1)
                        <td><button><a href="{{ route('editJob',$item->id) }}">Edit</a></button></td>
                        <td> <button><a href="{{ route('deleteJob',$item->id) }}">Delete</a></button></td>
                        <td> <button><a href="{{ route('Applicants',$item->id) }}">Applicants</a></button></td>
                    @endif
                    @if(Auth::user()->role==0)
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="handleButtonClick('{{ $item->id }}')">Apply</button></td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>

        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    </div>

    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Submit CV</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('applyJob') }}" enctype='multipart/form-data' method="POST">
                        @csrf
                        <input id="fileupload" name="filename" type="file" />
                        <input id="user_id" name="user_id" value="{{ auth()->user()->id }}" type="hidden" />
                        <input id="job_id" name="job_id" type="hidden" value="" />
                        <script>
                            new DataTable('#example');
                        </script>
                        <script>
                            function handleButtonClick(job_id) {
                                document.getElementById("job_id").value = job_id;
                            }
                        </script>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
