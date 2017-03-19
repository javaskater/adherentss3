import React, {PropTypes} from 'react';

const CommentRJ = React.createClass({
  
    getInitialState: function() {
        return {
            comment: this.props.comment,
        };
    },
    
    jourmoisannee(phpdateobject) {
        var output = "--/--/----";
        var timestamp = phpdateobject.timestamp * 1000;
        var maDate = new Date(timestamp);
        var jour = maDate.getDay();
        var jourstr = "ddddd"
        switch (jour){
            case 0:
                jourstr = 'Dimanche';
                break;
            case 1:
                jourstr = 'Lundi';
                break;
            case 2:
                jourstr = 'Mardi';
                break;
            case 3:
                jourstr = 'Mercredi';
                break;
            case 4:
                jourstr = 'Jeudi';
                break;
            case 5:
                jourstr = 'Vendredi';
                break;
            case 6:
                jourstr = 'Samedi';
                break;
        }
        var jourmois = maDate.getDate();
        var jourmoisstr = jourmois.toString();
        var mois = maDate.getMonth();
        var moisstr = "mmmm";
        switch (mois){
            case 0:
                moisstr = 'Janvier';
                break;
            case 1:
                moisstr = 'Février';
                break;
            case 2:
                moisstr = 'Mars';
                break;
            case 3:
                moisstr = 'Avril';
                break;
            case 4:
                moisstr = 'Mai';
                break;
            case 5:
                moisstr = 'Juin';
                break;
            case 6:
                moisstr = 'Juillet';
                break;
            case 7:
                moisstr = 'Août';
                break;
            case 8:
                moisstr = 'Septembre';
                break;
            case 9:
                moisstr = 'Octobre';
                break;
            case 10:
                moisstr = 'Novembre';
                break;
            case 11:
                moisstr = 'Décembre';
                break;

        }
        var annee = maDate.getFullYear();
        var anneestr = annee.toString();
        output = jourstr + " " + jourmoisstr+ " " +moisstr + " " + anneestr;
        return output;
    },

  render() {
    var commentaireRJ = this.state.comment;
    //console.log(comment);
    //console.log(key);
    return(
        <div className="row">
            <div className="col-xs-12">
                <h5>Commentaire de : {commentaireRJ.animateurSurnom} le : {this.jourmoisannee(commentaireRJ.timestamp)}</h5>
                {commentaireRJ.commentaire}
            </div>
        </div>
  );}
  });


CommentRJ.propTypes = {
    comment: PropTypes.shape({
        animateurSurnom: PropTypes.string,
        commentaire: PropTypes.string,
        timestamp: PropTypes.shape({
            timestamp: PropTypes.integer,
        })
    }),
};

export default CommentRJ


