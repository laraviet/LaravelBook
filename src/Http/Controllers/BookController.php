<?php

namespace Laraviet\LaravelBook\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laraviet\DDDBook\Book\Domain\Services\BookServiceInterface;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookServiceInterface $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = $this->bookService->paginate();
        return view("laravel-book::books.index", compact("books"));
    }

    public function edit($id)
    {
        $book = $this->bookService->getById($id);
        return view("laravel-book::books.edit", compact("book"));
    }

    public function update($id, Request $request)
    {
        $this->bookService->persist($id, $request);
        return redirect('/');
    }
}
