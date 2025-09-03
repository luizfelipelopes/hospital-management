<h1>List of Appointments!</h1>

<a href="/">Home</a> | <a href="{{ route('appointments.create') }}">Create</a><br /><br />


@foreach ($appointments as $appointment)
    <div>
        <ul>
            <li>{{ $appointment->doctor->user->name }} - {{ $appointment->patient->name }} - {{ $appointment->appointment_date }} - {{ $appointment->status }}  <a href="{{ route('appointments.show', $appointment->id) }}">Show</a> | 
                <form action="{{ route('appointments.delete', $appointment->id) }}"  method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Cancel</button>    
                </form> 
            </li>
        </ul>
    </div>
@endforeach