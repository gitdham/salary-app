<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller {
  public function index(Request $request) {
    $viewData = [
      'employees' => Employee::all()
    ];

    return view('employee.index', $viewData);
  }

  public function create(Request $request) {
    return view('employee.form');
  }

  public function show(Request $request, string $nik) {
    $employee = Employee::where('nik', $nik)->first();
    if ($employee) {
      $viewData = [
        'employee' => $employee
      ];

      return view('employee.form', $viewData);
    }
  }

  public function store(Request $request) {
    $employeeData =  $request->validate([
      'nik' => 'required|unique:employees,nik',
      'full_name' => 'required',
      'position' => 'required',
      'wages' => 'required',
      'incentive' => 'required',
    ]);

    Employee::create($employeeData);
    return redirect('/employees');
  }

  public function update(Request $request, string $nik) {
    $employee = Employee::where('nik', $nik)->first();
    if ($employee) {
      $employeeData =  $request->validate([
        'nik' => [
          'required',
          Rule::unique('employees', 'nik')->ignore($nik, 'nik')
        ],
        'full_name' => 'required',
        'position' => 'required',
        'wages' => 'required',
        'incentive' => 'required',
      ]);

      $employee->update($employeeData);
      return redirect('/employees');
    }
  }

  public function destroy(Request $request, string $nik) {
    $employee = Employee::where('nik', $nik)->first();
    if ($employee) {
      $employee->delete();
      return redirect('/employees');
    }
  }
}
