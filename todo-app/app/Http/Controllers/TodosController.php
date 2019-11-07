<?php

namespace App\Http\Controllers;
use App\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodosController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {

		$todos = Todo::whereDate('created_at', '=', Carbon::today())
			->orWhere('recurring', '=', 1)->get();
		return view('todos.index')->with('todos', $todos);
	}

	public function filter($filter) {

		if ($filter == "all") {
			$todos = Todo::all();
		} else if ($filter == "today") {
			$todos = Todo::whereDate('started_at', '=', Carbon::today())->get();
		} else {
			$todos = Todo::whereMonth('started_at', '=', Carbon::now()->month)->get();
		}

		return view('todos.index')->with('todos', $todos);
	}

	public function show(Todo $todo) {

		if ($todo->completed == 0) {
			$completedFontColor = '#28a745';
		} else if ($todo->completed == 1) {
			$completedFontColor = '#007bff';
		} else {
			$completedFontColor = '#dc3545';
		}

		//$started_at_formatted = $todo->started_at->timezone('Asia/Manila')->format('H:i');
		//var_dump($started_at_formatted);
		return view('todos.show')->with(compact('todo', 'completedFontColor', '$started_at_formatted'));
	}

	public function create() {

		return view('todos.create');
	}

	public function store(Request $req) {

		$this->validate(request(), [
			'name' => 'required',
			'description' => 'required',
		]);

		$data = request()->all();

		$parseStartedDate = ($data['startDate'] == null) ? Carbon::now() : Carbon::parse($data['startDate']);
		$parseTargetDate = ($data['targetDate'] == null) ? Carbon::now() : Carbon::parse($data['targetDate']);
		$recurring = (!$req->has('recurring') ? 0 : $data['recurring']);

		$todo = new Todo();

		$todo->name = $data['name'];
		$todo->description = $data['description'];
		$todo->recurring = $recurring;
		$todo->started_at = $parseStartedDate;
		$todo->done_at = $parseTargetDate;
		$todo->completed = false;

		$todo->save();

		session()->flash('success', 'Task created successfully');

		return redirect('/todos');

	}

	public function edit(Todo $todo) {

		return view('todos.edit')->with('todo', $todo);

	}

	public function update(Todo $todo, Request $req) {

		$this->validate(request(), [
			'name' => 'required',
			'description' => 'required',
		]);

		$data = request()->all();

		$completed = (!$req->has('completed') ? 0 : $data['completed']);
		$parseStartedDate = Carbon::parse($data['startDate']);
		$parseTargetDate = Carbon::parse($data['targetDate']);

		$todo->name = $data['name'];
		$todo->description = $data['description'];
		$todo->started_at = $parseStartedDate;
		$todo->done_at = $parseTargetDate;
		$todo->completed = $completed;

		$todo->save();

		session()->flash('success', 'Task updated successfully');

		return redirect('/todos/' . $todo->id);

	}

	public function complete(Todo $todo) {

		$todo->completed = true;
		$todo->save();

		session()->flash('success', 'Task completed.');

	}

}
