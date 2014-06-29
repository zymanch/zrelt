<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:31
 */
class AvitoPagination extends DownloadPagination {

    public function obtainAdverts($page) {
        return array();
    }

    function getPagesCount() {
        return 0;
    }
}