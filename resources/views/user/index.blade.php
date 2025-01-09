<x-layouts.admin-layout>
  <h1>Master Users</h1>
  <a href="/users/create">Create User</a>
  <table border="1">
    <thead>
      <tr>
        <td>No</td>
        <td>Email</td>
        <td>Name</td>
        <td>Role</td>
        <td>Last Login</td>
        <td>Action</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->role }}</td>
          <td>{{ $user->last_login }}</td>
          <td>
            <a href="/users/{{ $user->email }}">
              <button type="button">Edit</button>
            </a>
            <form action="/users/{{ $user->email }}" method="POST">
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
