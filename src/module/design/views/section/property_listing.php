<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:36
 * @var $this \yii\web\View
 * @var $context \module\design\section\PropertyListing
 */
$context = $this->context;
?>
<section class="property-listing multiple-recent-properties">
    <div class="container">
        <div class="row padding-bottom-64">
            <div class="lisi-bg">
                <div class="col-md-9 property-type-menu">
                    <ul class="property-type">
                        <li><a data-id="All" class="active" href="javascript:void(0);">All</a> </li>
                        <li><a data-id="Residential" href="javascript:void(0);">Residential</a> </li>
                        <li><a data-id="Commercial" href="javascript:void(0);" class="">Commercial</a> </li>
                        <li><a data-id="FurnishedHomes" href="javascript:void(0);" class="">Furnished Homes</a> </li>
                        <li><a data-id="PayingGuest" href="javascript:void(0);" class="">Paying Guest</a> </li>
                        <li><a data-id="LandAndPlot" href="javascript:void(0);" class="">Land &amp; Plot</a> </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="property-listing-type-button">
                        <li>
                            <a href="property-lisit-1.html"><i class="fa fa-bars"> </i></a>
                        </li>
                        <li>
                            <a href="property-grid-2.html"><i class="fa fa-th"> </i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);"  class="active"><i class="fa fa-map-marker"> </i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row property-list-area property-list-map-area">
            <div class="property-list-map">
                <div id="property-listing-map" class="multiple-location-map" style="width:100%;height:1050px;"></div>
            </div>
        </div>
    </div>
    </div>
</section>
