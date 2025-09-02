<h1> New Patient </h1>

<a href="{{ route('patients.index') }}"> Back </a><br /><br />

<form action="{{ route('patients.store') }}" method="POST">
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

    <label for="phone" >Phone: </label>
    <input id="phone" type="text"  name="phone" value="{{ old('phone') }}" /> 
    @error('phone')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />
    
    <label for="address">Address: </label>
    <input id="address" type="text"  name="address" value="{{ old('address') }}" /> 
    @error('address')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror

    <br /><br />

    <label for="city">City: </label>
    <input id="city" type="text"  name="city" value="{{ old('city') }}" /> 
    @error('city')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror

    <br /><br />
    
    <label for="state">State: </label>
    <input id="state" type="text"  name="state" value="{{ old('state') }}" /> 
    @error('state')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror

    <br /><br />
    
    <label for="zipcode">Zipcode: </label>
    <input id="zipcode" type="text"  name="zipcode" value="{{ old('zipcode') }}" /> 
    @error('zipcode')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror

    <br /><br />

    <label for="country">Country: </label>
    <input id="country" type="text"  name="country"  value="{{ old('country') }}" /> 
    @error('country')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror

    <br /><br />  

    <button type="submit"> Save </button>
</form> 