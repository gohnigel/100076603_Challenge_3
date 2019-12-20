@extends ('layout')

@section ('content')
{{-- Create Form Version 1 --}}
<form action="/v1" method="post">
    @csrf
    <fieldset>
        <legend>Version 1</legend>

        <p class="manager">* Required fields</p>

        <p>
            {{-- Name of user --}}
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" maxlength="255" required>
            <span class="manager">*</span>

            @error('name')
                <span class="manager">{{ $message }}</span>
            @enderror

            {{-- Gender of user --}}
            <label for="gender">Gender: </label>
            <label for="gender_male"><input type="radio" name="gender" id="gender_male" value="Male" required>Male</label>
            <label for="gender_female"><input type="radio" name="gender" id="gender_female" value="Female" required>Female</label>
            <span class="manager">*</span>

            @error('gender')
                <span class="manager">{{ $message }}</span>
            @enderror
        </p>

        <p>
            {{-- Date of birth --}}
            <label for="dob">Date of birth: </label>
            <input type="date" name="dob" id="dob" maxlength="255" required>
            <span class="manager">*</span>

            @error('dob')
                <span class="manager">{{ $message }}</span>
            @enderror
        </p>

        <p>
            {{-- Address of user --}}
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" maxlength="255" required>
            <span class="manager">*</span>

            @error('address')
                <span class="manager">{{ $message }}</span>
            @enderror
        </p>
    </fieldset>

    <p><input type="submit" class="button" value="Submit"> <input type="reset" class="button" value="Reset"></p>
</form>

@endsection
