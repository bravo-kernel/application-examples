import Ember from 'ember';

export default Ember.Route.extend({
  model() {
    return this.store.createRecord('cocktail');
  },

  actions: {
    addCocktail(cocktail) {
      let confirmation = confirm('Are you sure?');

      if (confirmation) {
        cocktail.save();
      }
    }
  }

});
