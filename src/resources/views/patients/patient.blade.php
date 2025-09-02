<h1> Patient: {{ $patient->name }} </h1>

<a href="{{ route('patients.index') }}"> Back </a><br /><br />

<form action="{{ route('patients.update', $patient->id)}}" method="POST">
    @csrf
    @method('PUT')

    <label for="name" >Name: </label>
    <input type="text"  name="name" value="{{ old('name') ?? $patient->name }}" /> 
    @error('name')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />
    
    <label for="email" >Email: </label>
    <input type="text"  name="email" value="{{ old('email') ?? $patient->email }}" /> 
    @error('email')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />
    
    <label for="phone">Phone: </label>
    <input type="text"  name="phone" value="{{ old('phone') ?? $patient->phone }}" /> 
    @error('phone')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror

    <br /><br />
    
    <label for="address">Address: </label>
    <input type="text"  name="address" value="{{ old('address') ?? $patient->address }}" /> 
    @error('address')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />
    
    <label for="city">City: </label>
    <input type="text"  name="city" value="{{ old('city') ?? $patient->city }}" /> 
    @error('city')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror

    <br /><br />
    
    <label for="state">State: </label>
    <input type="text"  name="state" value="{{ old('state') ?? $patient->state }}" /> 
    @error('state')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />
    
    <label for="zipcode">Zipcode: </label>
    <input type="text"  name="zipcode" value="{{ old('zipcode') ?? $patient->zipcode }}" /> 
    @error('zipcode')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror

    <br /><br />

    <label for="country">Country: </label>
    <input type="text"  name="country" value="{{ old('country') ?? $patient->country }}" /> 
    @error('country')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />  

    <button type="submit"> Save </button>
</form> 