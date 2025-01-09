<x-layouts.admin-layout>
  <h1>Form Users</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ isset($user) ? '/users/' . $user->email : '/users' }}" method="POST">
    @csrf
    @if (isset($user))
      <input type="hidden" name="_method" value="PUT">
    @endif
    <label>
      <span>Name</span>
      <input type="text" name="name" value="{{ $user->name ?? '' }}">
    </label>
    <br>
    <label>
      <span>Email</span>
      <input type="email" name="email" value="{{ $user->email ?? '' }}">
    </label>
    <br>
    <label>
      <span>Password</span>
      <input type="password" name="password">
    </label>
    <br>
    <label>
      <input type="radio" id="admin" name="role" value="admin" @checked(isset($user) && $user->role == 'admin')>
      <span>Admin</span>
    </label>
    <br>
    <label>
      <input type="radio" id="user" name="role" value="user" @checked(isset($user) && $user->role == 'user')>
      <span>User</span>
    </label>
    <br>
    <button type="submit">Save</button>
  </form>
</x-layouts.admin-layout>
