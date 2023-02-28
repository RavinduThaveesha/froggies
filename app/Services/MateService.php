<?php

namespace App\Services;

use App\Contracts\MateRepositoryInterface;
use Yajra\DataTables\DataTables;

class MateService {

    /**
     * The repository instance.
     * 
     */
    protected $repository;

     /**
     * Create a new service instance.
     * 
     * @param MateRepositoryInterface $repository
     * @return void
     */
    public function __construct(MateRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all instance.
     *
     * @return Collection
     */
    public function all()
    {
        return $this->repository->all();
    }

    /**
     * Create a new record in database.
     * 
     * @param Array $data
     * @return App\Mate
     */
    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * Update mating status.
     * 
     * @param Int $id
     * @param Array $data
     * @return App\Mate
     */
    public function status($id, $data)
    {
        return $this->repository->status($id, $data);
    }

    /**
     * Generate datatable
     *
     * @return Datatable
     */
    public function makeDatatable()
    {
        $data = $this->repository->all();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('frogs', function($row) {
                $elm = '';
                foreach($row->frogs as $frog) {
                    $elm .= "{$frog->name}({$frog->gender} - {$frog->type->name})<br/>";
                }
                
                return $elm;
            })
            ->addColumn('action', function($row) {
                $data = [
                    'url' => route('mate.status', $row->id),
                    'options' => $this->getStatus(),
                    'disabled' => $row->end_date ? 'disabled' : '',
                    'selected' => $row->status,
                ];

                return view('mate._datatableActions', compact('data'));
            })
            ->rawColumns(['frogs', 'action'])
            ->make(true);
    }

    /**
     * Generate status
     *
     * @return Array
     */
    private function getStatus()
    {
        return [
            1 => 'In Progress',
            2 => 'In Completed',
            3 => 'Completed'
        ];
    }
}