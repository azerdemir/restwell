<?php

namespace Demir\Restwell\Controller;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Demir\Restwell\Repository\RepositoryInterface;

class BaseController extends Controller
{
    /**
     * Repository object.
     *
     * @var Demir\Restwell\BaseRepository
     */
    protected $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;

        if (!isset($this->layout)) {
            $masterLayout = Config::get('restwell::layouts.master');

            if (!empty($masterLayout)) {
                $this->layout = $masterLayout;
            }
        }
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }
}
