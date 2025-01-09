<x-layouts.admin-layout>
  <h1>Master Employees</h1>
  <a href="/employees/create">Create Employee</a>
  <table border="1">
    <thead>
      <tr>
        <td>No</td>
        <td>NIK</td>
        <td>Full Name</td>
        <td>Position</td>
        <td>Wages</td>
        <td>Incentive</td>
        <td>Action</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($employees as $employee)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $employee->nik }}</td>
          <td>{{ $employee->full_name }}</td>
          <td>{{ $employee->position }}</td>
          <td>{{ $employee->wages }}</td>
          <td>{{ $employee->incentive }}</td>
          <td>
            <a href="/employees/{{ $employee->nik }}">
              <button type="button">Edit</button>
            </a>
            <form action="/employees/{{ $employee->nik }}" method="POST">
              @csrf
              <input type="hidden" name="_method" value="DELETE">
              <button>Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</x-layouts.admin-layout>
