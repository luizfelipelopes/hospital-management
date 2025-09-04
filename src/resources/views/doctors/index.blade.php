<h1>List of Doctors!</h1>

<a href="/">Home</a> 

@can('create doctors')
    | <a href="{{ route('doctors.create') }}">Create</a><br /><br />
@endcan

@can('view doctors')
    @foreach ($doctors as $doctor)
        <div>
            <ul>
                <li>{{ $doctor->user->name }} - {{ $doctor->user->email }} - {{ $doctor->speciality }}  
                    
                    @can('view doctors')
                        <a href="{{ route('doctors.show', $doctor->id) }}">Show</a> | 
                    @endcan
                    
                    @can('delete doctors')
                        <form action="{{ route('doctors.delete', $doctor->id) }}"  method="POST">
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