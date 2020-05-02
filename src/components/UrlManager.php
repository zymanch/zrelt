<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace components;

use yii\web\Request;

/**
 * UrlManager handles HTTP request parsing and creation of URLs based on a set of rules.
 *
 * UrlManager is configured as an application component in [[\yii\base\Application]] by default.
 * You can access that instance via `Yii::$app->urlManager`.
 *
 * You can modify its configuration by adding an array to your application config under `components`
 * as it is shown in the following example:
 *
 * ```php
 * 'urlManager' => [
 *     'enablePrettyUrl' => true,
 *     'rules' => [
 *         // your rules go here
 *     ],
 *     // ...
 * ]
 * ```
 *
 * Rules are classes implementing the [[UrlRuleInterface]], by default that is [[UrlRule]].
 * For nesting rules, there is also a [[GroupUrlRule]] class.
 *
 * For more details and usage information on UrlManager, see the [guide article on routing](guide:runtime-routing).
 *
 * @property string $baseUrl The base URL that is used by [[createUrl()]] to prepend to created URLs.
 * @property string $hostInfo The host info (e.g. `http://www.example.com`) that is used by
 * [[createAbsoluteUrl()]] to prepend to created URLs.
 * @property string $scriptUrl The entry script URL that is used by [[createUrl()]] to prepend to created
 * URLs.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class UrlManager extends \yii\web\UrlManager
{


    public $enablePrettyUrl = true;

     public $showScriptName = false;


    /**
     * Parses the user request.
     * @param Request $request the request component
     * @return array|bool the route and the associated parameters. The latter is always empty
     * if [[enablePrettyUrl]] is `false`. `false` is returned if the current request cannot be successfully parsed.
     */
    public function parseRequest($request)
    {
        $route = '';
        $params = [];
        $pathInfo = $request->getPathInfo();
        $parts = explode('/',$pathInfo);
        if (!$parts) {
            return [$route, $params];
        }
        $id = end($parts);
        if (is_numeric($id)) {
            unset($parts[count($parts)-1]);
            $params['id'] = (int)$id;
        }
        $route = implode('/',$parts);
        return [$route, $params];
    }
/*
    protected function _parseDateGroupParam(&$params) {
        if (count($params)<3) {
            return false;
        }
        $count = count($params);
        $from = $params[$count-3];
        $to = $params[$count-2];
        $group = $params[$count-1];
        if (!preg_match('/^(\d{8})$/', $from)) {
            return false;
        }
        if (!preg_match('/^(\d{8})$/', $to)) {
            return false;
        }
        if (!preg_match('/^(hour|day|week|month|year)$/', $group)) {
            return false;
        }
        unset($params[$count-3],$params[$count-2],$params[$count-1]);
        return [
            'created_from' => substr($from,0,4).'-'.substr($from,4,2).'-'.substr($from,6,2),
            'created_to'   => substr($to,0,4).'-'.substr($to,4,2).'-'.substr($to,6,2),
            'group'        => $group,
        ];
    }
/**/


    /**
     * Creates a URL using the given route and query parameters.
     *
     * You may specify the route as a string, e.g., `site/index`. You may also use an array
     * if you want to specify additional query parameters for the URL being created. The
     * array format must be:
     *
     * ```php
     * // generates: /index.php?r=site%2Findex&param1=value1&param2=value2
     * ['site/index', 'param1' => 'value1', 'param2' => 'value2']
     * ```
     *
     * If you want to create a URL with an anchor, you can use the array format with a `#` parameter.
     * For example,
     *
     * ```php
     * // generates: /index.php?r=site%2Findex&param1=value1#name
     * ['site/index', 'param1' => 'value1', '#' => 'name']
     * ```
     *
     * The URL created is a relative one. Use [[createAbsoluteUrl()]] to create an absolute URL.
     *
     * Note that unlike [[\yii\helpers\Url::toRoute()]], this method always treats the given route
     * as an absolute route.
     *
     * @param string|array $params use a string to represent a route (e.g. `site/index`),
     * or an array to represent a route with query parameters (e.g. `['site/index', 'param1' => 'value1']`).
     * @return string the created URL
     */
    public function createUrl($params)
    {
        $params = (array) $params;
        $anchor = isset($params['#']) ? '#' . $params['#'] : '';
        unset($params['#'], $params[$this->routeParam]);

        $route = trim($params[0], '/');
        unset($params[0]);
        /*
        if (isset($params['created_from'], $params['created_to'], $params['group'])) {
            $route .= '/'.str_replace('-','', $params['created_from']).'-'.
                          str_replace('-','', $params['created_to']).'-'.
                          $params['group'];
            unset($params['created_from'], $params['created_to'], $params['group']);
        }
        /**/
        if (isset($params['id']) && is_numeric($params['id'])) {
            $route.='/'.$params['id'];
            unset($params['id']);
        }
        if (isset($params['project'])) {
            $route = $params['project'].'/'.ltrim($route,'/');
            unset($params['project']);
        }
        if (!empty($params) && ($query = http_build_query($params)) !== '') {
            $route .= '?' . $query;
        }

        $route = ltrim($route, '/');
        return '/'.$route.$anchor;

    }


}
