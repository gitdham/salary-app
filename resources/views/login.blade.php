<x-layouts.base-layout>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="/login" method="POST">
    @csrf
    <input type="email" name="email" placeholder="email" />
    <input type="password" name="password" placeholder="password" />
    <br>
    <button type="submit">Login</button>
  </form>
</x-layouts.base-layout>
