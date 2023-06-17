// import PerfectScrollbar from 'perfect-scrollbar';
// window.PerfectScrollbar = PerfectScrollbar;

//require('./bootstrap');
//require('./custom')

//import './custom';
// import './bootstrap';
import { createApp } from 'vue';

// import jQuery from "jquery";
// window.$ = window.jQuery = jQuery;

import axios from 'axios';

import ToastPlugin from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

import Test from './components/Test.vue';
app.component('test-component', Test);

//Auth
import Register from './components/Auth/Register.vue';
app.component('register-component', Register);

//Edit
import Profile from './components/Edit/Profile.vue';
app.component('profile-component', Profile);

import Address from './components/Edit/Address.vue';
app.component('address-component', Address);

import Formation from './components/Edit/Formation.vue';
app.component('formation-component', Formation);

import Experience from './components/Edit/Experience.vue';
app.component('experience-component', Experience);

import Social from './components/Edit/Social.vue';
app.component('social-component', Social);

import Account from './components/Edit/Account.vue';
app.component('account-component', Account);

import File from './components/Edit/File.vue';
app.component('file-component', File);

//ADMIN

import Users from './components/Admin/Users.vue';
app.component('users-component', Users);

import UsersResume from './components/Admin/UsersResume.vue';
app.component('users-resume-component', UsersResume);

import CreateRequest from './components/Admin/Request/CreateRequest.vue';
app.component('createrequest-component', CreateRequest);

import Requests from './components/Admin/Request/Requests.vue';
app.component('requests-component', Requests);

import RequestsCourses from './components/Admin/Request/RequestsCourses.vue';
app.component('requests-courses-component', RequestsCourses);

import ShowRequest from './components/Admin/Request/ShowRequest.vue';
app.component('showrequest-component', ShowRequest);

import ShowProfile from './components/Admin/Request/ShowProfile.vue';
app.component('showprofile-component', ShowProfile);

import RequestUsers from './components/Admin/Request/RequestUsers.vue';
app.component('request-users-component', RequestUsers);

import Resumes from './components/Admin/Resumes.vue';
app.component('resumes-component', Resumes);

import { Form, Field, ErrorMessage } from 'vee-validate'
app.component('Form', Form)
app.component('Field', Field)
app.component('ErrorMessage', ErrorMessage)

import { Bootstrap4Pagination } from 'laravel-vue-pagination'
app.component('Bootstrap4Pagination', Bootstrap4Pagination)

app.use(ToastPlugin);

app.mount('#app');
