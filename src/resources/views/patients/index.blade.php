<h1>List of patients!</h1>

<a href="/">Home</a> | <a href="{{ route('patients.create') }}">Create</a><br /><br />


@foreach ($patients as $patient)
    <div>
        <ul>
            <li>{{ $patient->name }} - {{ $patient->email }} - {{ $patient->phone }}  <a href="{{ route('patients.show', $patient->id) }}">Show</a> | 
                <form action="{{ route('patients.delete', $patient->id) }}"  method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>    
                </form> 
            </li>
        </ul>
    </div>
@endforeach