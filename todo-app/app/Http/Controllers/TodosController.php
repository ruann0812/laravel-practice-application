<?php

namespace App\Http\Controllers;
use App\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodosController extends Controller {
	//

	public function index() {

		$todos = Todo::all();
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

		return view('todos.show')->with(compact('todo', 'completedFontColor'));
	}

	public function create() {

		return view('todos.create');
	}

	public function store() {

		$this->validate(request(), [
			'name' => 'required',
			'description' => 'required',
			'startDate' => 'required',
			'targetDate' => 'required',
		]);

		$data = request()->all();

		$parseStartedDate = Carbon::parse($data['startDate']);
		$parseTargetDate = Carbon::parse($data['targetDate']);

		$todo = new Todo();

		$todo->name = $data['name'];
		$todo->description = $data['description'];
		$todo->started_at = $parseStartedDate;
		$todo->done_at = $parseTargetDate;
		$todo->completed = false;

		$todo->save();

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

		return redirect('/todos/' . $todo->id);

	}

}
