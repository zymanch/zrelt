<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:31
 */
Yii::import('ext.phpQuery.phpQuery.phpQuery',true);
abstract class DownloadPagination {

    abstract function getPagesCount();

    /**
     * @param $page
     * @return DownloadAdvert
     */
    abstract function obtainAdverts($page);

}