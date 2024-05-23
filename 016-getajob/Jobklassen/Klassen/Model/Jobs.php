<?php

namespace WIFI\getajob\Klassen\Model;

use WIFI\getajob\Klassen\Mysql;
use WIFI\getajob\Klassen\Model\Row\Job;


class Jobs
 {
    public function alle_jobs(): array
    {   
        $alle_jobs = array();

        $db = Mysql::getInstanz();
        $ergebnis = $db->query("SELECT * FROM jobs ORDER BY id ASC");

        while($row = $ergebnis->fetch_assoc()){
            $alle_jobs[] = new Job($row);
        }
        return $alle_jobs;
    }

 }