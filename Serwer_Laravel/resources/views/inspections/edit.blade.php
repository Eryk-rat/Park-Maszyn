<form method="POST" action="{{ route('inspections.update', $inspection->id) }}">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="machine">Machine</label>
    <select name="machine_id" id="machine" class="form-control">
      @foreach($machines as $machine)
        <option value="{{ $machine->id }}" @if($machine->id == $inspection->machine_id) selected @endif>{{ $machine->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" name="date" id="date" class="form-control" value="{{ $inspection->date }}">
  </div>
  <div class="form-group">
    <label for="notes">Notes</label>
    <textarea name="notes" id="notes" class="form-control">{{ $inspection->notes }}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>