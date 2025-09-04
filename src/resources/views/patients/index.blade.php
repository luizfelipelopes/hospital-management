<h1>List of patients!</h1>

<a href="/">Home</a> 
@can('create patients')
| <a href="{{ route('patients.create') }}">Create</a>
@endcan
<br /><br />


@can('view patients')

@foreach ($patients as $patient)
    <div>
        <ul>
            <li>{{ $patient->name }} - {{ $patient->email }} - {{ $patient->phone }}  
                
                @can('update patients')
                    <a href="{{ route('patients.show', $patient->id) }}">Edit</a> | 
                @endcan
                
                @can('delete patients')
                    <form action="{{ route('patients.delete', $patient->id) }}"  method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>    
                    </form> 
                @endcan
            </li>
        </ul>
    </div>
@endforeach

@endcan