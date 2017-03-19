import React, {PropTypes} from 'react'
import { Button, Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap'
import CommentsRJ from './CommentsRJ'

class DetailRJ extends React.Component {

        constructor(props) {
            super(props);
            this.state = {
                modal: false,
                randoJournee: {
                    'titre': 'Ma rando',
                    'date': '12/12/12',
                    'allure': 0,
                    'distancecalculee': 30,
                    'nomprogramme': 'JPM',
                    'allergaredepart': 'gare A',
                    'heuredepartaller': '08:00',
                    'allergarearrivee': 'gare B',
                    'heurearriveealler': '09:00',
                    'retourgaredepart': 'gare B',
                    'heuredepartretour': '17:00',
                    'retourgarearrivee': 'gare A',
                    'heurearriveeretour': '18:00',
                    'itineraire': 'En passant par la Lorraine',
                    'commentaires': Array(),    
                },
                hike_level:parseInt(props.hikelevel),
                bg_classes:props.bgcolor
            };
            this.toggle = this.toggle.bind(this);
        }

        setModalWithDatas() {
            var url_to_fetch = this.props.rjurl;
            var react_dom = this;
            $.get(url_to_fetch, function (data) {
            react_dom.setState({
            randoJournee: data,
                    modal: true});
            this.setState({hike_level:randoJournee.allure});
            }, "json");
        }

        heureminutes(phpdateobject) {
        var output = "--:--";
                var timestamp = phpdateobject.timestamp * 1000;
                var maDate = new Date(timestamp);
                var heures = maDate.getHours();
                if (heures > 0) {
        var heuresstr = heures.toString();
                if (heures < 10) {
        heuresstr = "0" + heuresstr;
        }
        var minutes = maDate.getMinutes();
                var minutesstr = minutes.toString();
                if (minutes < 10) {
        minutesstr = "0" + minutesstr;
        }
        output = heuresstr + ":" + minutesstr;
        }
        return output;
        }

        jourmoisannee(phpdateobject) {
        var output = "--/--/----";
                var timestamp = phpdateobject.timestamp * 1000;
                var maDate = new Date(timestamp);
                var jour = maDate.getDay();
                var jourstr = "ddddd"
                switch (jour) {
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
                switch (mois) {
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
                output = jourstr + " " + jourmoisstr + " " + moisstr + " " + anneestr;
                return output;
        }

        hikelevels(hikelevel) {
            var lettre = 'M';
            var className = 'success';
            switch (hikelevel) {
            case 1:
                lettre = 'L';
                className = 'primary';
                break;
            case 3:
                lettre = 'S';
                className = 'warning';
                break;
            case 4:
                lettre = 'R';
                className = 'danger';
                break;
            default :
                lettre = 'M';
                className = 'success';
            };
            var classes = className;
            return ({
                hikelevelletter:lettre,
                hikelevelclass:classes
            });
        }

        hike_distance_display(distance_calculee, distance_inferieure, unite) {
        var output = distance_calculee + " km";
                //if (console && console.log) {
                //  console.log('calc:'+distance_calculee+' inf: '+distance_inferieure+' unité: '+ unite);
                //}
                if (unite == "2") {
        output = distance_inferieure + " h ( " + distance_calculee + " km )";
        }
        return output
        }

        dayhikespecialicons(dayhike) {
        var html = [];
                if (dayhike.typerando == "Surprise") {
        var surprise_classes = "fa fa-gift";
                html.push(<i className= { surprise_classes }></i>);
        }
        if (dayhike.nbCommentaires > 0) {
        var warning_classes = "fa fa-exclamation-triangle";
                html.push(<i className={ warning_classes }></i>);
        }
        return html;
        }

        toggle() {
        if (!this.state.modal) {
        this.setModalWithDatas();
        } else {
        this.setState({
        modal: !this.state.modal
        });
        }
        }

        render() {
        var randoJournee = this.state.randoJournee
        var comments = randoJournee.commentaires
        var bg=this.state.bg_classes+ " alternate"
        var distance_value = this.hike_distance_display(randoJournee.distancecalculee, randoJournee.distanceinferieure, randoJournee.unite)
        var special_icons = this.dayhikespecialicons(randoJournee)
        var icons_buttons = this.hikelevels(this.state.hike_level)
        var allure_letter = icons_buttons['hikelevelletter'];
        var allure_class = icons_buttons['hikelevelclass'];
        var french_date = this.jourmoisannee(randoJournee.date)
        ///console.log('------avant---------');
        //console.log(randoJournee);
        ///console.log('------après---------');
        console.log("la classe de la randonnée est:"+ bg);
        return (
<div>
    {/* see https://reactstrap.github.io/components/buttons/ */}
    
    <Button outline color={ allure_class } onClick={() => this.toggle()} ><i className="fa fa-info"></i> ({ allure_letter })</Button>
    
    <Modal isOpen={this.state.modal} toggle={this.toggle}>
        <ModalHeader toggle={this.toggle} className={bg}>
            {special_icons} {randoJournee.titre} <Button color={ allure_class } size="sm">{ allure_letter }</Button> - { distance_value } - {randoJournee.nomprogramme} <br /> {french_date}
        </ModalHeader>
        <ModalBody className={bg}>
            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div className="card">
                    <div className="card-header" role="tab" id="headingOne">
                        <h5 className="mb-0">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Trajet A/R (Gares + Heures) :
                            </a>
                        </h5>
                    </div>

                    <div id="collapseOne" className="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div className="card-block">
                            <div className="container">
                                <div className="row">
                                    <div className="col-xs-6">
                                        <h4>Trains Aller</h4>
                                        <p>Départ: {randoJournee.allergaredepart} à {this.heureminutes(randoJournee.heuredepartaller)}</p>
                                        <p>Arrivée: {randoJournee.allergarearrivee} à {this.heureminutes(randoJournee.heurearriveealler)}</p>
                                    </div>
                                    <div className="col-xs-6">
                                        <h4>Trains Retour</h4>
                                        <p>Départ: {randoJournee.retourgaredepart} à {this.heureminutes(randoJournee.heuredepartretour)}</p>
                                        <p>Arrivée: {randoJournee.retourgarearrivee} à {this.heureminutes(randoJournee.heurearriveeretour)}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="card">
                    <div className="card-header" role="tab" id="headingTwo">
                        <h5 className="mb-0">
                            <a className="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Description du parcours :
                            </a>
                        </h5>
                    </div>
                    <div id="collapseTwo" className="collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div className="card-block">
                           <div className="container">
                               <div className="row">
                                   <div className="col-xs-12">
                                       {randoJournee.itineraire}
                                   </div>
                           </div>
                           </div>
                       </div>
                    </div>
                </div>
                <CommentsRJ comments={comments} />
            </div>
        </ModalBody>
        <ModalFooter className={bg}>
            <Button outline color={ allure_class } onClick={this.toggle} >Fermer</Button>
        </ModalFooter>
    </Modal>
</div>
                        );
        }
        }

export default DetailRJ
