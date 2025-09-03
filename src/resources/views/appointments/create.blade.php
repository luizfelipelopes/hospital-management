<h1> New Appointment </h1>

<a href="{{ route('appointments.index') }}"> Back </a><br /><br />

<form action="{{ route('appointments.store') }}" method="POST">
    @csrf
    @method('POST')

    <label for="doctor_id" >Doctor: </label>
    <select name="doctor_id">
        <option value="">Select</option>
        @foreach ($doctors as $doctor)
            <option value="{{ $doctor->id }}" @selected(old('doctor_id') == $doctor->id)>{{ $doctor->user->name }}</option>
        @endforeach
    </select>
    @error('doctor_id')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />

    <label for="patient_id">Patient: </label>
    <select name="patient_id">
        <option value="">Select</option>
        @foreach ($patients as $patient)
            <option value="{{ $patient->id }}" @selected(old('patient_id') == $patient->id)>{{ $patient->name }}</option>
        @endforeach
    </select>
    @error('patient_id')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />
    
    <label for="appointment_date">Appointment Date: </label>
    <input type="datetime" name="appointment_date" value="{{ old('appointment_date') }}" /> 
    @error('appointment_date')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />

    <label for="status">Status: </label>
    <select name="status">
        <option value="">Select</option>
        <option value="pending" @selected('pending' == old('status'))>{{ 'Pending' }}</option>
        <option value="confirmed" @selected('confirmed' == old('status'))>{{ 'Confirmed' }}</option>
        <option value="cancelled" @selected('cancelled' == old('status'))>{{ 'Cancelled' }}</option>
    </select>
    @error('status')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    
    <br /><br />

    <button type="submit"> Save </button>
</form> 