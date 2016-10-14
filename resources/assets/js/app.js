var moment = require('moment');

var vm = new Vue({

  el: '.day-selector',

  data: {
    selected: false,
  },

  computed: {
    selectedInWords: function(){
      // Use Moment .js
      return moment(this.selected).format('MMM Do, YYYY');
    }
  },

  methods: {
    selectDay: function(day) {
        this.selected = day;
    }
  }

});
