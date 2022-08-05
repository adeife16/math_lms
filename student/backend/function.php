<?php

    function grade($score)
    {
        if($score > 85)
        {
            return 'A';
        }
        elseif($score >= 75)
        {
            return 'AB';
        }
        elseif($score >= 65)
        {
            return 'B';
        }
        elseif($score >= 55)
        {
            return 'C';
        }
        elseif($score >= 45)
        {
            return 'D';
        }
        elseif($score >= 35)
        {
            return 'E';
        }
        elseif($score < 35)
        {
            return 'F';
        }
    }