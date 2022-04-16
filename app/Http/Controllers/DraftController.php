<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Http\Requests\DraftRequest;
use App\Models\Draft;
use Illuminate\Http\Request;

class DraftController extends Controller
{
    public function store(DraftRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['link'] = Str::random(16);

        $draft = Draft::create($data);

        return response([
            'link' => '/drafts/' . $draft->link
        ], 200);
    }

    public function show(Draft $draft)
    {
        $this->authorize('show', $draft);

        return $draft;
    }

    public function update(DraftRequest $request, Draft $draft)
    {
        $data = $request->validated();

        $draft->update($data);

        return response(['data' => 'ok'], 200);
    }
}
