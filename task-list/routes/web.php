<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {
    }
}
$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:00:00'
    ),
    new Task(
        2,
        'Sell old stuff',
        'Task 2 description',
        null,
        false,
        '2023-03-02 12:00:00',
        '2023-03-02 12:00:00'
    ),
    new Task(
        3,
        'Learn programming',
        'Task 3 description',
        'Task 3 long description',
        true,
        '2023-03-03 12:00:00',
        '2023-03-03 12:00:00'
    ),
    new Task(
        4,
        'Take dogs for a walk',
        'Task 4 description',
        null,
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:00:00'
    ),
];


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/name', function(){
//     return 'name';
// });

// // we can give names to the Route object in the following way
// Route::get('/page', function(){
//     return 'page route';
// })->name('pageRoute');

// // calling the routes with the names of the routes 
// Route::get('/fake', function () {
//     return redirect()->route('pageRoute');
// });

// // here returning the blade templtes by the name of the blade template instead of any string or value
// Route::get('bladeTemplate', function () {
//     return view('index');
// });

// // Calling another blade template by passing some variables from route to the blade template 
// Route::get('bladeTemplateVar', function() {
//     return view('index1',[
//         'name' => 'Aditya' // Use the same variable name in the index1 blade template to call the variable
//     ]);
// });

// // sending the tasks list to the blade for knowing about blade directive
// Route::get('/bladeDirective',function () use($tasks) {
//     return view('directive',[
//         'tasks' => $tasks 
//     ]);
// });

Route::get('/', function () {
    return redirect()->route('task.index');
});


Route::get('/tasks', function() use ($tasks){
    return view('directive',[
        'tasks' => $tasks
    ]);
})->name('task.index');


Route::get('/tasks/{id}', function ($id) use ($tasks) {
    $task = collect($tasks)->firstWhere('id', $id);

    if (!$task) {
        abort(Response::HTTP_NOT_FOUND);
    }
    return view('show',[
        'task' => $task
    ]);
})->name('task.show');


Route::fallback(function () {
    return "404 Page Not Found";
});