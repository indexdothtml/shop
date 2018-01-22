// Layout
import Layout from '../pages/Layout.vue';

// User
import UserContent from '../components/user/UserContent.vue'
import UserProfile from '../components/user/UserProfile.vue'
import UserHistoryList from '../components/user/UserHistoryList.vue';
import UserHistoryItem from '../components/user/UserHistoryItem.vue';
import UserAuth from '../components/user/UserAuth.vue';
import UserAuthLogin from '../components/user/UserAuthLogin.vue';
import UserAuthReg from '../components/user/UserAuthReg.vue';
import UserPersInfo from '../components/user/UserPersInfo.vue';
import UserAuthReset from '../components/user/UserAuthReset.vue';
import UserAddressesList from '../components/user/UserAddressesList.vue';
import UserAddressesAdd from '../components/user/UserAddressesAdd.vue';
import UserCartPage from '../components/user/UserCartPage.vue';

const routes = [
    // Example
    {
        path: '',
        component: Layout,
        children: [
        	{
        		path: '/auth',
        		component: UserAuth,
        		children: [
        			{ path: '/auth/login', component: UserAuthLogin },
		    		{ path: '/auth/reg',component: UserAuthReg },
		    		{ path: '/auth/reset',component: UserAuthReset }
        		]
        	},
        	{
		    	path: '/profile',
		    	component: UserProfile,
		    	children: [
		    		{ path: '/profile/history', component: UserHistoryList },
		    		{ path: '/profile/addresses/', component: UserAddressesList,
                        children: [
                            { path: '/profile/addresses/add', component: UserAddressesAdd }
                        ]
                    }
		    	]
		    },
            {
                path: '/cart',
                component: UserCartPage
            }
        ]
    }
    
];

export default routes;
