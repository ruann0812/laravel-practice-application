<?php

namespace App\Http\Controllers;
use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller {
	//

	public function index() {

		$todos = Todo::all();
		return view('todos.index')->with('todos', $todos);
	}

	public function show($todoId) {

		$todo = Todo::find($todoId);

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
		]);

		$data = request()->all();

		$todo = new Todo();

		$todo->name = $data['name'];
		$todo->description = $data['description'];
		$todo->completed = false;

		$todo->save();

		return redirect('/todos');

	}

	public function edit($todoId) {

		$todo = Todo::find($todoId);

		return view('todos.edit')->with('todo', $todo);

	}

	public function update($todoId, Request $req) {

		$this->validate(request(), [
			'name' => 'required',
			'description' => 'required',
		]);

		$data = request()->all();

		$todo = Todo::find($todoId);

		$completed = (!$req->has('completed') ? 0 : $data['completed']);

		$todo->name = $data['name'];
		$todo->description = $data['description'];
		$todo->completed = $completed;

		$todo->save();

		return redirect('/todos');

	}

}
