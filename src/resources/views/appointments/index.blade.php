<h1>List of Appointments!</h1>

<a href="/">Home</a> 

@can('create appointments')
    | <a href="{{ route('appointments.create') }}">Create</a><br /><br />
@endcan

@if (auth()->user()->can('view appointments')
    || auth()->user()->can('view self appointments'))

    @foreach ($appointments as $appointment)
        <div>
            <ul>
                <li>{{ $appointment->doctor->user->name }} - {{ $appointment->patient->name }} - {{ $appointment->appointment_date }} - {{ $appointment->status }}  
                    
                    @can('update appointments')
                        <a href="{{ route('appointments.show', $appointment->id) }}">Edit</a>    
                    @endcan    
                        
                    @can('cancel appointments')
                    | <form action="{{ route('appointments.delete', $appointment->id) }}"  method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Cancel</button>    
                        </form> 
                    @endcan
                </li>
            </ul>
        </div>
    @endforeach

@endif