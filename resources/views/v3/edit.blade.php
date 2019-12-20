@extends ('layout')

@section ('content')
{{-- Create Form Version 2 --}}
<form action="/v3/{{ $form->id }}" method="post">
    @csrf
    @method('put')
    <p class="manager">* Required fields</p>

    <fieldset>
        <legend>Version 3</legend>

        <p>
            {{-- Name of user --}}
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" maxlength="255" value="{{ $form->name }}" required>
            <span class="manager">*</span>

            @error('name')
                <span class="manager">{{ $message }}</span>
            @enderror
        </p>
    </fieldset>

    {{-- Every location of user --}}
    @foreach ($form->locations as $location)
    <fieldset>
        <legend>Location {{ $location->id }}</legend>
        <p>
            {{-- Address of first location --}}
            <label for="address{{ $location->id }}">Address: </label>
            <input type="text" name="location[{{ $location->id }}][address]" id="address{{ $location->id }}" maxlength="255" value="{{ $location->address }}" required>
            <span class="manager">*</span>

            @error('location')
                <span class="manager">{{ $message }}</span>
            @enderror

            {{-- Email of first location --}}
            <label for="email">Email: </label>
            <input type="email" name="location[{{ $location->id }}][email]" id="email{{ $location->id }}" maxlength="255" value="{{ $location->email }}" required>
            <span class="manager">*</span>

            @error('location')
            <span class="manager">{{ $message }}</span>
            @enderror
        </p>

        <p>
            {{-- Phone number of first location --}}
            <label for="phone">Phone: </label>
            <input type="text" name="location[{{ $location->id }}][phone]" id="phone{{ $location->id }}" maxlength="255" value="{{ $location->phone }}" required>
            <span class="manager">*</span>

            @error('location')
            <span class="manager">{{ $message }}</span>
            @enderror
        </p>
    </fieldset>
    @endforeach

    {{-- Button to add new location --}}
    <p id="addLocation"><button type="button" class="button" onclick="editLocation()">+ Location</button></p>

    <p><input type="submit" class="button" value="Submit"> <input type="reset" class="button" value="Reset"></p>
</form>

<script>a = {{ $location->id }};</script>
<script src="/js/editLocation.js"></script>

@endsection
