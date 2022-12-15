<a href="{{ route('students.create') }}" class="btn btn-primary stretched-link table">Create</a>
<table class="table ">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Name</th>
            <th class="text-center">Age</th>
            <th class="text-center">Gender</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($viewData['students'] as $student)
        <tr>
            @php
            $student->id = "100{$student->id}";
            @endphp
            <td class="text-center">{{$student->id }}</td>
            <td class="text-center">{{$student->full_name }}</td>
            <td class="text-center">{{ $student->age }} </td>
            <td class="text-center">{{ $student->gender }} </td>
        </tr>
        @endforeach

    </tbody>
</table>