<?php

class City
{
    private $name;
    private $lat;
    private $lon;

    const EARTH_RADIUS = 6371000;

    public function __construct($name, $lat, $lon)
    {
        $this->name = $name;
        $this->lat = $lat;
        $this->lon = $lon;
    }

    /**
     * @param City $c
     *
     * @return Boolean
     */
    public function equal(City $c) {
        return $c->getName() === $this->name;
    }

    /**
     * @return String
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return Float
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * @param String $name
     */
    public function setName(String $name)
    {
        $this->name = $name;
    }

    /**
     * @param Float $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @param Float $lon
     */
    public function setLon($lon)
    {
        $this->lon = $lon;
    }

    /**
     * @param City $c
     *
     * @return Float
     */
    public function distanceToCity(City $c)
    {
        $thisLatRad = deg2rad($this->lat);
        $thisLonRad = deg2rad($this->lon);
        $toLatRad = deg2rad($c->getLat());
        $toLonRad = deg2rad($c->getLon());

        $lonDelta = $toLonRad - $thisLonRad;
        $a = pow(cos($toLatRad) * sin($lonDelta), 2) + pow(cos($thisLatRad) * sin($toLatRad) -
                sin($thisLatRad) * cos($toLatRad) * cos($lonDelta), 2);
        $b = sin($thisLatRad) * sin($toLatRad) + cos($thisLatRad) * cos($toLatRad) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);

        return $angle * self::EARTH_RADIUS;
    }
}