import React, {PropTypes} from 'react';
import CommentRJ from './CommentRJ';

const CommentsRJ = React.createClass({
  
    getInitialState: function() {
        return {comments: this.props.comments};
    },
    
    jourmoisannee(phpdateobject) {
        var output = "--/--/----";
        if (console && console.debug) {
            console.debug(phpdateobject);
        }
        var timestamp = phpdateobject.timestamp * 1000;
        var maDate = new Date(timestamp);
        var jour = maDate.getDate();
        if (jour > 0){
            var jourstr = jour.toString();
            if (jour < 10){
                jourstr = "0" + jourstr;
            }
            var mois = maDate.getMonth() + 1;
            var moisstr = mois.toString();
            if (mois < 10){
                moisstr = "0" + moisstr;
            }
            var annee = maDate.getFullYear();
            var anneestr = annee.toString();
            output = jourstr + "/" + moisstr + "/" + anneestr;
            if (console && console.log) {
                console.log('timestamp: '+timestamp+' jour calcule: '+output);
            }
        }
        return output;
   },

  render() {
    var commentaires  = this.state.comments;
    var nombreCommentaires = commentaires.length;
    if (nombreCommentaires > 0){
        const listCommentItems = commentaires.map(function(commentaire, idx) {
                return (<CommentRJ comment={ commentaire } key={ idx } />);
        });
        //console.log(commentaires);
        return (
                
            <div className="card">
                    <div className="card-header" role="tab" id="headingThree">
                        <h5 className="mb-0">
                            <a className="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                {nombreCommentaires} commentaires
                            </a>
                        </h5>
                    </div>
                    <div id="collapseThree" className="collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div className="card-block">
                            <div className="container">{listCommentItems}</div>
                        </div>
                    </div>
            </div>
        );
    } else {
       return null;
    }
  }
  });


CommentsRJ.propTypes = {
    comments: PropTypes.array,
};

export default CommentsRJ


