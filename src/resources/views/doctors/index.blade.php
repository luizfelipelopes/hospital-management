<h1>List of Doctors!</h1>

<a href="/">Home</a> | <a href="{{ route('doctors.create') }}">Create</a><br /><br />


@foreach ($doctors as $doctor)
    <div>
        <ul>
            <li>{{ $doctor->user->name }} - {{ $doctor->user->email }} - {{ $doctor->speciality }}  <a href="{{ route('doctors.show', $doctor->id) }}">Show</a> | 
                <form action="{{ route('doctors.delete', $doctor->id) }}"  method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>    
                </form> 
            </li>
        </ul>
    </div>
@endforeach