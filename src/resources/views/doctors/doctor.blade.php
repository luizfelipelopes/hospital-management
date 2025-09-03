<h1> Doctor: {{ $doctor->user->name }} - {{ $doctor->user->id }} </h1>

<a href="{{ route('doctors.index') }}"> Back </a><br /><br />

<form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name" >Name: </label>
    <input type="text"  name="name" value="{{ old('name') ?? $doctor->user->name }}" /> 
    @error('name')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />
    
    <label for="email" >Email: </label>
    <input type="text"  name="email" value="{{ old('email') ?? $doctor->user->email }}" /> 
    @error('email')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />

    <label for="speciality">Speciality: </label>
    <input type="text"  name="speciality" value="{{ old('speciality') ?? $doctor->speciality }}" /> 
    @error('speciality')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />  

    <button type="submit"> Save </button>
</form> 