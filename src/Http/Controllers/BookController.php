<?php

namespace Laraviet\LaravelBook\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laraviet\DDDBook\Book\Domain\Services\BookServiceInterface;

class BookController extends Controller
{
    protected $service;

    public function __construct(BookServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $books = $this->service->paginate();
        return view("laravel-book::books.index", compact("books"));
    }

    public function create()
    {
        return view("laravel-book::books.create");
    }

    public function store(Request $request)
    {
        $this->service->persist($request);
        return redirect()->route('books.index');
    }

    public function show($id)
    {
        $book = $this->service->getById($id);
        return view("laravel-book::books.show", compact("book"));
    }

    public function edit($id)
    {
        $book = $this->service->getById($id);
        return view("laravel-book::books.edit", compact("book"));
    }

    public function update($id, Request $request)
    {
        $this->service->persist($request, $id);
        return redirect()->route('books.index');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('books.index');
    }
}
