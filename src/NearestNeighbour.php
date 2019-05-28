<?php

class NearestNeighbour
{
    /** @var array  */
    private $distances;

    /** @var array Boolean */
    private $visited;

    /** @var array City */
    private $cities;

    /** @var array */
    private $tour;

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

    private function getMinimumDistancePosition($cityDistances) {
        return array_keys($cityDistances, min(array_filter($cityDistances)));0
    }

    /**
     * @return array $tour
     */
    public function getTour() {
        $this->tour = array(
            "city" => $cities[0]->getName(),
            "position" => 0,
            "distance" = 0
        );

        $i = 0;
        while (sizeOf($this->tour) <= sizeOf($cities)) {

        }

    }

    /**
     * @return array $distances;
     */
    public function getDistances() {
        return $this->distances;
    }
}