<?php

namespace App\Http\Controllers;

use App\Models\Form;

use Illuminate\Http\Request;

/**
 * Class FormController
 * @package App\Http\Controllers
 */
class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = new Form();
        return view('form.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Form::$rules);

        $form = Form::create($request->all());

        return redirect()->route('forms.index')
            ->with('success', 'Form created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = Form::find($id);

        return view('form.show', compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $form = Form::find($id);

        return view('form.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Form $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        request()->validate(Form::$rules);

        $form->update($request->all());

        return redirect()->route('forms.index')
            ->with('success', 'Form updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $form = Form::find($id)->delete();

        return redirect()->route('forms.index')
            ->with('success', 'Form deleted successfully');
    }
}
