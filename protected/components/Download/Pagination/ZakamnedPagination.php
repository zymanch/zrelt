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
        //$content = iconv('CP866','CP1251',$content);
        $content = str_replace('windows-1251','utf-8', $content);
        $content = iconv('windows-1251','utf-8',$content);
        //file_put_contents(__DIR__.'/dump.html', $content);die();
        $document = phpQuery::newDocumentHTML($content,'utf-8');
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

    public function getPagesCount() {
        return 5;
    }
}