<?php

class NearestNeighbour
{
    private $distances;

    /** @var array Boolean */
    private $visited;

    /** @var array City */
    private $cities;

    /**
     * NearestNeighbour constructor.
     * @param Array $cities
     */
    public function __construct($cities)
    {
        $this->cities = $cities;

        $this->distances = array(array());
        $this->visited = array();

        for ($i = 0; $i < sizeOf($this->cities); $i++) {
            $this->visited[$i] = false;
            for ($j = 0; $j < sizeOf($this->cities); $j++) {
                if ($i == $j) $this->distances[$i][$j] = 0;
                elseif ($i > $j) $this->distances[$i][$j] = $this->distances[$j][$i];
                else {
                    $this->distances[$i][$j] = $this->cities[$i]->getDistanceToCity($this->cities[$j]);
                }
            }
        }
    }

    /**
     * @return array
     */
    public function getDistances() {
        return $this->distances;
    }
}