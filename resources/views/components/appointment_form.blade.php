<form method="POST" action="{{ route('showAppointments') }}" class="mt-2">
    <input type="hidden" name="department_id" value="{{ $department->id }}"/>
    <input type="submit" value="show appointments" class="btn btn-primary"/>
</form>
