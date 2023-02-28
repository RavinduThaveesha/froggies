<?php

namespace App\Services;

use App\Contracts\FrogRepositoryInterface;
use Yajra\DataTables\DataTables;

class FrogService {

    /**
     * The repository instance.
     * 
     */
    protected $repository;

     /**
     * Create a new service instance.
     * 
     * @param FrogRepository $repository
     * @return void
     */
    public function __construct(FrogRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all frogs that are not in mating.
     * 
     * @param Gender $gender
     * @return Collection
     */
    public function frogsNotInMating($gender) {
        return $this->repository->frogsNotInMating($gender);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Array $data
     * @return Model
     */
    public function store($data)
    {
        return $this->repository->create($data);
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
            ->addColumn('type', function($row) {
                return $row->type->name;
            })
            ->addColumn('action', function($row) {
                $data = [];
                $data['delete'] = [
                    'url' => route('frog.destroy', $row->id),
                    'method' => 'DELETE',
                    'label' => 'Remove',
                    'btn' => 'btn-danger'
                ];

                if (!$row->dod) {
                    $data['status'] = [
                        'url' => route('frog.status', $row->id),
                        'method' => 'PUT',
                        'label' => 'Mark as Dead',
                        'btn' => 'btn-primary'
                    ];
                }
                
                return view('frog._datatableActions', compact('data'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Update life status.
     * 
     * @param Int $id
     * @return App\Frog
     */
    public function status($id)
    {
        return $this->repository->status($id);
    }

    /**
     * Delete frog.
     * 
     * @param Int $id
     * @return App\Frog
     */
    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}