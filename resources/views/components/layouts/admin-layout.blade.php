<x-layouts.base-layout>
  <nav>
    <ul>
      <li><a href="/dashboard">Dashboard</a></li>
      <li><a href="/users">Master User</a></li>
      <li><a href="/employees">Master Employee</a></li>
      <li><a href="/salary-calculation">Salary Calculation</a></li>
      <li><a href="/report">Salary Report</a></li>
      <li><a href="/logout">Logout</a></li>
    </ul>
  </nav>
  {{ $slot }}
</x-layouts.base-layout>
