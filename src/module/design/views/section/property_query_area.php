<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 15.03.2020
 * Time: 8:37
 * @var $this \yii\web\View
 * @var $context \module\design\section\PropertyQueryArea
 */
$context = $this->context;
?>
<section class="property-query-area property-page-bg">
    <div class="container">
        <div class="row padding-bottom-64">
            <div class="col-md-12 text-center"> <img src="<?=$this->context->getImageUrl('head-top-2.png');?>" alt="image">
                <h2 class="pading-20-0 white">Search Properties</h2>
                <p class="white">Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.<br>
                    Nor again is there anyone who loves or pursues or desires to obtain.</p>
            </div>
        </div>
        <div class="row">
            <form action="#">
                <div class="col-md-3 col-sm-6">
                    <div class="single-query">
                        <label>Keyword</label>
                        <input type="text" id="keyword-input" placeholder="Enter Your Keyword">
                        <label>Rooms</label>
                        <select name="Bed Room">
                            <option value="any" selected>Bed Room</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-query">
                        <label>Property</label>
                        <select>
                            <option value="any" selected>Property Type</option>
                            <option value="home">Home</option>
                            <option value="resort">Resort</option>
                            <option value="land">Land</option>
                            <option value="Restrurent">Restrurent</option>
                        </select>
                        <label>Bathroom </label>
                        <select>
                            <option value="any" selected>Bath Room</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-query">
                        <label>Location</label>
                        <select>
                            <option value="any" selected>Find Your Location</option>
                            <option value="new york">new york</option>
                            <option value="London">London</option>
                            <option value="kosovo">kosovo</option>
                            <option value="Los Angeles">Los Angeles</option>
                        </select>
                        <label>Price Plan</label>
                        <select>
                            <option value="any">Minimum Price</option>
                            <option value="$200">$200</option>
                            <option value="$2000">$2000</option>
                            <option value="$20000">$20000</option>
                            <option value="$200000">$200000</option>
                            <option value="$2000000">$2000000</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-query">
                        <label>Property Area</label>
                        <select>
                            <option value="any" selected>Squre Fit</option>
                            <option value="1000 sf">1000 sf</option>
                            <option value="2000 sf">2000 sf</option>
                            <option value="3000 sf">3000 sf</option>
                            <option value="4000 sf">4000 sf</option>
                            <option value="5000 sf">5000 sf</option>
                        </select>
                        <label>Price Plan</label>
                        <select>
                            <option value="any" selected>Maximum Price</option>
                            <option value="$3000">$3000</option>
                            <option value="$4000">$4000</option>
                            <option value="$5000">$5000</option>
                            <option value="$6000">$6000</option>
                            <option value="$7000">$7000</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="single-query">
                        <label>Area (sq)</label>
                        <div data-range_min="10" data-range_max="900" data-cur_min="10" data-cur_max="900" class="nstSlider">
                            <div class="bar"></div>
                            <div class="leftGrip"></div>
                            <div class="rightGrip"></div>
                        </div>
                        <div class="leftLabel"></div>
                        <div class="rightLabel"></div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="single-query">
                        <label>Price (.000 $)</label>
                        <div data-range_min="10" data-range_max="990" data-cur_min="120" data-cur_max="800" class="nstSlider">
                            <div class="bar"></div>
                            <div class="leftGrip"></div>
                            <div class="rightGrip"></div>
                        </div>
                        <div class="leftLabel"></div>
                        <div class="rightLabel"></div>
                    </div>
                </div>
            </form>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="group-button-search"><a data-toggle="collapse" href=".search-propertie-filters" class="more-filter">
                        <div class="text-1">more filter</div>
                        <div class="text-2 hide">less filter</div>
                        <i class="icon fa fa-angle-down"></i></a> </div>
            </div>
            <div class="col-md-6 text-right">
                <div class="query-submit-button">
                    <input type="submit" class="btn-slide" value="Search">
                </div>
            </div>
        </div>
    </div>
</section>