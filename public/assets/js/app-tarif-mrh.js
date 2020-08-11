var app = new Vue({
    el: "#tarif",
    data: {
        montant: '',
        nbr_piece: '',
        habitation: '',
        juredique: '',
        terasse: '',
        total: 0,
        etat_init: false,
        etat: false,
        temp_montant: null,
        visible_montant: true
    },
    methods: {
        calcul: function() {
            console.log(this.montant + " " + this.nbr_piece + " " + this.habitation + " " + this.juredique + " " + this.terasse);
            var montant    =this.temp_montant;
            var nbr_piece  =this.nbr_piece;
            var habitation =this.habitation;
            var juredique  = this.juredique;
            var terasse    =this.terasse;
            let that = this;
            $.ajax({
                type: 'POST',
                datatype: 'JSON',
                url: $("#envoi_post").attr('action'),
                data: {
                    '_token': function() {
                        return $('input[name="_token"]').val();
                    },
                    'montant' : montant,
                    'nbr_piece' : nbr_piece,
                    'habitation' : habitation,
                    'juredique' : juredique,
                    'terasse' : terasse,
                },
                success: function(data) {
                    //console.log(data.url);
                    //alert('L\'enregistrement a été fait!');
                    //console.log(that.format(data.url));
                    that.total=that.format(data.total);
                    that.change_etat();
                    //window.location = data.url;

                },
                error: function(error) {
                    alert('Erreur d\'enregistrement ');
                    console.log(error);
                    // $('#btnChocSave').attr('disable',false);
                }
            });
        },
        format : function (val) {
          return new Intl.NumberFormat().format(val) + " DA";
        },
        change_etat: function (){
          if(this.montant != '' & this.nbr_piece != '' & this.habitation != '' & this.juredique != '' & this.terasse != '' & this.total != ''){
            this.etat=true;
            }else {
              this.etat=false;
            }

            if(this.montant != '' & this.nbr_piece != '' & this.habitation != '' & this.juredique != '' & this.terasse != ''){
              this.etat_init=true;
              }else {
                this.etat_init=false;
                this.total = '';
              }
        },
        onBlurNumber_montant() {
              this.visible_montant = false;
              this.temp_montant = this.montant;
              this.montant = this.thousandSeprator_montant(this.montant);
          },
          onFocusText_montant() {
              this.visible_montant = true;
              this.montant = this.temp_montant;
         },

        /*Replace numbers with comma separated value*/
         thousandSeprator_montant(montant) {
             if (montant !== '' || montant !== undefined || montant !== 0  || montant !== '0' || montant !== null) {
          return montant.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
             } else {
                 return montant;
             }
         }
    }
});
