<h1> Login </h1>


<form action="{{ route('login.auth') }}" method="POST">
    @csrf
    @method('POST')

    <label for="email" >Email: </label>
    <input id="email" type="text"  name="email" value="{{ old('email') }}"  /> 
    @error('email')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror

    <br /><br />

    <label for="password" >Password: </label>
    <input id="password" type="password"  name="password" /> 
    @error('password')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />
    
    <button type="submit"> Login </button>
</form> 