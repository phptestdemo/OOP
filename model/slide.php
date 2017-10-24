<?php

/**
 * summary
 */
include 'database.php';

class Slide extends database
{
    /**
     * summary
     */

    public function getSlide()
    {
    	$sql = "SELECT * FROM slide";
    	$this->setQuery($sql);
    	return $this->loadAllRows();
    }

}