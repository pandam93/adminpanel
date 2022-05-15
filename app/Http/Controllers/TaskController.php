<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Requests\DataTableAjaxRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->authorizeResource(Task::class, 'task');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Gate::authorize('viewAny', Task::class);

        $tasks = Task::with('user:id,name')->get(['id', 'name', 'user_id']);

        // Plugin configuration del DataTables
        $heads = [
            'ID',
            'Name',
            'User',
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];
        
        $config = [
            // 'data' => $newTasks->toArray(),
            // 'order' => [[1, 'asc']],
            // 'columns' => [null, null, null, ['orderable' => false]],
            'serverSide' => true,
            'processing' => true,
            'ajax' => '/gettasks',
            'columns' => [null, null, null, ['orderable' => false]],
        ];

        return view('admin.tasks.index')->with([
            'config' => $config,
            'heads' => $heads
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        dd($request->input());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        Gate::authorize('delete', $task);
    }

    public function getTasks(Request $request) 
    {
        $draw = $request->get('draw'); 
        $start = $request->get("start"); 
        $rowperpage = $request->get("length"); // Rows display per page 


        $columnIndex_arr = $request->get('order'); 
        $columnName_arr = $request->get('columns'); 
        $order_arr = $request->get('order'); 
        $search_arr = $request->get('search'); 


        $columnIndex = $columnIndex_arr[0]['column']; // Column index 
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name 
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc 
        $searchValue = $search_arr['value']; // Search value 

 

        // Total records 

        $totalRecords = Task::select('count(*) as allcount')->count(); 

        $totalRecordswithFilter = Task::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count(); 

 

        // Fetch records 
        
        $records = Task::orderBy($columnName,$columnSortOrder) 
        
            ->leftJoin('users', 'users.id', '=', 'tasks.user_id')

            ->where('tasks.name', 'like', '%' .$searchValue . '%') 

            ->select('tasks.*', 'users.name as user') 

            ->skip($start) 

            ->take($rowperpage) 

            ->get(); 
            

 

        $data_arr = array(); 

        $sno = $start+1; 

        foreach($records as $record){ 

            $id = $record->id; 

            $name = $record->name; 
            
            $user = $record->user;

            $actions = $record->actions();
 

            $data_arr[] = array(

                'id' => $id, 

                'name' => $name, 
                
                'user' => $user, 

                'actions' => $actions,

            ); 

            
        }
         

        $response = collect(
            [ 
            "draw" => intval($draw), 

            "iTotalRecords" => $totalRecords, 

            "iTotalDisplayRecords" => $totalRecordswithFilter, 

            "aaData" => $data_arr 
            ]

        );
 
        return $response->toJson(); 

    } 
}
