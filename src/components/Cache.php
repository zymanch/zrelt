<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace components;

use models;
use yii\caching\CacheInterface;


class Cache implements CacheInterface
{

    public function exists($key)
    {
        $model = models\Cache::find()->where(['name' => $key])->one();
        return $model!==null;
    }

    public function get($key)
    {
        $model = models\Cache::find()->where(['name' => $key])->one();
        if (!$model) {
            return false;
        }
        return $model->getValue();
    }

    public function multiGet($keys)
    {
        if (empty($keys)) {
            return [];
        }
        $models = models\Cache::find()->where(['name' => $keys])->all();
        $results = [];
        foreach ($keys as $key) {
            $results[$key] = false;
        }
        foreach ($models as $model) {
            $results[$model->name] = $model->getValue();
        }

        return $results;
    }

    public function set($key, $value, $duration = null, $dependency = null)
    {
        $model = models\Cache::find()->where(['name' => $key])->one();
        if ($model) {
            $model->setValue($value);
            return true;
        }
        return $this->add($key, $value, $duration);
    }

    public function add($key, $value, $duration = 0, $dependency = null)
    {
        try {
            $model = new models\Cache();
            $model->name = $key;
            $model->setValue($value);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function multiSet($items, $duration = 0, $dependency = null) {
        foreach ($items as $key => $value) {
            $this->set($key, $value, $duration, $dependency);
        }
    }

    public function multiAdd($items, $duration = 0, $dependency = null) {
        foreach ($items as $key => $value) {
            $this->add($key, $value, $duration, $dependency);
        }
    }

    public function delete($key)
    {
        $model = models\Cache::find()->where(['name' => $key])->one();
        if ($model) {
            $model->delete();
        }
        return true;
    }


    public function gc($force = false)
    {

    }

    public function flush()
    {
        models\Cache::deleteAll();
        return true;
    }

    public function buildKey($key)
    {
        if (!is_string($key)) {
            $key = md5(json_encode($key));
        }

        return $key;
    }

    public function getOrSet($key, $callable, $duration = null, $dependency = null) {
        if (!$this->exists($key)) {
            $this->set($key, $callable(), $duration, $dependency);
        }
        return $this->get($key);
    }


    /**
     * Returns whether there is a cache entry with a specified key.
     * This method is required by the interface [[\ArrayAccess]].
     * @param string $key a key identifying the cached value
     * @return bool
     */
    public function offsetExists($key)
    {
        return $this->get($key) !== false;
    }

    /**
     * Retrieves the value from cache with a specified key.
     * This method is required by the interface [[\ArrayAccess]].
     * @param string $key a key identifying the cached value
     * @return mixed the value stored in cache, false if the value is not in the cache or expired.
     */
    public function offsetGet($key)
    {
        return $this->get($key);
    }

    /**
     * Stores the value identified by a key into cache.
     * If the cache already contains such a key, the existing value will be
     * replaced with the new ones. To add expiration and dependencies, use the [[set()]] method.
     * This method is required by the interface [[\ArrayAccess]].
     * @param string $key the key identifying the value to be cached
     * @param mixed $value the value to be cached
     */
    public function offsetSet($key, $value)
    {
        $this->set($key, $value);
    }

    /**
     * Deletes the value with the specified key from cache
     * This method is required by the interface [[\ArrayAccess]].
     * @param string $key the key of the value to be deleted
     */
    public function offsetUnset($key)
    {
        $this->delete($key);
    }
}
