@extends('layouts.dashboard')

@section('content')

    <!-- DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary float-left">{{ __('Edit Task') }}</h3>
        </div>
        <div class="card-body">
            <form id="editForm" action="{{ route('task:update', $task->id)}}" method="POST" enctype="multipart/form-data">
                @csrf                
                <input type="hidden" name="todo_id" value="{{ $task->to_do_id }}">
                <div class="modal-body">                
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Task:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" name="description" placeholder="Try typing 'Submit design document by 5pm'" value="{{ $task->description }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">                        
                            <input class="form-check-input" type="checkbox" id="important" name="important" value="1" {{ $task->important === 1 ? 'checked="checked"' : '' }}>
                            <label class="form-check-label" for="important">Mark as Important?</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="my_day" name="my_day" value="1" {{ $task->my_day === 1 ? 'checked="checked"' : '' }}>
                            <label class="form-check-label" for="my_day">Add to My Day</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="reminder" class="col-sm-2 col-form-label">Remind Me:</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="reminder" name="reminder">
                                <option value="">Remind Me</option>
                                <option {{ ($task->reminder) == 'Later Today' ? 'selected' : '' }} value="Later Today">Later Today</option>
                                <option {{ ($task->reminder) == 'Tomorrow' ? 'selected' : '' }} value="Tomorrow">Tomorrow</option>
                                <option {{ ($task->reminder) == 'Next Week' ? 'selected' : '' }} value="Next Week">Next Week</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="due_date" class="col-sm-2 col-form-label">Due Date:</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="due_date" name="due_date">
                                <option value="">Add due date</option>
                                <option {{ ($task->due_date) == 'Today' ? 'selected' : '' }} value="Today">Today</option>
                                <option {{ ($task->due_date) == 'Tomorrow' ? 'selected' : '' }} value="Tomorrow">Tomorrow</option>
                                <option {{ ($task->due_date) == 'Next Week' ? 'selected' : '' }} value="Next Week">Next Week</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="repeat" class="col-sm-2 col-form-label">Repeat:</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="repeat" name="repeat">
                                <option value="">Repeat</option>
                                <option {{ ($task->repeat) == 'Daily' ? 'selected' : '' }} value="Daily">Daily</option>
                                <option {{ ($task->repeat) == 'Weekdays' ? 'selected' : '' }} value="Weekdays">Weekdays</option>
                                <option {{ ($task->repeat) == 'Weekly' ? 'selected' : '' }} value="Weekly">Weekly</option>
                                <option {{ ($task->repeat) == 'Monthly' ? 'selected' : '' }} value="Monthly">Monthly</option>                                
                                <option {{ ($task->repeat) == 'Yearly' ? 'selected' : '' }} value="Yearly">Yearly</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="note" class="col-sm-2 col-form-label">Note:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="note" name="note" rows="3">{{ $task->note }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-secondary">Close</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection