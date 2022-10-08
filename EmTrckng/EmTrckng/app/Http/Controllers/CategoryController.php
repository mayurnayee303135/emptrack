<?php

namespace App\Http\Controllers;

use Response;
use App\Http\Request;
use App\Models\Category;
use Laracasts\Flash\Flash;
use App\DataTables\CategoryDataTable;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends AppBaseController
{
     /** @var  CategoryRepository */
     private $categoryRepository;
 
     public function __construct(CategoryRepository $categoryRepo)
     {
         $this->categoryRepository = $categoryRepo;
     }

    public function index(CategoryDataTable $categoryDataTable)
    {
        return $categoryDataTable->render('categories.index');
    }

    public function create()
    {
        return view('categories.create')->with('roles', $this->categoryRepository->all()->pluck('name', 'id'));;
    }

    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();
       

        $category = $this->categoryRepository->create($input);

        Flash::success(__('models/categories.message.create_success'));

        return redirect(route('categories.index'));
    }

    public function show($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error(__('models/categories.message.not_found'));

            return redirect(route('categories.index'));
        }

        return view('categories.show')->with('category', $category);
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error(__('models/categories.message.not_found'));

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('category', $category);
    }

    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error(__('models/categories.message.not_found'));

            return redirect(route('categories.index'));
        }

        $category = $this->categoryRepository->update($request->all(), $id);

        Flash::success(__('models/categories.message.update_success'));

        return redirect(route('categories.index'));
    }

    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error(__('models/categories.message.not_found'));

            return redirect(route('categories.index'));
        }

        $this->categoryRepository->delete($id);

        Flash::success(__('models/categories.message.delete_success'));

        return redirect(route('categories.index'));
    }
}
