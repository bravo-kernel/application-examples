import Ember from 'ember';

export default Ember.Route.extend({
  model() {
    return this.store.findAll('cocktail');
  },

  actions: {
    deleteCocktail(cocktail) {
      let confirmation = confirm('Are you sure?');

      if (confirmation) {
        cocktail.destroyRecord();
      }
    }
  }
});
