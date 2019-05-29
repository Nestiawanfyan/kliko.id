<?php namespace App\Pagination;

use Illuminate\Pagination\BootstrapThreePresenter;

class CustomPaginationLinks extends BootstrapThreePresenter {

//<li><a href="#">&laquo;</a></li>
//<li><a href="#">1</a></li>
//<li><span>2</span></li>
//<li><a href="#">3</a></li>
//<li><a href="#">4</a></li>
//<li><a href="#">5</a></li>
//<li><a href="#">&raquo;</a></li>

    public function getActivePageWrapper($text)
    {
        return '<li><span>cadas'.$text.'</span></li>';
    }

    public function getDisabledTextWrapper($text)
    {
        return '<li class="page-item">
          <span class="page-link" aria-label="Previous">
            <span aria-hidden="true">'.$text.'</span>
          </span>
        </li>';
    }

    public function getPageLinkWrapper($url, $page, $rel = null)
    {
        return '<li class="page-item"><a class="page-link" href="'.$url.'">'.$page.'</a></li>';
    }

    public function render()
    {
        if ($this->hasPages())
        {
            return sprintf(
                '%s %s %s',
                $this->getPreviousButton(),
                $this->getLinks(),
                $this->getNextButton()
            );
        }

        return '';
    }

}
