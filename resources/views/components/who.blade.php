@if (Auth::guard('web')->check())
  <p class="text-success">
    You are Logged In as a <strong>Mahasiswa</strong>
  </p>
@else
  <p class="text-danger">
    You are Logged Out as a <strong>Mahasiswa</strong>
  </p>
@endif

@if (Auth::guard('admin')->check())
  <p class="text-success">
    You are Logged In as a <strong>Dosen</strong>
  </p>
@else
  <p class="text-danger">
    You are Logged Out as a <strong>Dosen</strong>
  </p>
@endif
