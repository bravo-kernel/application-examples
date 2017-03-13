import Ember from 'ember';

export default Ember.Route.extend({

  model(params) {
    return this.get('store').findRecord('cocktail', params.id);
  },

  actions: {

    saveCocktail(country) {
      let confirmation = confirm('Are you sure?');

      if (confirmation) {
        country.save();
      }
    }

  }

});
