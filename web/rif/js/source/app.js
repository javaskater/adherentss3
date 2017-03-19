import React from 'react';
import ReactDOM from 'react-dom';
import DetailRJ from './components/DetailRJ';

$(document).ready(function() {
    var path_array = $(location).attr("pathname").split("/").slice(-4, -2);
    var newpath = "";
    for (var i in path_array){
        if (path_array[i].length > 0){
           newpath = newpath +"/"+ path_array[i];
        }
    }
    var urlbase = $(location).attr("origin") + newpath + '/randonnee';

    var dateToDateString = function(phpdateobject){
        var timestamp = phpdateobject.timestamp * 1000;
        var maDate = new Date(timestamp);
        var curr_day = maDate.getDate();
        var curr_month = maDate.getMonth();
        var curr_year = maDate.getFullYear();
        return curr_day+"/"+curr_month+"/"+curr_year;
    };

    var dateToHeureString = function (phpdateobject) {
        var output = "--:--";
        if (console && console.debug) {
            console.debug(phpdateobject);
        }
        var timestamp = phpdateobject.timestamp * 1000;
        var maDate = new Date(timestamp);
        var heures = maDate.getHours();
        if (heures > 0){
            var heuresstr = heures.toString();
            if (heures < 10){
                heuresstr = "0" + heuresstr;
            }
            var minutes = maDate.getMinutes();
            var minutesstr = minutes.toString();
            if (minutes < 10){
                minutesstr = "0" + minutesstr;
            }
            output = heuresstr + ":" + minutesstr;
            if (console && console.log) {
                console.log('timestamp: '+timestamp+' heure calculee: '+output);
            }
        }
        return output;
    };

    $(".rifbouton").each(function(index) {
        var rando_str = $(this).attr( "cle_rj" );
        var hikelevel = $(this).attr( "hikelevel_rj" );
        var colorclass=$(this).attr("bgcolor_rj");
        var urlrando = urlbase+"/"+ rando_str;
        //console.log(rando_str);
        var mountNode = $(this).get(0);
        ReactDOM.render(<DetailRJ rjurl={urlrando} hikelevel={hikelevel} bgcolor={colorclass}/>, mountNode);
    });
});
