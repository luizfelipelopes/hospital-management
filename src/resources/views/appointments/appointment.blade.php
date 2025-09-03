<h1> Appointment: {{ $appointment->id }} </h1>

<a href="{{ route('appointments.index') }}"> Back </a><br /><br />

<form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="doctor_id" >Doctor: </label>
    <select name="doctor_id">
        @foreach ($doctors as $doctor)
            <option value="{{ $doctor->id }}" @selected((old('doctor_id') ??  $appointment->doctor_id)== $doctor->id)>{{ $doctor->user->name }}</option>
        @endforeach
    </select>
    @error('doctor_id')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />

    <label for="patient_id">Patient: </label>
    <select name="patient_id">
        @foreach ($patients as $patient)
            <option value="{{ $patient->id }}" @selected((old('patient_id') ?? $appointment->patient_id)  == $patient->id)>{{ $patient->name }}</option>
        @endforeach
    </select>
    @error('patient_id')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />
    
    <label for="appointment_date">Appointment Date: </label>
    <input type="datetime" name="appointment_date" value="{{ old('appointment_date') ?? $appointment->appointment_date }}" /> 
    @error('appointment_date')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />

    <label for="status">Status: </label>
    <select name="status">
        <option value="pending" @selected('pending' == $appointment->status)>{{ 'Pending' }}</option>
        <option value="confirmed" @selected('confirmed' == $appointment->status)>{{ 'Confirmed' }}</option>
        <option value="cancelled" @selected('cancelled' == $appointment->status)>{{ 'Cancelled' }}</option>
    </select>
    @error('status')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />  

    <button type="submit"> Save </button>
</form> 