@extends ('layout')

@section ('content')
{{-- Create Form Version 2 --}}
<form action="/v3" method="post">
    @csrf
    <p class="manager">* Required fields</p>

    <fieldset>
        <legend>Version 3</legend>

        <p>
            {{-- Name of user --}}
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" maxlength="255" required>
            <span class="manager">*</span>

            @error('name')
                <span class="manager">{{ $message }}</span>
            @enderror
        </p>
    </fieldset>

    {{-- first location of user --}}
    <fieldset>
        <legend>Location 1</legend>
        <p>
            {{-- Address of first location --}}
            <label for="address1">Address: </label>
            <input type="text" name="location[1][address]" id="address1" maxlength="255" required>
            <span class="manager">*</span>

            @error('location')
                <span class="manager">{{ $message }}</span>
            @enderror

            {{-- Email of first location --}}
            <label for="email1">Email: </label>
            <input type="email" name="location[1][email]" id="email1" maxlength="255" required>
            <span class="manager">*</span>

            @error('location')
            <span class="manager">{{ $message }}</span>
            @enderror
        </p>

        <p>
            {{-- Phone number of first location --}}
            <label for="phone1">Phone: </label>
            <input type="text" name="location[1][phone]" id="phone1" maxlength="255" required>
            <span class="manager">*</span>

            @error('location')
            <span class="manager">{{ $message }}</span>
            @enderror
        </p>
    </fieldset>

    {{-- Button to add new location --}}
    <p id="addLocation"><button type="button" class="button" onclick="addLocation();">+ Location</button></p>

    <p><input type="submit" class="button" value="Submit"> <input type="reset" class="button" value="Reset"></p>
</form>

<script src="/js/addLocation.js"></script>

@endsection
