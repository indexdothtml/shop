// Layout
import Layout from '../pages/Layout.vue';

// User
import User from '../components/user/User.vue'
import UserHistory from '../components/user/UserHistory.vue';
import UserAuth from '../components/user/UserAuth.vue';
import UserAuthLogin from '../components/user/UserAuthLogin.vue';
import UserAuthReg from '../components/user/UserAuthReg.vue';
import UserPersInfo from '../components/user/UserPersInfo.vue';
import UserAuthReset from '../components/user/UserAuthReset.vue';

const routes = [
    // Example
    {
        path: '',
        component: Layout,
        children: [
        	{
        		path: '/:auth',
        		component: UserAuth,
        		children: [
        			{ path: '/auth/login', component: UserAuthLogin },
		    		{ path: '/auth/reg',component: UserAuthReg },
		    		{ path: '/auth/reset',component: UserAuthReset }
        		]
        	},
        	{
		    	path: '/user/:id',
		    	component: User,
		    	children: [
		    		{ path: 'purchases', component: UserHistory },
		    		{ path: 'personal_info', component: UserPersInfo }
		    	]
		    }
        ]
    }
    
];

export default routes;
