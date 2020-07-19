import Vue from "vue";
import VueRouter from "vue-router";

const Home = () => import(`../views/Home.vue`);
const About = () => import(`../views/About.vue`);
const Profile = () => import(`../views/Profile.vue`);
const Register = () => import("../views/Register.vue");

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: 'Home',
    component: Home,
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile,
  },
  {
    path: `/about`,
    name: `About`,
    component: About,
  },
  {
    path: "/register",
    name: "Register",
    component: Register,
    meta: { guestOnly: true }
  },
  {
    path: '/login',
    name: 'Login',
    component: () => import(/* webpackChunkName: "login" */ '../views/Login.vue')
  }
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

router.beforeEach((to, from, next) => {
  const loggedIn = localStorage.getItem('user')

  if (to.matched.some(record => record.meta.auth) && !loggedIn) {
    next('/login')
    return
  }
  next()
})

export default router;
