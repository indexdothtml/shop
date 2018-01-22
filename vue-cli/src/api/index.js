import axios from 'axios';

// Import config variables
import * as config from './config.js';

// Axios configuration
axios.defaults.responseType = config.responseType;
axios.defaults.baseUrl = config.root;

// Export configurated axios for another api modules
export { axios as http };

// Example api method
export const searchProducts = ({ search }) => {
    return axios.get(config.endPoint, {
        params: {
            query: ``, // here is your GraphQL query
            variables: {
                // here is you variables for query
            }
        }
    }).then(response => {
        // Catch API errors and throw exception
        if (response.errors) throw new Error(response.errors);

        // Do something with response data (optional)

        // Return data
        return response;
    })
};
