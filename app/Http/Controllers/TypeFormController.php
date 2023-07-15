<?php

namespace App\Http\Controllers;

use App\Models\TypeForm;
use Illuminate\Http\Request;

/**
 * Class TypeFormController
 * @package App\Http\Controllers
 */
class TypeFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeForms = TypeForm::paginate();

        return view('type-form.index', compact('typeForms'))
            ->with('i', (request()->input('page', 1) - 1) * $typeForms->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeForm = new TypeForm();
        return view('type-form.create', compact('typeForm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TypeForm::$rules);

        $typeForm = TypeForm::create($request->all());

        return redirect()->route('type-forms.index')
            ->with('success', 'TypeForm created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeForm = TypeForm::find($id);

        return view('type-form.show', compact('typeForm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeForm = TypeForm::find($id);

        return view('type-form.edit', compact('typeForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TypeForm $typeForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeForm $typeForm)
    {
        request()->validate(TypeForm::$rules);

        $typeForm->update($request->all());

        return redirect()->route('type-forms.index')
            ->with('success', 'TypeForm updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $typeForm = TypeForm::find($id)->delete();

        return redirect()->route('type-forms.index')
            ->with('success', 'TypeForm deleted successfully');
    }
}
