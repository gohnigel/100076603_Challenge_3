@extends ('layout')

@section ('content')
{{-- Show all resources --}}
<h1><a href="/choose">Add</a></h1>
<table>
    <tr>
        <th>Owner</th>
        <th>Date</th>
        <th>Version</th>
        <th>Actions</th>
    </tr>
    @foreach($forms as $form)
    <tr>
        <td>{{ $form->name }}</td>
        <td>{{ date_format(date_create($form->created_at), "d/m/Y") }}</td>
        <td>{{ $form->version }}</td>
        <td><a href="@if($form->version == 1) v1/{{ $form->id }}/edit @elseif($form->version == 2) v2/{{ $form->id }} @elseif($form->version == 3) v3/{{ $form->id }}/edit @endif"><button class="button">Edit</button></a> <button class="button" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete this form?')) document.getElementById('delete-form').submit();">Delete</button></td>
    </tr>
    @endforeach
</table>

{{-- Delete forms --}}
@foreach($forms as $form)
<form id="delete-form" action="/{{ $form->id }}" method="post" style="display:none;">
    @csrf
    @method('delete')
</form>
@endforeach

@endsection
