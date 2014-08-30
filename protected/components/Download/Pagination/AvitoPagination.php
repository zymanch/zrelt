<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:31
 */
class AvitoPagination extends DownloadPagination {

    const DOMAIN = 'http://www.avito.ru';
    const PATH = '/naberezhnye_chelny/kvartiry/prodam';

    protected $_pages = array();

    protected $_pagesIndex = array();

    public function __construct() {
        $this->_pagesIndex[] = 1;
        $pageIndex = 0;
        $result = array();
        while ($pageIndex < sizeof($this->_pagesIndex)) {
            $pageNumber = $this->_pagesIndex[$pageIndex];
            $content = Yii::app()->curl->get(self::DOMAIN.self::PATH.'?p='.$pageNumber);
            $document = phpQuery::newDocumentHTML($content,'iso-8859-1');
            $pages = $document->find('.b-paginator a');
            foreach ($pages as $page) {
                $href = pq($page)->attr('href');
                if (strpos($href,self::PATH) !== 0) {
                    continue;
                }
                $href = explode('?',$href, 2);
                parse_str($href[1], $attributes);
                if (!isset($attributes['p'])) {
                    continue;
                }
                $attributes['p'] = intval($attributes['p'],10);
                if (!in_array($attributes['p'],$this->_pagesIndex)) {
                    $this->_pagesIndex[] = $attributes['p'];
                }
            }
            $adverts = $document->find('.b-catalog-table .item');
            foreach ($adverts as $advert) {
                $advert = pq($advert);
                $id = $advert->attr('id');
                if (isset($this->_pages[$id])) {
                    continue;
                }
                $url = $advert->find('.title a')->attr('href');
                $this->_pages[$id] = new AvitoAdvert($id, $url);
            }
            break;
            $pageIndex++ ;
        };
        return $result;

    }

    public function obtainAdverts($page) {
        return $this->_pages;
    }

    function getPagesCount() {
        return sizeof($this->_pages);
    }
}