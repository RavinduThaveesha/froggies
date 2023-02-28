<form action="{!! $data['url'] !!}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <select {{ $data['disabled'] }} onchange="this.form.submit()" class="form-control" name="status">
        @foreach ($data['options'] as $key => $label)
            <option value="{{ $key }}" {{ $data['selected'] == $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
</form>