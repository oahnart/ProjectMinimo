<?php
namespace App\Repositories;
use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    public function getIndex($id_category,$PAGE_SIZE);
    public function getLoadMore($PAGE_SIZE);
    public function allCategory();
    public function allNews();
    public function newCategory();
    public function newNews();
    public function newPost();
    public function findCategory($id);
    public function findNews($id);
}