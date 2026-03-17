<?php

namespace Maatwebsite\Sidebar;

interface ShouldCache
{
    /**
     * @return array
     */
    public function getCacheables();
}
