<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:31
 */
Yii::import('ext.phpQuery.phpQuery.phpQuery',true);
abstract class DownloadPagination {

    abstract public function getPagesCount();

    /**
     * @param $page
     * @return DownloadAdvert
     */
    abstract public function obtainAdverts($page);

}