<h1>Hospital Management</h1>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    @method('POST')
    <button type="submit">Logout</button>
</form>

<ul>
    @can('view patients') <li><a href="{{ route('patients.index')}}"> Patients </li> @endcan
    @can('view doctors')<li><a href="{{ route('doctors.index')}}"> Doctors </li>@endcan
    @if (auth()->user()->can('view appointments')  || auth()->user()->can('view self appointments'))
        <li><a href="{{ route('appointments.index')}}"> Appointments </li>
    @endif    
</ul>