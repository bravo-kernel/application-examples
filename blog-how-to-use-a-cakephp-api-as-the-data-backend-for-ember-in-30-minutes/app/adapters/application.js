import DS from 'ember-data';

export default DS.JSONAPIAdapter.extend({
  host: "http://cake3api.app",
  namespace: "api"
});
