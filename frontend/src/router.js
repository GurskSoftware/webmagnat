import {createRouter, createWebHistory} from 'vue-router';

import NotFound from './pages/NotFound.vue';
import HomePage from "./pages/HomePage";
import Questions from "./components/question/Questions";
import QuestionWindow from "./components/question/QuestionWindow";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            components: {
                default: HomePage
            }
        },
        {
            path: '/question',
            components: {
                default: QuestionWindow
            }
        },
        {
            path: '/questions',
            components: {
                default: Questions
            }
        },
        {path: '/:notFound(.*)', component: NotFound}
    ],
    linkActiveClass: 'active',
});

export default router;