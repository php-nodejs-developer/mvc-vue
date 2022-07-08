import { createRouter, createWebHistory } from 'vue-router'


const routes = [
    {
        path: '/climber/add',
        component: () => import('../views/AddClimber')
    },
    {
        path: '/climb/add',
        component: () => import('../views/AddClimb')
    },
    {
        path: '/climb/show',
        component: () => import('../views/ShowClimb')
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router