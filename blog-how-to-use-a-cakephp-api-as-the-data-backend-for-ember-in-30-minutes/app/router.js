import Ember from 'ember';
import config from './config/environment';

const Router = Ember.Router.extend({
  location: config.locationType,
  rootURL: config.rootURL
});

Router.map(function() {
  this.route('cocktails', function() {
    this.route('add');
    this.route('edit', { path: "/edit/:id" });
  });
});

export default Router;
