<?php


namespace Lib;

class Pagination
{

    public $buttons = [];

    public function __construct (Array $options = array('itemsCount'=>1 , 'itemsPerPage'=>1 , 'currentPage' => 1))
    {
        extract($options);

        /** @var int $currentPage */
        if (!$currentPage) {
            return;
        }

        /** @var int $pagesCount
         * @var int $itemsCount
         * @var int $itemsPerPage
         */
        $pagesCount = ceil ( $itemsCount / $itemsPerPage );

        if ($pagesCount == 1) {
            return;
        }

        /** @var int $currentPage */
        if ($currentPage > $pagesCount) {
            $currentPage = $pagesCount;
        }

        $this->buttons[] = new Buttons( $currentPage - 1, $currentPage > 1, 'Previous' );

        for ($i = 1; $i <= $pagesCount; $i++) {
            $active = $currentPage != $i;
            $this->buttons[] = new Buttons( $i, $active );
        }

        $this->buttons[] = new Buttons( $currentPage + 1, $currentPage < $pagesCount, 'Next' );
    }

}