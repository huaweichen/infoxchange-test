import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './components/App';
import PersonsList from './components/PersonsList';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/',
            component: App,
        },
        {
            path: '/persons',
            component: PersonsList,
        }
    ],
    mode: 'history'
})
