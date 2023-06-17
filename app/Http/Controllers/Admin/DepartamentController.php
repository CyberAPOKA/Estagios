<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Departament;

class DepartamentController extends Controller
{
    public function departament()
    {
        $categories = Departament::where('parent_id', '=', 0)->get();

        $allCategories = Departament::pluck('title', 'id')->all();

        return view('admin.pages.departament', compact('categories', 'allCategories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        Departament::create($input);
        return back()->with('success', 'Nova categoria adicionada com sucesso.');
    }

    public function update(Request $request, $id)
    {
        Departament::find($id)->update([
            'title' => $request->input('title'),
        ]);
        return redirect()->back();
    }


    public function delete($id)
    {
        $parent = Departament::findOrFail($id);
        $array_of_ids = $this->getChildren($parent);
        array_push($array_of_ids, $id);
        Departament::destroy($array_of_ids);
        return redirect()->back();
    }

    private function getChildren($category)
    {
        $ids = [];
        foreach ($category->childs as $all) {
            $ids[] = $all->id;
            $ids = array_merge($ids, $this->getChildren($all));
        }
        return $ids;
    }
}
