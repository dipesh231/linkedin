<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Job Applicants
        </h2>
    </x-slot>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200"> 
                <table>
                <tr>
                    <th>SN</th>
                    <th>User Name</th>
                    <th>Job Name</th>
                    <th>Action</th>
                </tr>
                @foreach($appliedList as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->getUserId->name}}</td>
                        <td>{{$item->getJobId->name}}</td>
                        <td>
                          <button><a href="{{asset('uploads').'/'.$item->filename}}" target="_blank">View</a></button>
                        </td>
                    </tr>
                @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
