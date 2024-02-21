<?php

namespace App\Model;

class Tesla
{
    private string $model;
    public function getModel()
    {
        return $this->model;
    }

    private float $acceleration;
    public function getAcceleration()
    {
        return $this->acceleration;
    }

    private float $wltp;
    public function getWltp()
    {
        return $this->wltp;
    }

    private int $seats;
    public function getSeats()
    {
        return $this->seats;
    }

    private string $img;
    public function getImagePath()
    {
        return "src/img/{$this->img}";
    }

    private static array $models =
    [
        "s" => "Model S",
        "3" => "Model 3",
        "x" => "Model X",
        "y" => "Model Y",
    ];
    public static function getModels()
    {
        return Tesla::$models;
    }

    public function __construct(string $model, float $acceleration, float $wltp, int $seats, string $img)
    {
        $this->model = $model;
        $this->acceleration = $acceleration;
        $this->wltp = $wltp;
        $this->seats = $seats;
        $this->img = $img;
    }
}
