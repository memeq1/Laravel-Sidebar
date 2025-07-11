<?php

namespace Maatwebsite\Sidebar\Traits;

trait CacheableTrait
{
    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     */
    public function serialize()
    {
        $cacheables = [];
        foreach ($this->getCacheables() as $cacheable) {
            $cacheables[$cacheable] = $this->{$cacheable};
        }

        return serialize($cacheables);
    }

    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     *
     * @param string $serialized The string representation of the object.
     *
     * @return void
     */
    public function unserialize($serialized)
    {
        $data = unserialize($serialized);

        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }


    public function __serialize(): array
    {
       return $this->serialize();
    }

    public function __unserialize(array $data): void
    {
          $this->unserialize($data);
    }

    /**
     * @return array
     */
    public function getCacheables(): array
    {
        return $this->cacheables ?? ['menu'];
    }
}
