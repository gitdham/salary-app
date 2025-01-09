<x-layouts.admin-layout>
  <h1>Form Employee</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ isset($employee) ? '/employees/' . $employee->nik : '/employees' }}" method="POST">
    @csrf
    @if (isset($employee))
      <input type="hidden" name="_method" value="PUT">
    @endif
    <label>
      <span>NIK</span>
      <input type="text" name="nik" value="{{ $employee->nik ?? '' }}">
    </label>
    <br>
    <label>
      <span>Full Name</span>
      <input type="text" name="full_name" value="{{ $employee->full_name ?? '' }}">
    </label>
    <br>
    <label>
      <span>Position</span>
      <input type="text" name="position" value="{{ $employee->position ?? '' }}">
    </label>
    <br>
    <label>
      <span>Wages</span>
      <input type="text" name="wages" value="{{ $employee->wages ?? '' }}">
    </label>
    <br>
    <label>
      <span>Incentive</span>
      <input type="text" name="incentive" value="{{ $employee->incentive ?? '' }}">
    </label>
    <br>
    <button type="submit">Save</button>
  </form>
</x-layouts.admin-layout>
