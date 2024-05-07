@extends('frontend.master')

@section('content')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
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
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Office</th>
        <th>Age</th>
        <th>Start date</th>
        <th>Salary</th>
        <th>Salary</th>
        <th>Salary</th>
    </tr>
    </tfoot>
    @endforeach
</table>

<script>
    new DataTable('#example');
</script>
