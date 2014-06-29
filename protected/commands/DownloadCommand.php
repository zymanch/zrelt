<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:27
 */
class DownloadCommand extends CConsoleCommand {


    public function run($args) {
        Yii::import('application.components.Download.*',true);
        Yii::import('application.components.Download.Advert.*',true);
        Yii::import('application.components.Download.Pagination.*',true);

        $sources = Source::model()->findAll();
        /** @var Source[] $sources */
        foreach ($sources as $source) {
            printf("Parsing %s\n",$source->name);
            $actualIds = $this->_download($source->shortname);
            $this->_markFinishedAdverts($actualIds, $source->id);
        }
    }

    protected function _download($shortName) {
        $paginationClass = ucfirst($shortName).'Pagination';
        /** @var DownloadPagination $pagination */
        $pagination = new $paginationClass();
        $count = $pagination->getPagesCount();
        echo "Parsed 0%\n";
        $actualIds = array();
        for ($page=0;$page < $count;$page++) {
            $adverts = $pagination->obtainAdverts($page);
            foreach ($adverts as $advert) {
                $ids = $advert->save();
                $actualIds = array_merge($actualIds, $ids);
            }
            printf("\rParsed %d%%",round(100 * $page /($count > 1 ? $count-1 : 1)));
        }
        return $actualIds;
    }

    protected function _markFinishedAdverts($actualIds, $sourceId) {
        $condition = new CDbCriteria();
        $condition->compare('source_id',$sourceId);
        $condition->addCondition('expired is null');
        $condition->addNotInCondition('id',$actualIds);
        Advert::model()->
            updateAll(array(
                'expired' => new CDbExpression('now()')
            ),$condition);
    }

}