<h1>Hospital Management</h1>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    @method('POST')
    <button type="submit">Logout</button>
</form>

<ul>
    <li><a href="{{ route('patients.index')}}"> Patients </li>
    <li><a href="{{ route('doctors.index')}}"> Doctors </li>
</ul>