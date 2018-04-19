<?php

namespace Viperxes\Client\Http\Controllers;

use Illuminate\Http\Response;
use Viperxes\Client\Http\Requests\ {
    SearchItems, StoreItem, UpdateItem
};
use Viperxes\Client\Services\API;
use Illuminate\Routing\Controller as BaseController;

class ItemsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param  SearchItems $request
     * @return Response
     */
    public function index(SearchItems $request)
    {
        $response = API::call('GET', '/api/v1/items', ['query' => $request->all()]);

        return view('client::item/index', [
            'items' => $response
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('client::item/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreItem $request
     * @return Response
     */
    public function store(StoreItem $request)
    {
        API::call('POST', '/api/v1/items', ['form_params' => $request->all()]);

        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $response = API::call('GET', '/api/v1/items/' . $id);

        return view('client::item/show', [
            'item' => $response
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $response = API::call('GET', '/api/v1/items/' . $id);

        return view('client::item/edit', [
            'item' => $response
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateItem $request
     * @param  int $id
     * @return Response
     */
    public function update(UpdateItem $request, $id)
    {
        API::call('PUT', '/api/v1/items/' . $id, ['form_params' => $request->all()]);

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        API::call('DELETE', '/api/v1/items/' . $id);

        return redirect()->route('items.index');
    }
}
