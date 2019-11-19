<form action="process" method=POST>
@csrf <!-- {{ csrf_field() }} -->
<input type=text name="name" value="{{ old('name') }}">
<input type=text name="number" value="{{ old('number') }}">
<input type=submit>
</form>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif