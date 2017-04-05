<?php

namespace Laraviet\LaravelBook\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laraviet\LaravelBook\Helpers\Constants;
use Laraviet\DDDCore\App\Http\Controllers\BaseController;
use Laraviet\DDDBook\Book\Domain\Services\BookServiceInterface;

class BookController extends BaseController
{
    public function __construct(BookServiceInterface $service)
    {
        $this->service = $service;
        $this->package = Constants::PACKAGE;
        $this->root = "books";
    }
}
