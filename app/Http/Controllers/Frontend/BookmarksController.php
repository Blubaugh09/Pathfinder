<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBookmarkRequest;
use App\Http\Requests\StoreBookmarkRequest;
use App\Http\Requests\UpdateBookmarkRequest;
use App\Models\Bookmark;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookmarksController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bookmark_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookmarks = Bookmark::with(['user'])->get();

        return view('frontend.bookmarks.index', compact('bookmarks'));
    }

    public function create()
    {
        abort_if(Gate::denies('bookmark_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.bookmarks.create', compact('users'));
    }

    public function store(StoreBookmarkRequest $request)
    {
        $bookmark = Bookmark::create($request->all());

        return redirect()->route('frontend.bookmarks.index');
    }

    public function edit(Bookmark $bookmark)
    {
        abort_if(Gate::denies('bookmark_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bookmark->load('user');

        return view('frontend.bookmarks.edit', compact('bookmark', 'users'));
    }

    public function update(UpdateBookmarkRequest $request, Bookmark $bookmark)
    {
        $bookmark->update($request->all());

        return redirect()->route('frontend.bookmarks.index');
    }

    public function show(Bookmark $bookmark)
    {
        abort_if(Gate::denies('bookmark_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookmark->load('user');

        return view('frontend.bookmarks.show', compact('bookmark'));
    }

    public function destroy(Bookmark $bookmark)
    {
        abort_if(Gate::denies('bookmark_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookmark->delete();

        return back();
    }

    public function massDestroy(MassDestroyBookmarkRequest $request)
    {
        $bookmarks = Bookmark::find(request('ids'));

        foreach ($bookmarks as $bookmark) {
            $bookmark->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
