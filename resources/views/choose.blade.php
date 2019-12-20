@extends ('layout')

@section ('content')
{{-- Select Form Version --}}
<p>Version:
    <select name="version" id="version">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
</p>

<p><button class="button" onclick="if(document.getElementById('version').value == 1) window.location.href='/v1/create'; else if(document.getElementById('version').value == 2) window.location.href='/v2/create'; else window.location.href='/v3/create';">Create</button></p>
@endsection
