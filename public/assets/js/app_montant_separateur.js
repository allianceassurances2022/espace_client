new Vue({
    el: "#app",
    data: {
        amount: null,
        temp: null,
        visible: true
    },
    methods: {
      onBlurNumber() {
            this.visible = false;
            /**
             * temp is used to holding the original
             * value before separator is applied
             */
            this.temp = this.amount;
            /**
             * this.thousandSeprator is a function used to apply                      separator into user input

             */
            this.amount = this.thousandSeprator(this.amount);
        },
        onFocusText() {
            this.visible = true;
            /**
             * temp is used to holding the original
             * value before separator is applied
             */
            this.amount = this.temp;
       },

      /*Replace numbers with comma separated value*/
       thousandSeprator(amount) {
           if (amount !== '' || amount !== undefined || amount !== 0  || amount !== '0' || amount !== null) {
        return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
           } else {
               return amount;
           }
       }
   }
});
