<?php
namespace App\Utils;
use Illuminate\Pagination\LengthAwarePaginator;

class Paginator {
    public static function createPaginator($collection, $currentPage, $itemsPerPage)
    {
        return new LengthAwarePaginator(
            $collection->forPage($currentPage, $itemsPerPage),
            $collection->count(),
            $itemsPerPage,
            $currentPage
        );
    }

    public static function buildResponseArray($paginator)
    {
        return [
            'data' => $paginator->items(),
            'current_page' => $paginator->currentPage(),
            'from' => $paginator->firstItem(),
            'to' => $paginator->lastItem(),
            'per_page' => $paginator->perPage(),
            'total' => $paginator->total(),
            'last_page' => $paginator->lastPage(),
            'next_page_url' => $paginator->nextPageUrl(),
            'prev_page_url' => $paginator->previousPageUrl(),
            'path' => $paginator->path(),
            'first_page_url' => $paginator->url(1),
            'last_page_url' => $paginator->url($paginator->lastPage()),
        ];
    }
}