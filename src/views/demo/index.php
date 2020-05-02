<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 09.03.2020
 * Time: 15:02
 */

use module\design\exception\WrongWidgetUsage;



$sections = [
    [
        'class' => \module\design\section\AboutUs::class,
        'type' => \module\design\section\AboutUs::TYPE_1,
        'title' => 'ABOUT US',
        'title_description' => 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.<br>
                    Nor again is there anyone who loves or pursues or desires to obtain.',
        'sub_title' => 'Our Company History',
        'content' => '<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.or desires to obtain Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain desires to obtain pain of itself.</p>
                    <div class="query-submit-button pull-left">
                        <input type="submit" class="btn-slide" value="Search">
                    </div>',
        'sliders' => [
            'about-1.jpg',
            'about-2.jpg',
        ],
        'services' => [
            [
                'icon' => \module\design\Icon::LEAF,
                'title' => 'Eco-Friendly',
                'content' => 'Voluptatem quia voluptas sit as of pernatur aut odit aut fugit Neque porro sed quia consequuntur.'
            ],
            [
                'icon' => \module\design\Icon::USER,
                'title' => 'Professional & expert',
                'content' => 'Voluptatem quia voluptas sit as of pernatur aut odit aut fugit Neque porro sed quia consequuntur.'
            ],
            [
                'icon' => \module\design\Icon::DOLLAR,
                'title' => 'Affordable',
                'content' => 'Voluptatem quia voluptas sit as of pernatur aut odit aut fugit Neque porro sed quia consequuntur.'
            ]
        ]

    ],
    [
        'class' => \module\design\section\AboutUs::class,
        'type' => \module\design\section\AboutUs::TYPE_2,
        'title' => 'ABOUT US',
        'title_description' => 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.<br>
                    Nor again is there anyone who loves or pursues or desires to obtain.',
        'sub_title' => 'Our Company History',
        'content' => '<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.or desires to obtain Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain desires to obtain pain of itself.</p>
                    <div class="query-submit-button pull-left">
                        <input type="submit" class="btn-slide" value="Search">
                    </div>',
        'sliders' => [
            'about-1.jpg',
            'about-2.jpg',
        ],
        'services' => [
            [
                'icon' => \module\design\Icon::LEAF,
                'title' => 'Eco-Friendly',
                'content' => 'Voluptatem quia voluptas sit as of pernatur aut odit aut fugit Neque porro sed quia consequuntur.'
            ],
            [
                'icon' => \module\design\Icon::USER,
                'title' => 'Professional & expert',
                'content' => 'Voluptatem quia voluptas sit as of pernatur aut odit aut fugit Neque porro sed quia consequuntur.'
            ],
            [
                'icon' => \module\design\Icon::DOLLAR,
                'title' => 'Affordable',
                'content' => 'Voluptatem quia voluptas sit as of pernatur aut odit aut fugit Neque porro sed quia consequuntur.'
            ]
        ]

    ],
    [
        'class' => \module\design\section\AboutUs::class,
        'type' => \module\design\section\AboutUs::TYPE_3,
        'title' => 'ABOUT US',
        'title_description' => 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.<br>
                    Nor again is there anyone who loves or pursues or desires to obtain.',
        'sub_title' => 'Our Company History',
        'content' => '<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.or desires to obtain Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain desires to obtain pain of itself.</p>
                    <div class="query-submit-button pull-left">
                        <input type="submit" class="btn-slide" value="Search">
                    </div>',
        'sliders' => [
            'about-1.jpg',
            'about-2.jpg',
        ],
        'services' => [
            [
                'icon' => \module\design\Icon::LEAF,
                'title' => 'Eco-Friendly',
                'content' => 'Voluptatem quia voluptas sit as of pernatur aut odit aut fugit Neque porro sed quia consequuntur.'
            ],
            [
                'icon' => \module\design\Icon::USER,
                'title' => 'Professional & expert',
                'content' => 'Voluptatem quia voluptas sit as of pernatur aut odit aut fugit Neque porro sed quia consequuntur.'
            ],
            [
                'icon' => \module\design\Icon::DOLLAR,
                'title' => 'Affordable',
                'content' => 'Voluptatem quia voluptas sit as of pernatur aut odit aut fugit Neque porro sed quia consequuntur.'
            ]
        ]

    ],
    \module\design\section\AdvancedSearchBox::class => [],
    \module\design\section\BgBanner::class => [
        'title' => 'About Us',
        'content' => '10 Years Of Experiences.',
        'links' => [
            ['label'=>'Home','url'=>'#'],
            ['label'=>'About Us','url'=>'#'],
        ]
    ],
    \module\design\section\CarouselFullWidth::class => [
        'title' => 'Meet the Dream Homes Team',
        'content' => 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.<br>
                    Nor again is there anyone who loves or pursues or desires to obtain.',
        'items' => [
            [
                'image' => 'sara-1.png',
                'url' => '#',
                'title' => 'Sara Strawberry',
                'sub_title' => 'Manager',
                'content' => '"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"',
            ],
            [
                'image' => 'sara-1.png',
                'url' => '#',
                'title' => 'Sara Strawberry',
                'sub_title' => 'Manager',
                'content' => '"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"',
            ],
            [
                'image' => 'sara-1.png',
                'url' => '#',
                'title' => 'Sara Strawberry',
                'sub_title' => 'Manager',
                'content' => '"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry"',
            ]
        ],
        'button' => ['label'=>'More About US','url'=>'#']
    ],
    \module\design\section\Contact::class => [
        'title' => 'Subscribe & Stay Updated',
        'content' => '<p>
                    There are many variations of passages of Lorem Ipsum available, but the majority
                    have suffered alteration in some form, by injected humour, or randomised words which
                    don\'t look even slightly believable. If you are going to use a passage of Lorem
                    Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle
                    of text.</p>',
        'submit' => 'Subscribe',
    ],
    \module\design\section\ContactUs::class => [
        'title' => 'contact',
        'content' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature.',
        'email' => Yii::$app->params['email']??null,
        'phone' => Yii::$app->params['phone']??null,
        'skype' => Yii::$app->params['skype']??null,
        'address' => Yii::$app->params['address']??null,
        'title_subscribe' => 'NEWSLETTER',
        'content_subscribe' => 'Subcribe to receive new properties with good price.'
    ],
    \module\design\section\Error::class => [
        'message' => '404, Page not found',
        'content' => 'The Page you are looking for doesn\'t exist or an other error occurred.',
        'buttons' => [
            ['label'=>'GO BACK TO THE HOMEPAGE','url'=>'#'],
            ['label'=>'REFRESH','url'=>'#'],
        ]
    ],
    \module\design\section\Feature::class => [
        'title'=>'Featured Properties',
        'content' => 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.<br>
                    Nor again is there anyone who loves or pursues or desires to obtain.',
        'items' => [
            [
                'label' => 'Villa in Coral Gables',
                'url' => '#',
                'image' => '42-360x240.jpg',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut asd asd asd',
                'price' => 540000
            ],
            [
                'label' => 'Villa in Coral Gables',
                'url' => '#',
                'image' => '42-360x240.jpg',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut ',
                'price' => 540000
            ]
        ],
        'subitems' => [
            [
                'label' => 'Villa in Coral Gables',
                'url' => '#',
                'image' => '8-100x70.jpg',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut asd asd asd',
                'price' => 540000
            ],
            [
                'label' => 'Villa in Coral Gables',
                'url' => '#',
                'image' => '8-100x70.jpg',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut ',
                'price' => 540000
            ],
            [
                'label' => 'Villa in Coral Gables',
                'url' => '#',
                'image' => '8-100x70.jpg',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut ',
                'price' => 540000
            ],
            [
                'label' => 'Villa in Coral Gables',
                'url' => '#',
                'image' => '8-100x70.jpg',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut ',
                'price' => 540000
            ],
            [
                'label' => 'Villa in Coral Gables',
                'url' => '#',
                'image' => '8-100x70.jpg',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut ',
                'price' => 540000
            ]

        ]
    ],
    \module\design\section\FooterBanner::class => [
        'image' => 'foot-brand.png',
        'title' => 'Sell <span>or</span> Rent',
        'content' => 'Your Property',
        'url' => '#',
        'button' => 'click here'
    ],
    \module\design\section\Gallery::class => [
        'items' => [
            ['image'=>'g3.png','width'=>200,'height'=>400,'url'=>'#'],
            ['image'=>'g1.png','width'=>200,'height'=>200,'url'=>'#'],
            ['image'=>'g2.png','width'=>200,'height'=>200,'url'=>'#'],
            ['image'=>'g4.png','width'=>400,'height'=>200,'url'=>'#'],
            ['image'=>'g5.png','width'=>400,'height'=>200,'url'=>'#'],
            ['image'=>'g6.png','width'=>400,'height'=>200,'url'=>'#'],
            ['image'=>'g7.png','width'=>400,'height'=>200,'url'=>'#'],
            ['image'=>'g8.png','width'=>400,'height'=>200,'url'=>'#'],
            ['image'=>'g9.png','width'=>400,'height'=>200,'url'=>'#'],
            ['image'=>'g10.png','width'=>200,'height'=>400,'url'=>'#'],
            ['image'=>'g3.png','width'=>200,'height'=>400,'url'=>'#'],
        ]
    ],
    \module\design\section\GalleryMasonry::class => [
        'items' => [
            [
                'category' => ['Communities','Commercial'],
                'height' => 100,
                'width' => 200 ,
                'image' => 'm-gallery-1.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'width' =>100,
                'height' =>200,
                'category' => ['Commercial'],
                'image' => 'm-gallery-3.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'width' =>100,
                'height' => 100,
                'category' => ['Communities'],
                'image' => 'm-gallery-2.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'width' =>100,
                'height' => 100,
                'category' => ['Apartments'],
                'image' => 'm-gallery-2.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'width' =>100,
                'height' => 100,
                'category' => ['Communities','Commercial'],
                'image' => 'm-gallery-2.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'width' =>100,
                'height' => 100,
                'category' => ['Communities'],
                'image' => 'm-gallery-2.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'width' =>100,
                'height' => 100,
                'category' => ['Communities','Houses'],
                'image' => 'm-gallery-2.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'width' => 200,
                'height' => 200,
                'image' => 'm-gallery-4.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'height' => 100,
                'width' => 200,
                'image' => 'm-gallery-1.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'height' => 100,
                'width' => 200,
                'category' => ['Commercial'],
                'image' => 'm-gallery-1.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'width' =>100,
                'category' => ['Apartments'],
                'height' => 200,
                'image' => 'm-gallery-3.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'width' =>100,
                'height' => 100,
                'category' => ['Communities','Houses'],
                'image' => 'm-gallery-2.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'width' =>100,
                'height' => 100,
                'category' => ['Houses'],
                'image' => 'm-gallery-2.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'category' => ['Houses','Apartments'],
                'width' => 200,
                'height' => 200,
                'image' => 'm-gallery-4.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'height' => 100,
                'width' => 200,
                'image' => 'm-gallery-1.jpg',
                'category' => ['Commercial','Apartments'],
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'width' =>100,
                'height' => 100,
                'image' => 'm-gallery-1.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'width' =>100,
                'height' => 200,
                'category' => ['Houses'],
                'image' => 'm-gallery-3ё1.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'width' =>100,
                'height' => 100,
                'category' => ['Apartments','Houses'],
                'image' => 'm-gallery-2.jpg',
                'title' => 'Cool Title',
                'content' => 'Lorem ipsum dolor sit amet'
            ]
        ]
    ],
    \module\design\section\HotOffer::class => [
        'title' => 'Hot offer',
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis viverra venenatis nisl, et venenatis nulla tincidunt non. Nulla sed dui est. Viverra venenatis nisl, et venenatis nulla tincidunt non. Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet,',
        'icon' => \module\design\Icon::HOME
    ],
    \module\design\section\InnerPageShortcodes::class => [
        'title' => 'Typography',
        'description' => 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally.<br>
                        Nor again is there anyone who loves or pursues or desires to obtain.',
        'content' => '<h1>Fusce eu felis in metus dictum interdum.</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor arcu non ligula convallis, vel tincidunt ipsum posuere. Fusce sodales lacus ut pellentesque sollicitudin. Duis iaculis, arcu ut hendrerit pharetra, elit augue pulvinar magna, a consectetur.</p>
            <h2>Maecenas sed ante quis lorem posuere ullamcorper.</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor arcu non ligula convallis, vel tincidunt ipsum posuere. Fusce sodales lacus ut pellentesque sollicitudin. Duis iaculis, arcu ut hendrerit pharetra, elit augue pulvinar magna, a consectetur.</p>
            <h3>Donec molestie ipsum at diam suscipit suscipit in id est.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor arcu non ligula convallis, vel tincidunt ipsum posuere. Fusce sodales lacus ut pellentesque sollicitudin. Duis iaculis, arcu ut hendrerit pharetra, elit augue pulvinar magna, a consectetur.</p>'
    ],
    \module\design\section\MainSlider::class => [
        'sign' =>'$',
        'contents' => [[
            'image' => 'banner-1.jpg',
            'animation'=>1,
            'title' => 'Home in Coral Gables',
            'price' => 999999,
            'button' => ['url'=>'#','label'=>'For rent'],
            'properties' => [
                ['label'=>'Area','value'=>3600,'sign'=>'SQ FT','icon'=>\module\design\Icon::COLUMNS],
                ['label'=>'Bedrooms','value'=>4,'icon'=>\module\design\Icon::TH_LARGE],
                ['label'=>'Bathrooms','value'=>4,'icon'=>\module\design\Icon::TRELLO],
                ['label'=>'Garages','value'=>1,'icon'=>\module\design\Icon::CAR],
                ['label'=>'Type','value'=>'Single Family','icon'=>\module\design\Icon::HOME],
            ]
        ]]
    ],
    \module\design\section\OurServices::class => [],
    \module\design\section\PageContent::class => [],
    \module\design\section\PageContents::class => [],
    \module\design\section\PricingTables::class => [],
    \module\design\section\Property::class => [],
    \module\design\section\PropertyDetail::class => [],
    \module\design\section\PropertyListing::class => [],
    \module\design\section\PropertyQueryArea::class => [],
    \module\design\section\SearchPropertieFilters::class => [],
    \module\design\section\Section::class => [],
    \module\design\section\Services::class => [],
    \module\design\section\StepsSec::class => [],
    \module\design\section\SubmitProperty::class => [],
    \module\design\section\TenatForm::class => [],
    \module\design\section\Testinomial::class => [],
    \module\design\section\Wide::class => [],
    \module\design\section\ZIndex::class => [],
];
foreach ($sections as $class => $options) {
    try {?>
        <hr>

        <?php
        $content = '';
        if (isset($options['content'])) {
            $content = $options['content'];
            unset($options['content']);
        }
        if (isset($options['class'])) {
            $class = $options['class'];
            unset($options['class']);
        }
        ?>
        <h3>Widget <?=$class;?></h3>
        <?php $class::begin($options);?><?=$content;?><?php $class::end();?>
    <?php } catch (WrongWidgetUsage $e) { ?>
        <div class="alert alert-warning">Widget <?=$class;?> not available for <?=module\design\Layout::getCurrentLayout();?> layout</div>
    <?php } catch (Exception $e) { ?>
        <div class="alert alert-danger"><?=$e->getMessage();?></div>
    <?php }



}