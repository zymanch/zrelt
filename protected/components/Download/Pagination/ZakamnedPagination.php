<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:31
 */
class ZakamnedPagination extends DownloadPagination {

    public function obtainAdverts($page) {
        $url = 'http://www.zakamned.ru/base/index.php?b='.$page;
        $content = Yii::app()->curl->get($url);
        $document = phpQuery::newDocumentHTML($content,'windows-1251');
        $rows = $document->find('tr');
        $result = array();
        $skipRow = true;
        foreach ($rows as $row) {
            if ($skipRow) {
                $skipRow = false;
            } else {
                $result[] = new ZakamnedAdvert(pq($row), $url);
            }
        }
        return $result;
    }

    function getPagesCount() {
        return 5;
    }
}