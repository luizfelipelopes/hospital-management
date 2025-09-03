<h1> New Doctor </h1>

<a href="{{ route('doctors.index') }}"> Back </a><br /><br />

<form action="{{ route('doctors.store') }}" method="POST">
    @csrf
    @method('POST')

    <label for="name" >Name: </label>
    <input id="name" type="text"  name="name" value="{{ old('name') }}"  /> 
    @error('name')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror

    <br /><br />
    
    <label for="email" >Email: </label>
    <input id="email" type="text"  name="email" value="{{ old('email') }}"  /> 
    @error('email')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror

    <br /><br />

    <label for="password" >Password: </label>
    <input id="password" type="password"  name="password" value="{{ old('password') }}"  /> 
    @error('password')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror

    <br /><br />

    <label for="speciality">Speciality: </label>
    <input id="speciality" type="text"  name="speciality"  value="{{ old('speciality') }}" /> 
    @error('speciality')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror

    <br /><br />  

    <button type="submit"> Save </button>
</form> 