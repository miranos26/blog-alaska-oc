<?php

class viewFunction
{

    public $secondes;
    public $minutes;
    public $hours;
    public $days;
    public $months;
    public $years;


    public function dateDiff($date_comment)
    {
        date_default_timezone_set('Europe/Paris');

        $startDate = date_create($date_comment);
        $now = date_create();
        $diff = date_diff($startDate, $now);

        if ($diff->y> 0) {
            $years = $diff->y;
            $this->years = $years;
        } else {
            $years = '';
            $this->years = $years;
        }

        if ($diff->m> 0) {
            $months = $diff->m;
            $this->months = $months;
        } else {
            $months = '';
            $this->months = $months;
        }

        if ($diff->d > 0) {
            $days = $diff->d;
            $this->days = $days;
        } else {
            $days = '';
            $this->days = $days;
        }

        if ($diff->h > 0) {
            $hours = $diff->h;
            $this->hours = $hours;
        } else {
            $hours = '';
            $this->hours = $hours;
        }

        if ($diff->i > 0) {
            $minutes = $diff->i;
            $this->minutes = $minutes;
        } else {
            $minutes = '';
            $this->minutes = $minutes;
        }
        if ($diff->s > 0) {
            $secondes = $diff->s;
            $this->secondes = $secondes;
        } else {
            $secondes = '';
            $this->secondes = $secondes;
        }

        $this->writeDate();
    }

    public function writeDate(){

        if ($this->years > 1){
            echo 'Posté il y a plus de ' . $this->years . ' an.';
        } elseif ($this->years === 1){
            echo 'Posté il y a ' . $this->years . ' an.';
        } else {
            if($this->months > 1){
                echo 'Posté il y a plus de ' . $this->months . ' mois.';
            } elseif ($this->months === 1){
                echo 'Posté il y a ' . $this->months . ' mois. ';
            } else {
                if($this->days > 1){
                    echo 'Posté il y a plus de ' . $this->days . ' jours.';
                } elseif ($this->days === 1){
                    echo 'Posté il y a ' . $this->days . ' jour.';
                } else {
                    if($this->hours > 1){
                        echo 'Posté il y a ' . $this->hours . ' heures et ' . $this->minutes . ' minutes.';
                    } elseif($this->hours === 1){
                        echo 'Posté il y a ' . $this->hours . ' heure et ' . $this->minutes . ' minutes.';
                    } else {
                        if($this->minutes > 1){
                            echo 'Posté il y a ' . $this->minutes . ' minutes.';
                        } elseif($this->minutes === 1){
                            echo 'Posté il y a ' . $this->minutes . ' minute et ' . $this->secondes . ' secondes.';
                        } else{
                            if($this->secondes>1){
                                echo 'Posté il y a ' . $this->secondes . ' secondes.';
                            }
                        }
                    }
                }
            }
        }
    }

    public function dateConvert($originalDate){
        $newDate = date('d-m-Y', strtotime($originalDate));
        return $newDate;
    }

    public function dateConvertWithTime($originalDate)
    {
        $newDate = date('d-m-Y à H:i:s', strtotime($originalDate));
        return $newDate;
    }

}



