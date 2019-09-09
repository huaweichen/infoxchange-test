import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './components/App';
import PersonsList from './components/PersonsList';
import PersonsForm from './components/PersonsForm';

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
        },
        {
            path: '/persons/create',
            component: PersonsForm,
        }
    ],
    mode: 'history'
})
