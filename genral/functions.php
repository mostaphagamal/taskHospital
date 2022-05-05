<?php

function testMessage($condation , $masssage){
    if($condation){
         echo "<div class='alert alert-info mx-auto w-50'>
         <h3> This $masssage Is True</h3>
         </div>";
    }else{
        echo "<div class='alert alert-danger mx-auto w-50'>
        <h3> This $masssage Is False</h3>
        </div>";
    }

}